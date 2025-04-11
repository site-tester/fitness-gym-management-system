<?php

namespace App\Http\Controllers;

use App\Models\ContactusInbox;
use App\Models\EquipmentInventory;
use App\Models\Service;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $trainers = User::role('trainer')->get();
        $services = Service::with('amenities')->get();
        return view('homepage', compact('trainers', 'services'));
    }

    public function sendContactUs(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'email:dns',
            ]
            ,
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }

        $email = $request->input('email');
        $apiKey = '5d9ca6c7-06a0-46c7-9e98-cf60f730b54d'; // Replace with your actual API key
        $url = 'https://api.mails.so/v1/validate?email=' . urlencode($email); // Use urlencode for safety

        $options = [
            'http' => [
                'header' => "x-mails-api-key: $apiKey",
                'method' => 'GET'
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === FALSE) {
            \Log::error('Failed to fetch email validation from Mails.so API.'); // **ERROR 3: Using `\Log::info('Error')` is too generic. Use `\Log::error()` for actual errors.**
            return response()->json(['error' => 'Failed to validate email address.'], 500); // **ERROR 4: No error response sent back to the user when API call fails.** Provide feedback to the client.
        }

        $data = json_decode($response, true);

        \Log::info('Mails.so API Response: ', $data);

        if ($data === null || !isset($data['data'])) {
            \Log::error('Invalid response structure from Mails.so API: ', $data); // **ERROR 5: No handling for invalid JSON response or missing 'data' key.** The API might change its response structure.
            return response()->json(['error' => 'Invalid response from email validation service.'], 500);
        }

        $validationResult = $data['data']['result'] ?? 'unknown'; // Use null coalescing operator for safety
        $validationReason = $data['data']['reason'] ?? null;

        // **ERROR 6: No actual validation logic based on the API response.** The code fetches the data but doesn't use it to determine if the email is valid according to your criteria.

        if ($validationResult === 'undeliverable') {
            // **ERROR 7: Hardcoded error message. Use the 'reason' for more specific feedback if available.**
            return response()->json(['errors' => ['email' => ['The email address appears to be invalid or undeliverable.']]], 422);
        }

        if ($validationResult === 'risky') {
            // **ERROR 8: Generic error message for a 'risky' email. You might want to provide more context based on the 'reason'.**
            return response()->json(['errors' => ['email' => ['The email address is potentially risky (reason: ' . $validationReason . '). Please verify.']]], 422);
        }

        ContactusInbox::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return response()->json(['success' => 'Email validation successful. Message Sent.']);
    }


    public function equipmentView()
    {
        $equipments = EquipmentInventory::orderBy('equipment_name', 'asc')->get();
        return view('equipments', compact('equipments'));
    }

    public function workoutView(Request $request)
    {
        // Retrieve the filter values from the request
        $skillLevel = $request->get('excercise_type', 'all');
        $bodyPart = $request->get('body-part', 'all');

        // Query the workouts based on the selected filters
        $workouts = Workout::query();

        if ($skillLevel !== 'all') {
            $workouts->where('experience_level', $skillLevel);
        }

        if ($bodyPart !== 'all') {
            $workouts->where('target_muscle_group', $bodyPart);
        }

        // Get the results
        $workouts = $workouts->get();

        // Generate YouTube thumbnails
        foreach ($workouts as $workout) {
            // Assuming `youtube_url` is a column in your workouts table

            if ($workout->video_url) {
                $workout->youtube_thumbnail = $this->getYouTubeThumbnail($workout->video_url);
            } else {
                $workout->youtube_thumbnail = null;
            }
        }

        return view('workouts', compact('workouts'));
    }

    public function getYouTubeThumbnail($youtubeUrl)
    {
        parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $queryParams);
        if (isset($queryParams['v'])) {
            $videoId = $queryParams['v'];
            return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
        }
        return null;
    }

    public function workoutDetails($workoutId)
    {
        $workout = Workout::find($workoutId);
        return view('workouts_page', compact('workout'));
    }
}

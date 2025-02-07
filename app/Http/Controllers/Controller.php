<?php

namespace App\Http\Controllers;

use App\Models\ContactusInbox;
use App\Models\Service;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $trainers = User::role('trainer')->get();
        $services = Service::with('amenities')->get();
        return view('homepage', compact('trainers', 'services'));
    }

    public function sendContactUs(Request $request){
        ContactusInbox::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact.us')->with('success', 'Message Sent.');
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

    public function getYouTubeThumbnail($youtubeUrl) {
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

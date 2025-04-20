<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Workout Schedule Reminder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center">
                            <img src="https://ajdiafitnessgym.com/resources/img/Logo.jpg" alt="Gym Logo" width="150"
                                style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; font-weight: bold;">
                                        Hey {{ $booking->user->name }}!
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 22px;">
                                        Just a friendly reminder about your upcoming booking scheduled for
                                        <strong style="color: #ed1b26;">tomorrow, {{ \Carbon\Carbon::parse($booking->reservation_date)->format('F j, Y') }}</strong>.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 22px;">
                                        We're excited to help you continue your fitness journey!
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="50%" align="left">
                                                    <p style="margin-top: 0; margin-bottom: 10px; font-size: 14px; font-family: Arial, sans-serif; color: #999999;">
                                                        Date:
                                                    </p>
                                                    <p style="margin-top: 0; margin-bottom: 0; font-size: 16px; font-family: Arial, sans-serif; color: #333333;">
                                                        {{ \Carbon\Carbon::parse($booking->reservation_date)->format('F j, Y') }}
                                                    </p>
                                                </td>
                                                <td width="50%" align="right">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td bgcolor="#ed1b26" style="border-radius: 3px;">
                                                                <a href="{{ url('/bookings') }}" target="_blank" style="font-size: 16px; font-family: Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 3px; display: inline-block;">
                                                                    View Booking
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor="#f9f9f9" style="border-top: 1px solid #cccccc; padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #999999; font-family: Arial, sans-serif; font-size: 14px;">
                                        If you have any questions, please don't hesitate to contact us at <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}" style="color: #ed1b26;">{{ env('MAIL_FROM_ADDRESS') }}</a>.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f9f9f9" align="center" style="padding-top: 20px;">
                            <a href="https://www.facebook.com/AJDIAFITNESS" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="color: #0866ff;"
                                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f9f9f9"
                            style=" padding: 30px 0 30px 0; color: #ed1b26; font-family: Arial, sans-serif; font-size: 15px; line-height: 18px; text-align: center; text-decoration: none;">
                            Copyright &copy; <a href="https://ajdiafitnessgym.com">2024 AJ DIA Fitness Gym</a><br>
                            DIA Building Basement Area,<br>
                            Tara, Sipocot, Philippines<br>
                            Phone: 0912-345-6789<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>

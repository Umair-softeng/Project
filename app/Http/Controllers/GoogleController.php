<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\GoogleCalendarService;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\Request;

class GoogleController extends Controller {
    protected $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->googleClient->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->googleClient->addScope(Google_Service_Calendar::CALENDAR);
    }

    // Step 1: Redirect the user to Google OAuth screen
    public function redirectToGoogle()
    {
        $authUrl = $this->googleClient->createAuthUrl();
        return redirect()->away($authUrl);
    }

    // Step 2: Handle the callback from Google OAuth
    public function handleGoogleCallback(Request $request)
    {
        // Retrieve the authorization code
        $code = $request->get('code');

        if (isset($code)) {
            // Authenticate the user with the provided code
            $this->googleClient->fetchAccessTokenWithAuthCode($code);
            $accessToken = $this->googleClient->getAccessToken();

            // Store the access token in session for future API requests
            session(['google_token' => $accessToken]);

            return redirect()->route('events.show'); // Redirect to the events page or anywhere else
        }

        // Handle errors if no code is received
        return redirect()->route('google.auth')->withErrors('Error during authentication');
    }
}

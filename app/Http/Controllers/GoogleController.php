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
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google-calendar-credentials.json'));
        $client->setRedirectUri(route('oauth.callback'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        // Check if 'code' is present in the request
        if ($request->has('code')) {
            $authCode = $request->get('code');

            // Exchange authorization code for access token
            try {
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $tokenPath = storage_path('app/token.json');
                file_put_contents($tokenPath, json_encode($accessToken));

                // Redirect to a success page or a route where you want the user to land
                return redirect()->route('events.index')->with('success', 'Authentication successful!');
            } catch (\Exception $e) {
                return redirect()->route('oauth.authorize')->with('error', 'Failed to authenticate: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('oauth.authorize')->with('error', 'No authorization code found.');
        }
    }

    public function authorizeGoogle()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Calendar API PHP');
        $client->setScopes(Google_Service_Calendar::CALENDAR);
        $client->setAuthConfig(storage_path('app/google-calendar-credentials.json'));
        $client->setRedirectUri(route('oauth.callback'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        // Generate the authorization URL and redirect the user
        $authUrl = $client->createAuthUrl();
        return redirect()->away($authUrl);
    }

}

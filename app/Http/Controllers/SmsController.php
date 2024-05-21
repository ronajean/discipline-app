<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;
use App\Models\Student; // Assuming Student is your model for storing student information

class SmsController extends Controller
{
    public function sms()
    {
        $basic = new Basic("YOUR_API_KEY", "YOUR_API_SECRET");
        $client = new Client($basic);

        $brandname = "OSDS";

        // Retrieve phone numbers from the database
        $students = Student::pluck('contacts')->toArray();

        foreach ($students as $phoneNumber) {
            $messageContent = "This is to notify that you have a violation.\n\n"
                . "Kindly visit the OSDS office within 3 days that you have received this message.\n\n"
                . "Pamantasan ng Lungsod ng Maynila - Office of Student Development Services";

            $response = $client->sms()->send(
                new SMS($phoneNumber, $brandname, $messageContent)
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                echo "SMS sent successfully to {$phoneNumber}.\n";
            } else {
                echo "The message failed with status: " . $message->getStatus() . " for {$phoneNumber}\n";
                // Handle error cases appropriately
            }
        }
    }
}

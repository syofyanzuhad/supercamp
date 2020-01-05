<?php

namespace App\Helpers;

// require __DIR__ . "/../../vendor/autoload.php";

use Dotenv\Dotenv;
use Twilio\Rest\Client;

class TwilioWhatsApp
{
    // public $no_wa;

    public function send($no_wa, $message) {
        // $dotenv = Dotenv::create(__DIR__);
        // $dotenv->load();
    
        // $twilioSid    = getenv('TWILIO_SID');
        // $twilioToken  = getenv('TWILIO_TOKEN');
        
        // $twilio = new Client($twilioSid, $twilioToken);
        $twilio = new Client("ACb4fd589b23b2c0d1f086a603d124c829", "271cd979f26121b5fab0514e9613eec0");
        
        $message = $twilio->messages
                            ->create(
                                "whatsapp:".$no_wa,
                                array(
                                        "body" => "PESERTA SUPERCAMP ".$message,
                                        "from" => "whatsapp:+14155238886"
                                    )
                            );
    }
}


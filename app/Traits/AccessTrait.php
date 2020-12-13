<?php

namespace App\Traits;

/**
 * 
 */
use App\Http\Controllers\Request;
use App\Access;
use Log;
use App\Http\Requests\AccessRequest;
trait AccessTrait
{
    public function SaveUser (AccessRequest $request)
    {

        $validatedData = $request->validated();
        
        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'pin' => $validatedData['pin']
        ];

        
        $message = "A new user is added";
        $email= $data['email'];
        $details = [
            'title' => 'Thanks For Contacting Me ',
            'body' => 'I Appreciate your Message and will reply Shortly'
        ];
    
        \Mail::to($email)->send(new \App\Mail\MessageMail($details));
        $details = [
            'title' => 'A New Contact ',
            'body' => $message
        ];

        Access::create($data);
        Log::info('Email Sent');
    }
}

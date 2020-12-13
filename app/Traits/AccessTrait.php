<?php

namespace App\Traits;

/**
 * 
 */
use App\Http\Controllers\Request;
use App\Access;
use Log;
use App\Http\Requests\AccessRequest;
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;
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
        try{

            Mail::to($email)->send(new MessageMail($details));
        }catch(Exception  $e){
            Log::error('Email Not Sent');
        }

        Access::create($data);
        Log::info('Email Sent');
    }
}

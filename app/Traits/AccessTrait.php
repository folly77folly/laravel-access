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

        Access::create($data);
        Log::info('Email Sent');
    }
}

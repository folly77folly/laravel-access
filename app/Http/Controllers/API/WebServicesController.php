<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccessRequest;
use App\Access;
use Log;
use App\Traits\AccessTrait;

class WebServicesController extends Controller
{
    use AccessTrait;
    //
    public function store(AccessRequest $request)
    {
        //
        $this->SaveUser($request);
        return response()->json([
            'status'=> "1",
            'message'=>"User Saved Successfully"
            ],201);

    }

}

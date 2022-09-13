<?php

namespace App\Http\Controllers\api\v1\auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\user\CurrentUserResource;




class RegisterController extends Controller
{
    public function __invoke(Request $request)
    { 
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255'],
            'type' => 'string',
            'gender' => 'string',
            'state' => 'string',
            'city' => 'string',
            'birthdate' => '',
            'origin_id' => '',
            
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);
        $validated['password'] = Hash::make($validated['password']);

       $user = User::create($validated);
       $user->setUserSegment();

       $accessToken = Auth::loginUsingId($user->id)->createToken('authToken')->accessToken;

       return response(['user' => New CurrentUserResource(Auth::loginUsingId($user->id)), 'access_token' => $accessToken]);
        
    }
}
<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->logout();

        return response()->json(['message' => 'Logged out successfully']);

    }
}

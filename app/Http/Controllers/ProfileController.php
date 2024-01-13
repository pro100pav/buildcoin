<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){   
        return view('profile');
    }
    public function index(Request $request){   
        return view('profile');
    }
}

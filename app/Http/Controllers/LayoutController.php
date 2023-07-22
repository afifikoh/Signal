<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;
use App\Models\User;

class LayoutController extends Controller
{
    public function index()
    {   
        $user = Auth::User();
        return view("layout.dashboard")->with(["user" => $user]);
    }
}

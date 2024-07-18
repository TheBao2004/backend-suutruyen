<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtherController extends Controller
{


    public function dashboard () {

        return view('modules.other.dashboard');

    }



}

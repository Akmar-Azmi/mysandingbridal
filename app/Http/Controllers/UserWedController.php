<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserWedController extends Controller
{
   public function showWeddingServices()
{
    $weddingServices = DB::table('wedding_services')->get();
    $otherServices = DB::table('other_services')->get();
    return view('services', compact('weddingServices', 'otherServices'));
}

}


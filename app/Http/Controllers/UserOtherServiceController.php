<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserOtherServiceController extends Controller
{
    public function show()
    {
        $otherServices = DB::table('other_services')->get();
        return view('other-services', compact('otherServices'));
    }
}


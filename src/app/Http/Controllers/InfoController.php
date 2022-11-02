<?php

namespace App\Http\Controllers;
use App\Models\notif;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function get()
    {
        $notifs = notif::whereStatus(1)->get();
        // dd($notifs);
        $jumlahNotif = count($notifs);
        return view('backend.info',compact('notifs','jumlahNotif'));
    }
}

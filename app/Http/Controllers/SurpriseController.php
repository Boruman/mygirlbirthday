<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Wish;


class SurpriseController extends Controller
{
    public function countdown()
    {
        return view('countdown');
    }
    public function question()
    {
        return view('question');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function wish()
    {
        return view('wish');
    }


    public function storeWish(Request $request)
    {
        Wish::create(['wish' => $request->wish]);
        return redirect('/invite');
    }


    public function invite()
    {
        return view('invite');
    }


    public function sendInvite(Request $request)
    {
        Mail::raw('Happy Birthday sayang ❤️ Aku punya surprise buat kamu 🎉', function ($msg) use ($request) {
            $msg->to($request->email)->subject('Undangan Spesial 💌');
        });


        return redirect()->away(
            'https://wa.me/62XXXXXXXXXX?text=' . urlencode('Buka website surprise aku ya ❤️🎂')
        );
    }
}
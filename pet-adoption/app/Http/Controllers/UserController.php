<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // ...existing code...

    public function pets()
    {
        return view('user.pages.pets');
    }

    public function about()
    {
        return view('user.pages.about');
    }

    public function support()
    {
        return view('user.pages.support');
    }

    public function faq()
    {
        return view('user.pages.faq');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }


    // ...existing code...
}

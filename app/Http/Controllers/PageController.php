<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function pageAboutOne()
    {
        return view('pages.about.about1');
    }

    public function pageAboutTwo()
    {
        return view('pages.about.about2');
    }

    public function pageAboutThree()
    {
        return view('pages.about.about3');
    }
}
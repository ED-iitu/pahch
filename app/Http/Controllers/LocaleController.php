<?php

namespace App\Http\Controllers;


use App\Models\Language;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{

    public function __invoke($locale)
    {
        if (!in_array($locale, config('app.locales'))) {
            abort(400);
        }
        App::setLocale($locale);
        session()->put('locale', $locale);
        return back();
    }

}

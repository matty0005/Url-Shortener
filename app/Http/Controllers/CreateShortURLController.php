<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateShortURLController extends Controller
{
    public function index(Request $request) {
        $url = $request->get('url');

        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder->destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;
        return response()->json(['url' => $shortURL, 'original' => $url]);

    }
}

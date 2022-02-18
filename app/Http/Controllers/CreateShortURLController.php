<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Classes\Builder;
use Exception;

class CreateShortURLController extends Controller
{
    public function index(Request $request) {
        return view('shorten', [
            'shortURL' => $request->session()->get('shortURL') 
        ]);
    }

    private function shorten($request) {
        $url = $request->get('url');

        $builder = new Builder();
        $shortURLObject = $builder->destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;
        
        return $shortURL;
    }
    public function update(Request $request) {
        try {
            $shortURL = $this->shorten($request);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'url' => "Not a valid url"
            ]);
        }

        return redirect()->back()->with('shortURL', $shortURL);
    }

    public function store(Request $request) {
        $shortURL = $this->shorten($request);
        $url = $request->get('url');

        return response()->json(['url' => $shortURL, 'original' => $url]);

    }
}

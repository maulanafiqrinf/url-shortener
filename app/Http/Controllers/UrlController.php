<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $originalUrl = $request->input('url');
        $shortUrl = Str::random(6); // Generate random string for short URL

        Url::create([
            'original_url' => $originalUrl,
            'short_url' => $shortUrl
        ]);

        return response()->json([
            'short_url' => url($shortUrl)
        ]);
    }

    public function redirect($shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();
        return redirect($url->original_url);
    }
}

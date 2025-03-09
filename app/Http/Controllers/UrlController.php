<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    private const ALPHABET = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    private const URL_ID_LENGTH = 6;

    public function index(): View
    {
        return view('home');
    }

    /**
     * Generate a random URL ID
     */
    private function createUrlId(): string 
    {
        return Str::random(self::URL_ID_LENGTH - 1) . rand(0, 9);
    }

    /**
     * Store a newly created URL
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'url' => 'required|string|max:255|url',
        ]);

        $urlId = $this->createUrlId();
        $newUrl = url('/') . '/' . $urlId;

        Url::create([
            'url' => $validated['url'],
            'url_id' => $urlId
        ]);

        return redirect()
            ->route('base.route')
            ->with('data', $newUrl);
    }

    /**
     * Redirect to the original URL
     */
    public function show(string $urlId): RedirectResponse
    {
        $url = Url::where('url_id', $urlId)->first();

        if (!$url) {
            return redirect()
                ->back()
                ->with('error', 'URL not found');
        }

        return redirect()->to($url->url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}

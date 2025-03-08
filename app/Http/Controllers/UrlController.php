<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; 
use App\Models\url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Carbon;

class UrlController extends Controller
{

    private string  $alphabets;
    private string $randomLetters;
     

    public function  index() : view 
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUrlId(): string
    {
        $this->alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        $this->randomLetters =  substr(str_shuffle($this->alphabets),0,4).
                                rand(0,9).
                                substr(str_shuffle($this->alphabets),0,1) ;
       
        return $this->randomLetters;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'url' => 'required|string|max:255|url',
        ]);

        // $currentUrl = url()->current();
  
        $url = $request['url'];
        $urlId = $this->createUrlId();
        $baseUrl = url('/'); 
        $newUrl = $baseUrl .'/'. $urlId;
        session()->flash('data', $newUrl);

        DB::insert('insert into urls (url, url_id) values (?, ?)', [$url, $urlId]);

        return redirect()->route('base.route')->with('data',$newUrl);

    }

    /**
     * Display the specified resource.
     */
    public function show(url $url): string
    {
        echo $url;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(url $url)
    {
        //
    }
}

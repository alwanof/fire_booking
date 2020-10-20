<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Language $language)
    {
        // return $request->all();
        
        $data = $request->data;

        $code = $language->locale;
        $path = '/'.$code.".json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $jsonString = file_get_contents(App()->langPath().$path);
        $language = json_decode($jsonString, true);
        // Update Keys
        foreach ($data as $key => $value) {
        $language[$key] = $value;
        }

        // Write File
        $newJsonString = json_encode($language,JSON_UNESCAPED_UNICODE);
        file_put_contents(App()->langPath().$path, stripslashes($newJsonString));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
    public function changeLanguage(String $locale = null)
    {
        
          App()->setLocale($locale);
          //store the locale in session so that the middleware can register it
          session()->put('locale', $locale);
    }
    public function Translate(Language $language)
    {
      $code = $language->locale;
      $path = '/'.$code.".json"; // ie: /var/www/laravel/app/storage/json/filename.json
      $jsons = file_get_contents(App()->langPath().$path);
      $content = json_decode($jsons, true);
      return view('languages.translate',compact('content','language'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
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
      $request->validate([
          'title' => ['required', 'string', 'max:255'],
          'description' => ['required', 'string'],
          'avatar' => ['required'],

      ]);

      $category = new Category;
      $category->title = $request->title;
      $category->description = $request->description;
      $category->avatar = "no avatar";
      if ($category->save()) {
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = "C-".$category->id."-".time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/categories/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
            $category->avatar =  asset('/uploads/categories/'. $filename);
            $category->save();
            }
            return redirect()->back();
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $request->validate([
          'title' => ['required', 'string', 'max:255'],
          'description' => ['required', 'string'],
      ]);
        $category->title = $request->title;
        $category->description = $request->description;
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = "C-".$category->id."-".time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/categories/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
            $category->avatar =  asset('/uploads/categories/'. $filename);
            }
        if($category->save()){
          return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
          return redirect()->back();
        }
    }
}

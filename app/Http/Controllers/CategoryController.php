<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function duplicate(Category $category)
    {
        $newCategory  = $category->replicate();

        if($newCategory->save()){
            return redirect()->route('category.edit',$newCategory->id);
        }
    }

    public function getModels(Request $request){
        $category_id = $request->category_id;
        $models = Category::find($category_id)->Models;
        return view('category.models',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
        $category->video = $request->video;
        $category->description_list = json_encode(array_filter($request->description_list));
        $category->avatar = "no avatar";
        if ($category->save()) {
            if ($request->hasfile('avatar')) {
                // $avatar = $request->file('avatar');
                // $filename = "C-".$category->id."-".time() . '.' . $avatar->getClientOriginalExtension();
                // $path  = public_path('/uploads/categories/' . $filename);
                // $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
                // $category->avatar =  asset('/uploads/categories/'. $filename);
                // $category->save();
                $a = 1;
                foreach ($request->avatar as $key => $photo) {
                    $category_image = new CategoryImage;
                    $category_image->category_id = $category->id;
                    $MimeType = explode("/", $photo->getMimeType());
                    $filename = "C-" . $category->id . "-" . time() . '-' . $a . '.' . $MimeType[1];
                    $path = public_path('/uploads/categories/' . $filename);
                    $uploaded_avatar = Image::make($photo)->resize(300, 300)->save($path);
                    $category_image->path = '/uploads/categories/' . $filename;
                    $category_image->save();
                    $a++;
                }
            } else {
                // echo "no p";
            }
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->video = $request->video;
        $category->description_list = json_encode(array_filter($request->description_list));
        if ($request->hasfile('avatar')) {

            $a = 1;
            foreach ($request->avatar as $key => $photo) {
                $category_image = new CategoryImage;
                $category_image->category_id = $category->id;
                $MimeType = explode("/", $photo->getMimeType());
                $filename = "C-" . $category->id . "-" . time() . '-' . $a . '.' . $MimeType[1];
                $path = public_path('/uploads/categories/' . $filename);
                $uploaded_avatar = Image::make($photo)->resize(300, 300)->save($path);
                $category_image->path = '/uploads/categories/' . $filename;
                $category_image->save();
                $a++;
            }
        } else {
            // echo "no p";
        }
        if ($category->save()) {
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()->back();
        }
    }
}

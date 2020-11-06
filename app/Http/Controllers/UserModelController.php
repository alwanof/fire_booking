<?php

namespace App\Http\Controllers;

use App\UserModel;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = UserModel::all();
        $categories = Category::all();
        return view('models.index',compact('models','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return timeAvalibality(1,"1970-01-01 03:15:00");

    }
    public function getServices($userModel)
    {
      $userModel =  UserModel::find($userModel);
      $services = $userModel->Services;
      return view('reservation.services',compact('services'));
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
          'title' => ['required'],
          'bio' => ['required'],
          'avatar' => ['required'],
          'category_id' => ['required']

      ]);
      $model = new UserModel;
      $model->category_id = $request->category_id;
      $model->title = $request->title;
      $model->bio = $request->bio;
      $model->avatar = "no avatar";
      if ($model->save()) {
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = "UM-".$model->id."-".time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/models/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
            $model->avatar =  asset('/uploads/models/'. $filename);
            $model->save();
            }
            return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function show(UserModel $userModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = Category::all();
      $userModel =  UserModel::find($id);
        return view('models.edit',compact('userModel','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $userModel =  UserModel::find($id);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string'],
        ]);
          $userModel->title = $request->title;
          $userModel->bio = $request->bio;
          if($request->hasfile('avatar')){
              $avatar = $request->file('avatar');
              $filename = "UM-".$userModel->id."-".time() . '.' . $avatar->getClientOriginalExtension();
              $path  = public_path('/uploads/models/' . $filename);
              $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
              $userModel->avatar =  asset('/uploads/models/'. $filename);
              }
          if($userModel->save()){
            return redirect()->route('model.index');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModel $userModel)
    {
        //
    }
}

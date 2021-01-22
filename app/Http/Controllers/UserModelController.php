<?php

namespace App\Http\Controllers;

use App\UserModel;
use App\UserModelImage;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Mail;
use mysql_xdevapi\Exception;

class UserModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = UserModel::all();
        $categories = Category::all();
        return view('models.index', compact('models', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function duplicate(UserModel $userModel)
    {

        $newModel = $userModel->replicate();
        $newModel->category_id = $userModel->category_id;
        if($newModel->save()){
            return redirect()->route('model.edit',$newModel->id);
        }

    }

    public function getServices($userModel)
    {
        $userModel = UserModel::find($userModel);
        $services = $userModel->Services;
        return view('reservation.services', compact('services'));
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
            if ($request->hasfile('avatar')) {

                $a = 1;
                foreach ($request->avatar as $key => $photo) {
                    $userModelImage = new UserModelImage;
                    $userModelImage->user_model_id = $model->id;
                    $MimeType = explode("/", $photo->getMimeType());
                    $filename = "UM-" . $model->id . "-" . time() . '-' . $a . '.' . $MimeType[1];
                    $path = public_path('/uploads/models/' . $filename);
                    $uploaded_avatar = Image::make($photo)->resize(300, 300)->save($path);
                    $userModelImage->path = '/uploads/models/' . $filename;
                    $userModelImage->save();
                    $a++;
                }
            }
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param UserModel $userModel
     * @return Response
     */
    public function show(UserModel $userModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserModel $userModel
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $userModel = UserModel::find($id);
        return view('models.edit', compact('userModel', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UserModel $userModel
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $userModel = UserModel::find($id);
        $userModel->category_id = $request->category_id;


        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string'],
        ]);
        $userModel->title = $request->title;
        $userModel->bio = $request->bio;
        if ($request->hasfile('avatar')) {

            $a = 1;
            foreach ($request->avatar as $key => $photo) {
                $userModelImage = new UserModelImage;
                $userModelImage->user_model_id = $userModel->id;
                $MimeType = explode("/", $photo->getMimeType());
                $filename = "UM-" . $userModel->id . "-" . time() . '-' . $a . '.' . $MimeType[1];
                $path = public_path('/uploads/models/' . $filename);
                $uploaded_avatar = Image::make($photo)->resize(300, 300)->save($path);
                $userModelImage->path = '/uploads/models/' . $filename;
                $userModelImage->save();
                $a++;
            }
        }
        if ($userModel->save()) {
            return redirect()->route('model.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserModel $userModel
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $userModel = UserModel::find($id);
            $services = $userModel->Services;
            foreach ($services as $service) {
                foreach ($service->serviceTimes as $time) {
                    $time->delete();
                }
                $service->delete();
            }
            $userModel->delete();
            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back();

        }
    }
}

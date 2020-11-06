@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Edit Model')}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{route('model.update',$userModel->id)}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
                <label for="">{{__('Title')}}</label>
                <input type="text" class="form-control" value="{{$userModel->title}}" name="title" required>
            </div>
            <div class="form-group">
              <label for="">{{__('Model Catgory')}}</label>
              <select class="form-control" name="category_id" required>
                <option value="">{{__('Select Category')}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $userModel->category_id) selected @endif>{{$category->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="">{{__('Bio')}}</label>
                <textarea name="bio" class="form-control" rows="5" cols="50" required>{{$userModel->bio}}</textarea>
            </div>
          <div class="form-group">
            <label for="inputName">{{__('Avatar')}}</label>
            <input type="file" name="avatar" class="form-control" value="">
          <img src="{{$userModel->avatar}}" width="10%" class="img-thumbnail" alt="">
        </div>

          <div class="form-group">
            <a href="{{route('home')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            <button type="submit"  class="btn btn-success float-right">{{__('Save Changes')}}</button>
          </div>
        </form>
        </div>



        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>
@endsection

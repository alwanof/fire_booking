@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Edit Category')}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" enctype="multipart/form-data" action="{{route('category.update',$category->id)}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
                <label for="">{{__('Title')}}</label>
                <input type="text" class="form-control" value="{{$category->title}}" name="title" required>
            </div>
            <div class="form-group">
                <label for="">{{__('Description')}}</label>
                <textarea name="description" class="form-control" rows="5" cols="50" required>{{$category->description}}</textarea>
            </div>
          <div class="form-group">
            <label for="inputName">{{__('Avatar')}}</label>
            <input type="file" name="avatar" class="form-control" value="">
          <img src="{{$category->avatar}}" width="10%" class="img-thumbnail" alt="">
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

@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Edit Permission')}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="{{route('permissions.update',$permission->id)}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
          <div class="form-group">
            <label for="inputName">{{__('Permission Name')}}</label>
            <input type="text" name="name" class="form-control" value="{{$permission->name}}" required>
          </div>

          <div class="form-group">
          <label for="">{{__('Guard Name')}}</label>
          <select class="form-control" name="guard_name" id="" required>
              <option value="">{{__('Select Guard')}}</option>
              @foreach (config('auth.guards') as $guard => $value)
              <option value="{{$guard}}" @if($guard === $permission->guard_name) selected @endif>{{strtoupper(__($guard))}}</option>
              @endforeach
          </select>
          </div>

          <div class="form-group">
            <a href="{{route('home')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            <button type="submit" class="btn btn-success float-right" name="button">{{__('Save Changes')}}</button>
          </div>
        </form>
        </div>



        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>
@endsection

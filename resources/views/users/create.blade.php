@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Create User')}}</h3>

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
            <form method="post" enctype="multipart/form-data" action="{{ route('users.store') }}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="inputName">{{__('Full Name')}}</label>
            <input type="text" name="name" class="form-control" placeholder="{{__('Full Name')}}">
          </div>
          <div class="form-group">
            <label for="inputName">{{__('Email')}}</label>
            <input type="text" name="email" class="form-control" placeholder="{{__('Email')}}" >
          </div>
          <div class="form-group">
            <label for="inputName">{{__('Password')}}</label>
            <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">
          </div>
          <div class="form-group">
            <label for="inputName">{{__('Password (Confirm)')}}</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('Password (Confirm)')}}">
          </div>

          <div class="form-group">
            <label for="inputName">{{__('Avatar')}}</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputName">{{__('Role')}}</label>
          <select class="form-control" name="role" id="" required>
            <option value="">{{__('Select Role')}}</option>
              @foreach (Spatie\Permission\Models\Role::all() as $role)
            <option value="{{$role->id}}" >{{__($role->name)}}</option>
              @endforeach
          </select>
        </div>
          <div class="form-group">
            <a href="{{route('home')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            <input type="submit" value="{{__('Save Changes')}}" class="btn btn-success float-right">
          </div>
        </form>
        </div>



        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>
@endsection

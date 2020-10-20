@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Create Role')}}</h3>

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
            <form method="post" enctype="multipart/form-data" action="{{route('roles.store')}}">
            {{ csrf_field() }}
    
          <div class="form-group">
            <label for="inputName">{{__('Role Name')}}</label>
            <input type="text" name="name" class="form-control" value="">
          </div>
          <hr>
          <legend>{{__('Permissions')}}</legend>
          <div class="form-group col-12">
              <div class="row">
              @foreach ($all_pers as $permission)
              <div class="col-3">
                <div class="form-group">
                    <label class="">
                        
                     <input type="checkbox"  name="roles[]" value="{{$permission->id}}">
                        {{strtoupper(__($permission->name))}}
                    </label>
                  </div>
              </div>
              @endforeach
            </div>
              
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
@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">
              <form action="{{route('arguments.update',$argument->id)}}" method="POST">
                @csrf
                  @method('PUT')
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Argument')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body ">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="inputName">{{__('Argument Title')}}</label>
                            <input type="text" name="title" value="{{$argument->title}}" class="form-control" placeholder="{{__('Name')}}" required>
                        </div>
                      </div>
                  </div>

                  <div class="row">

                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">{{__('Description')}}</label>
                              <textarea name="description" class="form-control" id="" cols="30" rows="4">{{$argument->description}}</textarea>
                          </div>
                      </div>
                  </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                      <label for="">{{__('Is Active')}}</label>
                      <select class="form-control" name="is_active" id="">
                          <option @if($argument->is_active == 1) selected @endif value="1">Active</option>
                          <option @if($argument->is_active == 0) selected @endif value="0">Deactivate</option>
                      </select>
                  </div>
                  </div>
              </div>

          </div>
          <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <button type="reset" onclick="history.go(-1)" class="btn btn-outline-dark btn-light ">{{__("Cancel")}}</button>
                        <button type="submit" name="submit" class="btn btn-outline-success ">{{__("Update")}}</button>
                    </div>
                </div>
          </div>
          <!-- /.card-body -->
        </div>
            </form>

        <!-- /.card -->
      </div>
</div>

@endsection

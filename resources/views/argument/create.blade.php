@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">
              <form action="{{route('arguments.store')}}" method="POST">
                @csrf
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
                            <input type="text" name="title" class="form-control" placeholder="{{__('Name')}}" required>
                        </div>
                      </div>
                  </div>

                  <div class="row">

                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">{{__('Description')}}</label>
                              <textarea name="description" class="form-control" id="" cols="30" rows="4"></textarea>
                          </div>
                      </div>
                  </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                      <label for="">{{__('Is Active')}}</label>
                      <select class="form-control" name="is_active" id="">
                          <option value="1">Active</option>
                          <option value="0">Deactivate</option>
                      </select>
                  </div>
                  </div>
              </div>

          </div>
          <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <button type="reset" onclick="history.go(-1)" class="btn btn-outline-dark btn-light ">{{__("Cancel")}}</button>
                        <button type="submit" name="submit_back" class="btn btn-outline-success ">{{__("Save & Add New")}}</button>
                        <button type="submit" name="submit" class="btn btn-outline-success ">{{__("Save")}}</button>
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

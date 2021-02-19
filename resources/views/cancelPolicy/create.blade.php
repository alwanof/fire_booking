@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">
              <form action="{{route('cancel_policy.store')}}" method="POST">
                @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Cancel Policy')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body ">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="inputName">{{__('Name')}}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{__('Name')}}" required>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputName">{{__('Released Time ')}} *(minutes)</label>
                            <input type="text" name="release_time" class="form-control" placeholder="{{__('Released Time ')}}" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputName">{{__('Penalty')}}</label>
                            <input type="text" name="penalty" class="form-control" placeholder="{{__('Penalty')}}" required>
                        </div>
                      </div>
                      <div class="col-md-2">
                          <label for="">{{__("Penalty Type")}}</label>
                          <select name="type" class="form-control" id="">
                              <option value="percent">%</option>
                              <option value="currency">$</option>
                          </select>
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

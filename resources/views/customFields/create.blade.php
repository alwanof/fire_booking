@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Custom Fields Form')}}</h3>

            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('custom_fields.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">{{__('Input Name')}}</label>
                                        <input type="text" name="input_name" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">{{__('Input Type')}}</label>
                                        <select name="input_type" id="" class="form-control">
                                            <option value="">{{__('Please Select Input Type')}}</option>
                                            <option value="text">{{__('Text')}}</option>
                                        </select>
                                    </div>
                                </div>



                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control">{{__('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>

@endsection
@section('script')



    @endsection

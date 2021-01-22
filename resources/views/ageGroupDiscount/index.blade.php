@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">

        <button data-toggle="modal" data-target="#createConfig" class="btn btn-success float-right">{{__('Add Age Group')}} <i class="fas fa-cogs"></i> </button>
    </div>
    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Age Group Table')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Age Range')}}</th>
                    <th>{{__('Discount Value (Percent %)')}}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\AgeGroupDiscount::all() as $ageGroupDiscount)
                        <tr>
                            <td> {{$ageGroupDiscount->id}} </td>
                            <td> {{$ageGroupDiscount->age_range}} </td>
                            <td> {{$ageGroupDiscount->discount_value}} </td>

                        </tr>

                    @endforeach
                </tbody>
                </table>
          </div>
          <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>
  <div class="modal fade" id="createConfig">
      <div class="modal-dialog modal-sm">
          <form action="{{route('age_group_discount.store')}}" method="POST">
              @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{__('New Age Group')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="">{{__('Age Range')}}</label>
                  <input type="text" class="form-control" value="" name="age_range" required>
              </div>
              <div class="form-group">
                  <label for="">{{__('Discount Value (Percent %)')}}</label>
                  <input type="text" class="form-control" value="" name="value" required>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
      </div>
      <!-- /.modal-dialog -->
    </div>

@endsection

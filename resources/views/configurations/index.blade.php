@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">

        <button data-toggle="modal" data-target="#createConfig" class="btn btn-success float-right">{{__('Create New Config')}} <i class="fas fa-cogs"></i> </button>
    </div>
    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Configurations Managment')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Key')}}</th>
                    <th>{{__('Value')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($configurations as $config)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$config->id}}">
                            <td>{{$i}}</td>
                            <td>{{$config->key}}</td>
                            <td>{{$config->value}}</td>
                            <td>
                              <div class="btn-group">
                                <a type="button" href="{{route('configurations.edit',$config->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <button type="button"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                              </div>
                            </td>
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
          <form action="{{route('configurations.store')}}" method="POST">
              @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{__('New Config')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                  <label for="">{{__('Key')}}</label>
                  <input type="text" class="form-control" value="" name="key" required>
              </div>
              <div class="form-group">
                  <label for="">{{__('Value')}}</label>
                  <input type="text" class="form-control" value="" name="value" required>
              </div>
              <div class="form-group">
                  <label for="">{{__('Permission Level')}}</label>
                  <select name="role_id" class="form-control" id="" required>
                    <option value="">{{__('Select Role')}}</option>
                    @foreach ($roles as $role)

                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach

                  </select>
              </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{__("Close")}}</button>
            <button type="submit" class="btn btn-primary">{{__("Save")}}</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


@endsection


@section('script')

@endsection

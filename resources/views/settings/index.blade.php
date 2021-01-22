@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">

        <button data-toggle="modal" data-target="#createConfig" class="btn btn-success float-right">{{__('Add Setting')}} <i class="fas fa-cogs"></i> </button>
    </div>
    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Settings Managment')}}</h3>

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
                    @foreach ($settings as $setting)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$setting->id}}">
                            <td>{{$i}}</td>
                            <td>{{$setting->Configuration->key}}</td>
                            <td>{{$setting->value}}</td>
                            <td>
                              <div class="btn-group">
                                <a type="button" href="{{route('settings.edit',$setting->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                  <form action="{{route('settings.destroy',$setting->id)}}" method="POST">
                                      @method("DELETE")
                                      @csrf
                                  <button type="submit"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                  </form>
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
          <form action="{{route('settings.store')}}" method="POST">
              @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{__('New Setting')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="">{{__('Configuration Key')}}</label>
                  <select name="configuration_id" class="form-control" id="">
                    <option value="">{{__('Select Configuration')}}</option>
                    @foreach ($configurations as $config)
                    @if(!\App\Setting::where('configuration_id',$config->id)->first())
                    <option value="{{$config->id}}">{{$config->key}}</option>
                    @endif
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="">{{__('Value')}}</label>
                  <input type="text" class="form-control" value="" name="value">
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

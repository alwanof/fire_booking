@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Custom Fields Managment')}}</h3>

            <div class="card-tools">
                <a class="btn btn-primary" href="{{route('custom_fields.create')}}">{{__('Create New Custom Field')}}</a>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>{{__('Input Name')}}</th>
                    <th>{{__('Input Type')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach(\App\CustomField::all() as $field)
                   <tr>
                       <td>{{$field->input_name}}</td>
                       <td>{{$field->input_type}}</td>
                       <td></td>
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

@endsection

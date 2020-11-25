@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Customer Managment')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Join Date')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($customers as $customer)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$customer->id}}">
                            <td>{{$i}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>
                              <div class="btn-group">
                                <a href="{{route('customer.reservations',$customer->id)}}" type="button" class="btn btn-success">
                                  <i class="fa fa-align-justify"></i>
                                </a>

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

@endsection

@extends('layouts.admin-lte')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-purple card-outline">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$customer->name}}</td>
                            <th>Customer Phone</th>
                            <td>{{$customer->phone}}</td>
                        </tr>
                        <tr>
                            <th>Customer Email</th>
                            <td>{{$customer->email}}</td>
                            <th>Customer Join Date</th>
                            <td>{{$customer->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<div class="row">

    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Customer Reservations')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Service Title')}}</th>
                    <th>{{__('Price')}}</th>
                    <th>{{__('Created At')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($bookings as $booking)
                                           @php
                        $i++
                    @endphp
                        <tr id="#user{{$booking->id}}">
                            <td>{{$i}}</td>
                            <td>{{$booking->bookable_type::find($booking->bookable_id)->title}} >
                                {{$booking->bookable_type::find($booking->bookable_id)->UserModel->title}} >
                                {{$booking->bookable_type::find($booking->bookable_id)->UserModel->Category->title}}</td>
                            <td>{{$booking->price}}</td>
                            <td>{{$booking->created_at}}</td>
                            <td>
                                @if($booking->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($booking->status == 1)
                                    <span class="badge badge-success">Completed</span>
                                @elseif($booking->status == 2)
                                    <span class="badge badge-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                              <div class="btn-group">
                                <a href="{{route('customer.reservations',$booking->id)}}" type="button" class="btn btn-success">
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

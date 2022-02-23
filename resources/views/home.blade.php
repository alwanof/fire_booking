@extends('layouts.admin-lte')
@section('breadcrumb', __('Dashboard') )
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-cyan card-outline">
                <div class="card-header">
                    <p class="card-text">Qr Code</p>
                </div>
                <div class="card-body">
{{--                    {!! QrCode::color(23,162,184)->size(300)->generate("https://2urkeybooking.com/provider/".Auth()->user()->username); !!}--}}
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-3">
        <div class="card card-warning card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">{{__('Awaiting Reservations')}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-clock" style="font-size: 2rem; color: #ffc107"></i>
                        <span style="font-size:1.5rem;font-weight: 900; color: #ffc107">{{Auth()->user()->Bookings->where('status',0)->count()}}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-success card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">{{__('Completed Reservations')}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-check" style="font-size: 2rem; color:#28a745"></i>
                        <span style="font-size:1.5rem;font-weight: 900; color:#28a745">{{Auth()->user()->Bookings->where('status',1)->count()}}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">{{__('Rejected Reservations')}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-ban" style="font-size: 2rem; color: #dc3545;"></i>
                        <span style="font-size:1.5rem;font-weight: 900; color: #dc3545;">{{Auth()->user()->Bookings->where('status',2)->count()}}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-pu
        rple card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title" >{{__('Income')}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-dollar-sign" style="font-size: 2rem; color: #6f42c1"></i>
                        <span style="font-size:1.5rem;font-weight: 900; color: #6f42c1">{{Auth()->user()->Bookings->where('status',1)->sum('price')}} /
                        @php
                        $total = Auth()->user()->Bookings->where('status',1)->sum('price');
                        $our_commission = Auth()->user()->our_commission;
                        $hotel_commission = Auth()->user()->hotel_commission;
                        $our_commission = ($our_commission / 100) * $total;
                        $hotel_commission = ($hotel_commission / 100) * $total;
                        $total = $total - ($hotel_commission + $our_commission);

                        echo $total;

                        @endphp

                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">


      <div class="card card-primary card-outline">
        <div class="card-body">
          <h5 class="card-title">{{ __('Last 10 New Reservation') }}</h5>

          <table class="table table-bordered  table-striped table-hover ui-state-hover">
              <thead>
              <tr>
                  <th>{{__('Customer Name')}}</th>
                  <th>{{__('Server Name')}}</th>
                  <th>{{__('Notes')}}</th>
                  <th>{{__('Booked Date')}}</th>
              </tr>
              </thead>
              <tbody>
              @foreach(Auth()->user()->Bookings->where('status',0)->take(10) as $book)
              <tr>
                  <td>{{$book->customer->name}}</td>
{{--                  @dd($book->bookable_type)--}}
                  <td>{{$book->bookable->title}}</td>
                  <td>{{$book->notes}}</td>
                    @php
                       $d = explode(" ",$book->ends_at);
                    @endphp
                  <td>Date : {{$d[0]}} <br> Time : {{$d[1]}}</td>
                  <td>
                      <div class="btn-group">
                          <a href="{{route('reservations.view',$book->id)}}" target="_blank" class="btn btn-warning"> <i class="fa fa-eye"></i> View </a>
                          <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" type="button">{{__('Completed')}} <i class="fa fa-check-circle"></i> </button>

                      <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModel" type="button">{{__('Rejected')}} <i class="fa fa-ban"></i> </button>
                      </div>
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>

        </div>
      </div><!-- /.card -->
    </div>
    <!-- /.col-md-12 -->

  </div>
  <!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("Complete Reservation")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="completeForm" action="">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{__('Booking Key')}}</label>
                        <input type="text" id="booking_key" class="form-control" required name="booking_key">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="rejectModel" tabindex="-1" role="dialog" aria-labelledby="rejectModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModelLabel">{{__("Reject Reservation")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="rejectForm" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">{{__('Booking Key')}}</label>
                        <input type="text" id="booking_key_rejected" class="form-control" name="booking_key">
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Notes')}}</label>
                        <textarea class="form-control" name="notes" id="notes" cols="10" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $("#completeForm").on("submit",function (e) {
            e.preventDefault();
            $.ajax({
                url:"/Users/reservations/completed/key",
                type:"POST",
                data:{
                    "_token":"{{csrf_token()}}",
                    "booking_key":$("#booking_key").val()
                },
                success : function (data) {
                    // console.log(data)
                    location.reload();
                }
            })
        })
        $("#rejectForm").on("submit",function (e) {
            e.preventDefault();
            $.ajax({
                url:"/Users/reservations/rejected/key",
                type:"POST",
                data:{
                    "_token":"{{csrf_token()}}",
                    "booking_key":$("#booking_key_rejected").val(),
                    "notes":$("#notes").val()
                },
                success : function (data) {
                    location.reload();
                }
            })
        })

    </script>
@endsection

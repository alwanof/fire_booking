@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Users Managment')}}</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" id="table_search" onkeyup="search()" class="form-control float-right" placeholder="{{__('Search By Email')}}">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                <table class="table table-hover" >
                <thead>
                    <tr>


                    <th>{{__('Booking key')}}</th>
                    <th>{{__('Service')}}</th>
                              <th>{{__('Service price')}}</th>
                    <th>{{__('Our Commission')}}</th>
                    <th>{{__('Hotel Commission')}}</th>
                         <th>{{__('Booking price')}}</th>

                    <th>{{__('Rest')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)

                        <tr id="#user{{$booking->id}}">
                            <td>{{$booking->booking_key}}</td>
                            <td>{{$booking->bookable_type::find($booking->bookable_id)->title}}</td>
                                                        <td> {{$booking->bookable_type::find($booking->bookable_id)->price}}</td>

                            <td>{{$booking->bookable_type::find($booking->bookable_id)->our_commission}} </td>
                            <td>{{$booking->bookable_type::find($booking->bookable_id)->hotel_commission}}</td>
                            <td>{{$booking->price}}</td>
                            <td>
                                @php
                        $total = $booking->price;
                        $our_commission = $booking->bookable_type::find($booking->bookable_id)->our_commission;
                        $hotel_commission = $booking->bookable_type::find($booking->bookable_id)->hotel_commission;
                        $our_commission = ($our_commission / 100) * $total;
                        $hotel_commission = ($hotel_commission / 100) * $total;
                        $total = $total - ($hotel_commission + $our_commission);
                        $hotel_total[] =$hotel_commission;
                        $our_total[] =$our_commission;
                        echo $total;
                        $totals[] = $total;
                        @endphp


                            </td>

                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
                    <tfoot>
                     <tr>


                    <th>{{__('Booking key')}}</th>
                    <th>{{__('Service')}}</th>
                              <th>{{__('Service price')}}</th>
                    <th>{{array_sum($our_total)}}</th>
                    <th>{{array_sum($hotel_total)}}</th>
                         <th>{{$bookings->sum('price')}}</th>

                    <th>{{array_sum($totals)}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                    </tfoot>
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
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Small Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection


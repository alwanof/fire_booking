@extends('layouts.admin-lte')

@section('content')
    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Reservation Management')}}</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover" id="users_table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Service Name')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($reservations as $reservation)
                            @php
                                $i++
                            @endphp
                            <tr id="#user{{$reservation->id}}">
                                <td>{{$i}}</td>
                                <td>{{$reservation->bookable_type::find($reservation->bookable_id)->title}}</td>
                                <td>{{$reservation->price}}</td>
                                <td>{{$reservation->ends_at}}</td>
                                <td>
                                    @if($reservation->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif($reservation->status == 1)
                                        <span class="badge badge-success">Completed</span>
                                        @elseif($reservation->status == 2)
                                            <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if($reservation->status != 1)
                                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" type="button">{{__('Completed')}} <i class="fa fa-check-circle"></i> </button>
                                        @endif
                                        @if($reservation->status != 2)
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModel" type="button">{{__('Rejected')}} <i class="fa fa-ban"></i> </button>
                                        @endif
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
                            <input type="text" id="booking_key" class="form-control" name="booking_key">
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
                            <textarea class="form-control" name="notes" required id="notes" cols="10" rows="5"></textarea>
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

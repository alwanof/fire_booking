@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Reservation View')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
              <table class="table table-bordered">
                  <tr>
{{--                      @dd($book,$book->bookable,$book->customer)--}}
                      <th>{{__('Customer Name')}}</th>
                      <td>{{$book->customer->name}}<a href="/customers/{{$book->customer->id}}/edit"> > link to edit</a></td>
                      <th>{{__('Customer Email')}}</th>
                      <td>{{$book->customer->email}}</td>
                  </tr>
                  <tr>
                      <th>{{__('Booked Date')}}</th>
                      <td>{{$book->ends_at}}</td>
                      <th>{{__('Booked Service')}}</th>
                      <td>{{$book->bookable->title}}<a href="/services/{{$book->bookable->id}}/edit"> > link to edit</a></td>
                  </tr>
                   <tr>
                      <th>{{__('Booked Count')}}</th>
                      <td>{{$book->quantity}}</td>
                      <th>{{__('Booking Price')}}</th>
                      <td>{{$book->price}}</td>
                  </tr>
                  <tr>
                      <th>{{__('Booked Notes')}}</th>
                      <td>{{$book->notes}}</td>
                  </tr>

                  @if($book->guests != null or  $book->guests != '')
{{--                      {{$book->guests}}--}}
                     <tr>
                      @foreach(json_decode($book->guests) as $key => $guest)
{{--                          {{$key}}--}}

                      <th>{{__('Guest')}}</th>
                      <td>
                        <ul>
                            <li>{{__('First Name')}} : {{$guest->Name}}</li>
                            <li>{{__('Email')}} : {{$guest->Email}}</li>
                        </ul>
                      </td>

                      @endforeach
                   </tr>

                  @endif
                 @if($book->asi != null or  $book->asi != '')

                  <tr>
                      @foreach(json_decode($book->asi) as $key => $value)
                      <th>{{$key}} </th>

                      <td>  {{$value}}</td>
                      @endforeach
                  </tr>
                  @endif
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

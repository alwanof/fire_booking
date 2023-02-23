@extends('layouts.v2')
@section('content')
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
                               <form action="{{route('customer.reservation',$provider->username)}}" method="post">
                @csrf
                                   <input type="hidden" name="amount" value="{{$person}}">
                                   <input type="hidden" name="date" value="{{$request->date}}">
                                   <input type="hidden" name="time" value="{{$request->time}}">
                                   <input type="hidden" name="service_id" value="{{$service->id}}">
                                   <input type="hidden" name="user_id" value="{{$provider->id}}">
                                   <input type="hidden" name="total_price" value="{{$request->total_price}}">


          <!-- Billing Address-->
          <div class="billing-information-card mb-3">
            <div class="card billing-information-title-card bg-white">
              <div class="card-body pb-0">
                <h6 class="text-center mb-2 text-black">{{$service->UserModel->title}} ({{$service->title}})</h6>
                <p class="text-center mb-0 text-success">
                    <span class="m-1"><i class="lni lni-users"></i> {{$person}} {{__('person')}}  </span>
                    <span class="m-1"><i class="lni lni-calendar"></i>{{$request->date}}</span>
                    <span class="m-1"><i class="lni lni-alarm-clock"></i>{{$request->time}}</span>

                </p>
                <hr>
              </div>
            </div>
            <div class="card user-data-card">
              <div class="card-body pt-0">
                  <legend>Contact Details</legend>
                   <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Name</span></div>
                  <div class="data-content">
                    <input type="text" placeholder="Name" name="name" class="form-control" required>
                  </div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                  <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>E-Mail</span></div>
                  <div class="data-content">
                    <input type="email" placeholder="E-mail" name="email" class="form-control" required>
                  </div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone Number</span></div>
                    <div class="data-content">
                        <input type="text" placeholder="Phone Number" name="phone" class="form-control" required>
                    </div>
                  </div>

                  <hr>
                  @for($i =1; $i <= $person; $i++)
                  <legend>{{$i}}. Person</legend>
{{--                  @dd($provider)--}}
{{--                  @foreach($provider->CustomFields as $field)--}}
{{--                <div class="single-profile-data d-flex align-items-center justify-content-between">--}}
{{--                  <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>{{$field->input_name}}</span></div>--}}
{{--                  <div class="data-content">--}}
{{--                    <input type="text" required placeholder="{{$field->input_name}}" name="custom[{{$i}}][{{$field->input_name}}]" class="form-control">--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                      @endforeach--}}
    {{-- todo saber comment these lines--}}
                      <hr>
                      @endfor
                      @if($service->additional_field_name != null)
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center">
                            <i class="lni lni-licencse"></i>
                            <span>{{$service->additional_field_name}}</span>
                        </div>
                        <div class="data-content">
                            <select name="additional_service_info[{{$service->additional_field_name}}]" class="form-control" id="">
                                <option value="">Select Option</option>
                                @foreach(json_decode($service->additional_field_options) as $option)
                                <option value="{{$option}}">{{$option}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                        @endif
                    <div class="form-group">
                        <textarea name="notes" class="form-control" id="" placeholder="You can type your special request…" cols="30" rows="4"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="checkbox" class="checkbox">
                            <input type="checkbox" class="checkbox" required name="" id="">
                            I accept <a href="#">aggrement</a> and <a href="#">privacy policy</a>.
                        </label>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Cart Amount Area-->
              <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <h5 class="total-price mb-0 m-1">$<span class="">{{$request->total_price}}</span></h5>


                      <button type="submit" class="btn btn-danger form-control  sp-btn">COMPLETE</button>

                </div>
              </div>
                </form>
            </div>
          </div>
        </div>
    @endsection

@extends('layouts.v2')
@section('style')

    <link rel="stylesheet" href="/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <style>
        input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 2px solid #ddd;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 3rem;
  height: 3rem;
  cursor: pointer;
  margin: 0;
  position: relative;
}

.number-input button:before,
.number-input button:after {
  display: inline-block;
  position: absolute;
  content: '';
  width: 1rem;
  height: 2px;
  background-color: #212121;
  transform: translate(-50%, -50%);
}
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 14rem;
  padding: .5rem;
  border: solid #ddd;
  border-width: 0 2px;
  font-size: 2rem;
  height: 3rem;
  font-weight: bold;
  text-align: center;
}
    </style>
@endsection
@section('content')


    <div class="page-content-wrapper">
      <div class="blog-details-post-thumbnail" style="background-image: url({{asset($service->Images->first()->path)}})">
        <div class="container">
          <div class="post-bookmark-wrap">
            <!-- Post Bookmark-->
            <a class="post-bookmark rate" href="#"><i class="lni lni-star-filled"></i> {{$service->calc()}},0</a>
          </div>
        </div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container">
            <h3 class="post-title text-center">{{$service->title}}</h3>
                <br>
            <legend class="text-center">{{__('Almost Done ..')}} </legend>
                <form action="{{route('reservation_form',[$provider->id,$service->id])}}" method="POST">
                @if(isset($provider->Settings->where('configuration_id',1)->first()->value) && $provider->Settings->where('configuration_id',1)->first()->value == 'true')

                @foreach(\App\AgeGroupDiscount::where('user_id',$provider->id)->get() as $ageGroupDiscount)

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{$ageGroupDiscount->age_range}}</label>
                        <div class="col-sm-10">
                          <div class="number-input">
                              <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown(),price_calculate()" ></button>
                              <input class="quantity" min="0"  name="person_count[{{$ageGroupDiscount->id}}]" data-discount-id="{{$ageGroupDiscount->id}}" id="person_count_{{$ageGroupDiscount->id}}" value="1" type="number">
                              <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(),price_calculate()" class="plus"></button>
                            </div>
                        </div>
                      </div>
                    <br>
                @endforeach
              @else
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{__('Person Count')}}</label>
                        <div class="col-sm-10">
                          <div class="number-input">
                              <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown(),price_calculate_2()" ></button>
                              <input class="quantity" min="1"  name="p_count" id="p_count" value="1" type="number">
                              <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(),price_calculate_2()" class="plus"></button>
                            </div>
                        </div>
                      </div>
                    <br>
              @endif

                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" id="date_picker" placeholder="Date" required  name="" class="form-control" >
                            <div class="input-group-addon">

                         <span class="btn btn-outline btn-lg"> <i style="font-size: large" class="lni lni-calendar"></i> </span>
                            </div>
                        </div>
                    </div>
                                     <br>
                    <div class="form-group">
                        <label for="">Times</label>
                        <select name="time_menu" required onchange="selectTime(this.value)" class="form-control" id="time_menu">
                            <option value="">Select Time</option>
                        </select>
                    </div>

        </div>
        </div>

                    @csrf
          @if($service->CancelPolicy)
            <div class="post-content bg-white py-3 mb-3">
              <div class="container">
                  <h3 class="title"><span>Cancel Policy </span>  </h3>
                  <p>
                      <ul>
                      <li>Penalty : {{$service->CancelPolicy->penalty}}</li>
                      <li>Release Time : {{$service->CancelPolicy->release_time}}</li>
                      <li>
                          Description : {{$service->CancelPolicy->description}}
                      </li>
                  </ul>
                  </p>
              </div>
            </div>
          @endif
        <div class="post-content bg-white py-3 mb-3">
          <div class="container">
               <h3 class="title">{{__("Service Description")}} </h3>
            <p>{{$service->description}}</p>
          </div>
        </div>
        <!-- All Comments-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <div class="container">
            <div class="rating-review-content">
                <h1 class="text-center">Total Price: <span id="total_price" class="">{{price_format_front($service->price,$provider)}}</span></h1>
                <br>
{{--                <input type="hidden" name="age_group_discount" id="age_group_discount" value="{{$provider->Settings->where('configuration_id',1)->first()->value}}">--}}
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="time" id="selected_time">
                    <input type="hidden" name="total_price" id="total_price_input">
                    <button type="submit" class="btn btn-success btn-sm  form-control sp-btn">Book Now</button>
            </div>
          </div>
        </div>
            </form>
      </div>
    </div>
@endsection
@section('scripts')

    <script src="/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
      <script src="/frontend/js/number-input.js"></script>
  <script type="text/javascript">
      price_calculate();
                function price_calculate() {
                    var inputs = $("input[name^='person_count']" ).get();
                        var persons_array = Array() ;
                        for (var i = 0; i < inputs.length ; i++){
                            console.log(i);
                            var discount_id = inputs[i].getAttribute('data-discount-id');
                            var person_count = inputs[i].value;
                            persons_array.push({'discount_id':discount_id,'person_count':person_count});
                    }
                    // console.log(persons_array);
                    $.ajax({
                        url:"/services/price_calculate/{{$service->id}}",
                        type:"POST",
                        data: {'_token':'{{csrf_token()}}','persons':persons_array},
                        success:function (res) {
                            // console.log(res);
                            $("#total_price").html(res);
                            $("#total_price_input").val(res);
                        }
                    })
                }
                function price_calculate_2() {
                   var res = {{$service->price}} * $("#p_count").val();
                     $("#total_price").html(res);
                            $("#total_price_input").val(res);
                }
            var enableDates = [];
        $.ajax({
            url:"/services/getDates/{{$service->id}}",
            type:"GET",
            success:function(data){


              for (var i=0 ; i < data.length ; i ++){
                  enableDates.push({date:data[i].date});
              }

        var enableDatesArray=[];
        var sortDatesArry = [];

       for (var i = 0; i < enableDates.length; i++) {
             var dt = enableDates[i].date;

             var dd, mm, yyy;
             if (parseInt(dt.split('/')[2]) <= 15 || parseInt(dt.split('/')[1]) <= 15) {
                       dd = parseInt(dt.split('/')[2]);
                      mm = parseInt(dt.split('/')[1]);
                      yyy = dt.split('/')[0];
                     enableDatesArray.push(dd + '/' + mm + '/' + yyy);
                     sortDatesArry.push(new Date(yyy + '/' + dt.split('/')[1] + '/' + dt.split('/')[2]));
                }
                else {
                 enableDatesArray.push(dt);
                 sortDatesArry.push(new Date(dt.split('/')[0] + '/' + dt.split('/')[1] + '/' + dt.split('/')[2] + '/'));
           }
 }
       var maxDt = new Date(Math.max.apply(null, sortDatesArry));
       var minDt = new Date(Math.min.apply(null, sortDatesArry));

       $('#date_picker').datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
              startDate: minDt,
              endDate: maxDt,
              beforeShowDay: function (date) {
                 var dt_ddmmyyyy = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                 return (enableDatesArray.indexOf(dt_ddmmyyyy) != -1);
              }
          });
            },
            error:function (data) {
                console.log(data);
            }
        })

        $("#date_picker").on("change",function () {
                var myDate = $("#date_picker").val();
                $("#selected_date").val(myDate);
                myDate = myDate.split("/");
                var newDate = new Date( myDate[2], myDate[1] -1, myDate[0]);
            console.log(newDate,myDate);
                var t = Math.floor(newDate.getTime() / 1000);


                $.ajax({
                    url: "/services/getTimes/{{$service->id}}/"+t ,
                    type: "GET",
                    success: function (data) {
                        // $("#timep-" + id).html(data);
                        $("#time_menu").html(data);
                        // console.log(data);
                    },
                    error: function (data) {
                        alert("Something Wrong !");
                    }
                })
        })

          function selectTime(time) {
              console.log(time);
              $("#selected_time").val(time);
              $("#timeBtn").html(time);



        }
    </script>
@endsection

@extends('layouts.v2')
@section('style')
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
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
  max-width: 13rem;
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
            <a class="post-bookmark rate" href="#"><i class="lni lni-star-filled"></i> 4,6</a>
          </div>
        </div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container">
            <h5 class="post-title">{{$service->title}}</h5>

                <br>

            <legend class="text-center">Almost Done ..</legend>
            <form action="">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="number-input">
                              <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown(),pcounter()" ></button>
                              <input class="quantity" min="0"  name="person_count" id="person_count" value="1" type="number">
                              <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(),pcounter()" class="plus"></button>
                            </div>
                                <div class="input-group-addon">

                            <span class="btn btn-outline btn-lg" type="button"> <i style="font-size: large" class="lni lni-users"></i> </span>
                                </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" id="date_picker" placeholder="Date"  name="" class="form-control" id="">
                            <div class="input-group-addon">

                         <span class="btn btn-outline btn-lg"> <i style="font-size: large" class="lni lni-calendar"></i> </span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle form-control" type="button" id="timeBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Times
                          </button>
                          <div class="dropdown-menu" id="time_menu" aria-labelledby="timeBtn">

                          </div>
                        </div>
                    </div>
                </form>
        </div>
        </div>
          <form action="{{route('reservation_form',[$provider->id,$service->id])}}" method="POST">
                    @csrf
          <div class="post-content bg-white py-3 mb-3">
          <div class="container" id="age-group">


          </div>
        </div>
        <div class="post-content bg-white py-3 mb-3">
          <div class="container">
            <p>{{$service->description}}</p>
          </div>
        </div>
        <!-- All Comments-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <div class="container">
            <div class="rating-review-content">
                <h1 class="text-center">Total Price: {{price_format_front($service->price,$provider)}}</h1>
                <br>

                    <input type="hidden" name="p_count" id="p_count">
                    <input type="hidden" name="date" id="selected_date">
                    <input type="hidden" name="time" id="selected_time">
                    <button type="submit" class="btn btn-success btn-sm  form-control sp-btn">Book Now</button>

            </div>
          </div>
        </div>
            </form>
      </div>
    </div>
@endsection
@section('scripts')

    <script src="{{asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
      <script type="text/javascript">
          function pcounter(){
              $("#age-group").html("");
              var vl = $("#person_count").val();
               $("#p_count").val(vl);
              for(var i = 1 ; i <= vl; i++ ){
                var div = ' <div class="form-group">'+
                 '<label for="">'+i+'.Person Age</label>'+
                 '<select name="person[]" id="" class="form-control">'+
                    ' <option value="0">18 - 60</option>'+
                    ' <option value="30">10 - 18</option>'+
                    ' <option value="50">2 - 10</option>'+
                     '<option value="100">0 - 1</option>'+
                 '</select>'+
             '</div>';
                $("#age-group").append(div);
            }
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
            console.log(t);
                {{--var t = {{strtotime(date("Y/m/d"))}};--}}
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

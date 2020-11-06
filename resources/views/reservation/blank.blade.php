@extends('layouts.provider')
@section('style')



@endsection
@section('content')
<div class="col-md-8 order-md-1">
  <h4 class="mb-3">Billing address</h4>
  <form class="" action="{{route('customer.reservation',$username)}}" method="post">
  <input type="hidden" name="user_id" value="{{$provider->id}}">
  <input type="hidden" name="service_id" id="service_id" value="">
  {{csrf_field()}}

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="firstName">Full name</label>
        <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required>

      </div>
      <div class="col-md-6 mb-3">
        <label for="email">Email <span class="text-muted"></span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
        <div class="invalid-feedback">
          Please enter a valid email address for shipping updates.
        </div>
      </div>
    </div>





    <div class="row">
      <div class="col-md-12 mb-3" id="modelHolder">
        <label for="models">Personal</label>
        <select class="custom-select d-block w-100" id="models" onchange="getServices(this)" style="display:none" required>
          <option value="">Select Personal</option>
            @foreach($models as $model)
          <option data-name="{{$model->title}}" value="{{$model->id}}">{{$model->title}}</option>
          @endforeach
        </select>

      </div>
      <div class="col-md-12 mb-3">
        <button type="button" class="btn  btn-secondary " onclick="toggle()" id="selectedModel" style="display:none" name="button"></button>
      </div>


    </div>
    <div class="row" >
      <div class="col-md-12 mb-3" id="servicesHolder">

      </div>
      <div class="col-md-12 mb-3">
        <button type="button" class="btn  btn-secondary " onclick="toggle()" id="selectedService" style="display:none" name="button"></button>
      </div>
    </div>

    <hr class="mb-4">
    <div class="form-group" id="datep">

    </div>
    <div class="form-group" id="timep">

    </div>


    <div class="form-group" id="submitBtn" style="display:none">
        <button class="btn btn-success btn-lg btn-block" type="submit">Continue to checkout</button>
    </div>
  </form>


</div>
<!-- <div class="container">
  <div class="row">




        @foreach($models as $model)
        <div class="col-md-3">

        <div class="card card-default">
        <div class="card-header">{{$model->title}}</div>
        <img class="card-img" width="50" src="{{$model->avatar}}" alt="User Avatar">
        <div class="card-body">
          {{$model->Category->title}}
          @if($model->Services)


          <ul class="">
            @foreach($model->Services as $service)

            <li><a href="#" onclick="getDates({{$service->id}})">{{$service->title}} </a></li>
            @endforeach

          </ul>
          @endif
        </div>
      </div>

      </div>

      @endforeach

  </div>
   <div class="card">
      <div class="card-body">
        <form class="" action="{{route('customer.reservation',$username)}}" method="post">
          <input type="hidden" name="user_id" value="{{$provider->id}}">
          <input type="hidden" name="service_id" id="service_id" value="">
          {{csrf_field()}}
        <div class="form-group" id="datep">

        </div>
        <div class="form-group" id="timep">

        </div>
        <div class="row" id="customerinfo" style="display:none">
          <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" class="form-control" name="name" value="" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="" required>
          </div>
        </div>
        <div class="form-group" id="submitBtn" style="display:none">
          <button type="submit" class="btn btn-success" name="button">Create</button>
        </div>
      </form>
      </div>
  </div>

</div> -->



@endsection
@section('script')

<script>
function selectTime(time) {
  $("#time").val(time);
  $("#Time_label").html(time);
}
function selectDate(date) {
  $("#date").val(date);
}
function toggle() {
// selectedModel
// modelHolder
// selectedService
// servicesHolder
$("#selectedModel").toggle();
$("#modelHolder").toggle();
$("#selectedService").toggle();
$("#servicesHolder").toggle();
}
  function getDates(e) {
    $("#service_id").val(e.value);
    $.ajax({
      url:"/index.php/services/getDates/"+e.value,
      type:"GET",


      success:function(data){
        // console.log(data);
        $("#datep").html(data);
        text = $( "#services option:selected").text() ;
        $("#service_name").html(text);
        $("#selectedService").html(text );
        $("#selectedService").show();
        $("#servicesHolder").hide();

      },
      error:function(data){
        // console.log(data);
        alert("Something Wrong !");
      }
    })

  }
  function getTimes(id,e) {
    value = e.dataset.id;
    $("#Date_label").html(new Date(value*1000).toLocaleDateString('en-GB'));
    console.log(value);
    $.ajax({
      url:"/index.php/services/getTimes/"+id+"/"+value,
      type:"GET",


      success:function(data){

        $("#timep").html(data);

        $("#submitBtn").show();
      },
      error:function(data){

        alert("Something Wrong !");
      }
    })

  }
  function getServices(e) {


    $.ajax({
      url:"/index.php/models/getServices/"+e.value,
      type:"GET",


      success:function(data){

      text = $( "#models option:selected").text() ;
      $("#model_name").html(text);
        $("#selectedModel").html(text );
        $("#selectedModel").show();
        $("#modelHolder").hide();
        $("#servicesHolder").html(data);
      },
      error:function(data){

        alert("Something Wrong !");
      }
    })

  }
</script>
@endsection

@extends('layouts.provider')
@section('style')



@endsection
@section('content')
<div class="wizard-container">
  <div class="card wizard-card" data-color="green" id="wizard">
      <form action="" method="">
    <div class="wizard-header">
      <h3>
        <b>{{$provider->name}}</b> Book Your Service
        <br>
          <small>Choice The Category ,Service  And the Personal And Book it</small>
        </h3>
      </div>
      <div class="wizard-navigation">
        <ul>
          <li>
            <a href="#categories" data-toggle="tab">Category</a>
          </li>
          <li>
            <a href="#models" data-toggle="tab">Personal</a>
          </li>
          <li>
            <a href="#servicesHolder" data-toggle="tab">Service (Apointment)</a>
          </li>
          <li>
            <a href="#finish" data-toggle="tab">Finish</a>
          </li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane" id="categories">
          <div class="row">
            <div class="col-sm-12">
              @foreach($categories as $category)
              <div class="col-sm-4 ">
                <div class="choice" data-toggle="wizard-radio" rel="tooltip"  onclick="getModels({{$category->id}})" title="{{$category->title}}" >
                  <input type="radio" name="category" value="{{$category->id}}">
                    <div class="icon" style="padding: 15px;border-radius: 25%;">
                      <img src="{{$category->avatar}}" style="width: -moz-available;border-radius: 25%;" alt="">
                      <!-- <i class="fa fa-home"></i> -->

                    </div>
                    <h6>{{$category->title}}</h6>
                    <p>{{$category->description}}</p>
                  </div>
                </div>
                @endforeach

                </div>

          </div>
        </div>
        <div class="tab-pane" id="models">

        </div>
        <div class="tab-pane" id="servicesHolder">

        </div>
        <div class="tab-pane" id="finish">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="name" value="">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="">
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" class="form-control" name="name" value="">
              </div>
              <div class="form-group">
                <label for="">Passport No </label>
                <input type="text" class="form-control" name="name" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wizard-footer">
        <div class="pull-right">
          <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' id="next" name='next' value='Next' />
          <input type='button' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='finish' value='Finish' />
        </div>
        <div class="pull-left">
          <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
        </div>
        <div class="clearfix"></div>
      </div>
    </form>

  </div>
</div>


@endsection
@section('script')

<script>

  function getModels(id) {
    console.log(id);
    $.ajax({
      url:"/index.php/services/getModels/"+id,
      type:"GET",
      success:function(data){
        $("#models").html(data);
        $("#next").click();
      }
    });

  }
  function selectTime(time) {
    $("#time").val(time);
    $("#Time_label").html(time);
    $("#next").click();

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
  function getDates(id) {
    // $("#service_id").val(id);
    $.ajax({
      url:"/index.php/services/getDates/"+id,
      type:"GET",


      success:function(data){
        // console.log(data);
        $("#datep").html(data);
        // text = $( "#services option:selected").text() ;
        // $("#service_name").html(text);
        // $("#selectedService").html(text );
        // $("#selectedService").show();
        // $("#servicesHolder").hide();

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


        // $("#submitBtn").show();
      },
      error:function(data){

        alert("Something Wrong !");
      }
    })

  }
  function getServices(id) {


    $.ajax({
      url:"/index.php/models/getServices/"+id,
      type:"GET",


      success:function(data){

      // text = $( "#models option:selected").text() ;
      // $("#model_name").html(text);
        // $("#selectedModel").html(text );
        // $("#selectedModel").show();
        // $("#modelHolder").hide();
        $("#servicesHolder").html(data);
        $("#next").click();

      },
      error:function(data){

        alert("Something Wrong !");
      }
    })

  }
</script>
@endsection


<div class="row">
  <div class="col-sm-12">
    @foreach($services as $service)
    <div class="col-sm-3 " style="margin-top:2rem">
      <div class=" card wizard-card text-center choice" rel="tooltip" onclick="getDates({{$service->id}})" data-toggle="wizard-radio" style="min-height: auto" data-color="green" id="wizard">
        <input type="radio" name="model" value="{{$service->id}}">
        <div class="wizard-header">
        <h4><b>  {{$service->title}}</b> </h4>
        </div>
        <div class="tab-content" style="min-height: auto">
          <div class="card-imag float-center">
            <img src="{{$service->avatar}}" class=" img-circle" style="width: -moz-available;" alt="">
          </div>
          <div style="padding-top:2rem">
            <p>
              {{$service->description}}</p>
          </div>
        </div>

        </div>
      </div>
      @endforeach

      </div>

</div>
<div class="row">
  <div id="datep">

  </div>
</div>
<div class="row">
  <div id="timep">

  </div>
</div>

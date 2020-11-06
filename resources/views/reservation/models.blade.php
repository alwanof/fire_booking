<div class="row">
  <div class="col-sm-12">
    @foreach($models as $model)
    <div class="col-sm-3 " style="margin-top:2rem">
      <div class=" card wizard-card text-center choice" rel="tooltip" onclick="getServices({{$model->id}})" data-toggle="wizard-radio" style="min-height: auto" data-color="green" id="wizard">
        <input type="radio" name="model" value="{{$model->id}}">
        <div class="wizard-header">
        <h4><b>  {{$model->title}}</b> </h4>
        </div>
        <div class="tab-content" style="min-height: auto">
          <div class="card-imag float-center">
            <img src="{{$model->avatar}}" class=" img-circle" style="width: -moz-available;" alt="">
          </div>
          <div style="padding-top:2rem">
            <p>
              {{$model->bio}}</p>
          </div>
        </div>

        </div>
      </div>
      @endforeach

      </div>

</div>

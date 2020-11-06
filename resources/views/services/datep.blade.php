
<div class="col-lg-12 mt-2" style="margin-top:2rem">
  <label for="">Date :</label>
<div style="width:100%;  overflow:hidden;" id="tarihSelector" class="add_height">
<div style="display:flex; overflow-x: scroll; padding-bottom:5px;" id="pills_holder">

  @foreach($service->serviceTimes->groupBy('date') as $date)
<button type="button" class="btn btn-success" onclick="getTimes({{$service->id}},this),selectDate({{strtotime($date[0]->date)}})" data-id="{{strtotime($date[0]->date)}}" style="float:left; margin-left:10px;">{{$date[0]->date}}</button>
@endforeach

 </div>
</div>
<span style="height:10px; display:block;">&nbsp;</span>
<input type="hidden" name="date" id="date" style="display:none;" readonly="" class="hasDatepicker" >
</div>

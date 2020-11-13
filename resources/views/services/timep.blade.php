
<div class="col-xs-12" style="margin-top:2rem">
  <label for="">Times :</label>
<div style="width:300px;  overflow:hidden;" id="tarihSelector" class="add_height">
<div style="display:flex; overflow-x: scroll; padding-bottom:5px;" id="pills_holder">
  @foreach($times as $time)
  @if(timeAvalibality($service->id,$t_date." ".$time->time.":00") < $amount    )


<button type="button" class="btn btn-success" onclick="selectTime('{{$time->time}}')"  data-id="{{$time->time}}" style="float:left; margin-left:10px;">
  {{$time->time}}</button>
  @else
  <button type="button" class="btn btn-danger" disabled  data-id="{{$time->time}}" style="float:left; margin-left:10px;">
    {{$time->time}}</button>
  @endif
  @endforeach

 </div>
</div>
<span style="height:10px; display:block;">&nbsp;</span>
<input type="hidden" name="time" id="time" style="display:none;" readonly="" class="hasDatepicker" value="">
</div>

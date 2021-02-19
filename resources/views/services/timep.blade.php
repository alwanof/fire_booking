            <option value="">Select Time</option>
                 @foreach($times as $time)
                @if(timeAvalibality($service->id,$t_date." ".$time->time.":00") < $amount    )

                    <option  value="{{$time->time}}">{{$time->time}}</option>
                @else
                    <option disabled value="{{$time->time}}">{{$time->time}}</option>

                @endif
            @endforeach



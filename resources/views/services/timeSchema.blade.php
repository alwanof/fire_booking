<table class="table">
    <thead>


    <tr>
        <td>Time</td>
        @foreach ($dates as $value)
            <td>{{$value}}
                <br>  {{Carbon\Carbon::parse($value)->format('l')}}  </td>
        @endforeach

    </tr>
    </thead>
    <tbody>
    @foreach($times as $key => $value)
        <tr>
            <td>{{$key}}</td>
            @foreach ($dates as $value)
                <td><input type="checkbox"  name="times[]" value="{{$value}}-{{$key}}" checked="true"></td>
            @endforeach

        </tr>
    @endforeach

    </tbody>
</table>

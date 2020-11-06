

  <div class="form-group">
    <label for="">{{__('Key')}}</label>
    <input type="text" class="form-control" value="" name="key">
</div>
<div class="form-group">
   <label for="">{{__('Value')}}</label>
   <input type="text" class="form-control" value="" name="value">
</div>
<div class="form-group">
   <label for="">{{__('Permission Level')}}</label>
   <select name="role_id" class="form-control" id="">
     <option value="">{{__('Select Role')}}</option>
     @foreach ($roles as $role)
         
     <option value="{{$role->id}}">{{$role->name}}</option>
     @endforeach

   </select>
</div>
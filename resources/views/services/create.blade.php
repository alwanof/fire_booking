@extends('layouts.admin-lte')
@section('style')

@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Create Service')}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="{{ route('services.store') }}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="inputName">{{__('Title')}}</label>
            <input type="text" name="title" class="form-control" placeholder="{{__('Title')}}" required>
          </div>
          <div class="form-group">
            <label for="inputName">{{__('Description')}}</label>
            <textarea name="description" class="form-control" rows="5" cols="80" placeholder="{{__('Description')}}" required></textarea>
          </div>

          <div class="form-group">
            <label for="">{{__('Model')}}</label>
            <select class="form-control" name="user_model_id" id="user_model_id" required>
              <option value="">{{__('Select Model')}}</option>
                @foreach($models as $model)
              <option value="{{$model->id}}">{{$model->title}}</option>
                @endforeach
            </select>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="inputName">{{__('Price')}}</label>
              <input type="number" name="price" class="form-control" placeholder="{{__('Price')}}" required>
            </div>
            <div class="form-group col-6">
              <label for="inputName">{{__('Discounted Price')}}</label>
              <input type="text" name="discount_price" class="form-control" value="0" placeholder="{{__('Discounted Price')}}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="">{{__('Amount')}}</label>
            <input type="number" class="form-control" name="amount" value="1" min="1" required>
          </div>
          <div class="form-group">
            <label for="">{{__('Duration')}}</label>
            <input type="number" class="form-control" id="duration" step="15" name="duration" value="30" min="30" required>
          </div>
               <div class="row">
                   <div class="form-group col-md-6">
                       <label for="">{{__('Start Hours')}}</label>
                       <select class="form-control" name="start_hours" id="start_hours">
                           @foreach ( range( 0, 86400, 3600 ) as $timestamp )
                          @php
                              $hour_mins = gmdate( 'H:i', $timestamp );
                              if ( ! empty( 'g:i a' ) )
                              $times[$hour_mins] = gmdate( 'g:i a', $timestamp );
                              else $times[$hour_mins] = $hour_mins;
                          @endphp
                               <option value="{{$timestamp}}">{{$hour_mins}} </option>

                           @endforeach
                       </select>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="">{{__('End Hours')}}</label>
                       <select class="form-control" name="end_hours" id="end_hours">
                           @foreach ( range( 0, 86400, 3600 ) as $timestamp )
                               @php
                                   $hour_mins = gmdate( 'H:i', $timestamp );
                                   if ( ! empty( 'g:i a' ) )
                                   $times[$hour_mins] = gmdate( 'g:i a', $timestamp );
                                   else $times[$hour_mins] = $hour_mins;
                               @endphp
                               <option value="{{$timestamp}}">{{$hour_mins}} </option>

                           @endforeach
                       </select>
                   </div>
               </div>

                <div class="form-group">
              <label for="images">{{__('Avatar')}}</label>


                  <input id="input-b3" required name="avatar[]" type="file" class="file" multiple
                         data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">

                          </div>

        <div class="form-group">

          <hr>
          <legend class="text-center">{{__('Time Schedule')}}</legend>
          <hr>
          <div class="form-group">
            <label for="inputName">{{__('Start Date')}}</label>
            <input type="date" name="start_date" id="start_date" value="{{date('Y-m-d',strtotime('today'))}}" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="inputName">{{__('End Date')}}</label>
          <input type="date" name="end_date" id="end_date"  value="{{date('Y-m-d',strtotime('tomorrow'))}}" class="form-control" required>
      </div>
          <div class=" table-responsive" id="timeSchemaHolder">

          </div>
        </div>
          <div class="form-group">
            <a href="{{route('home')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            <input type="submit" value="{{__('Save Changes')}}" class="btn btn-success float-right">
          </div>
        </form>
        </div>



        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>
@endsection
@section('script')
<script>
  $(function(){
      // $("#input-id").fileinput();
            var id = 2;
        $(document).on('click','#add_image',function(){
            var section =  '<div class="form-group" id ="image_div_'+id+'" >';
			section += '<label for="images">{{__("Avatar")}}</label>';
			section += '<div class="input-group">';
			section += '<div class="custom-file">';
			section += '<input type="file" name="avatar[]" class="custom-file-input" id="images">';
			section += '<label class="custom-file-label" for="images">Choose file</label>';
			section += '</div>';
			section += '<div class="input-group-append">';
			section += '<span class="input-group-text bg-danger" onclick="delete_div('+id+')"> <i class="fa fa-trash"></i> </span>';
			section += '</div>';
			section += '</div>';
            section += '</div>';
            $("#images_holder").append(section);
            id++
        })
    })
    function delete_div(id) {
    $("#image_div_"+id).remove();
    }
</script>
<script>
  $(function(){
    $(document).ready(function(){
      $.ajax({
        url:"/services/TimeSchemaCreator",
        type:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{"duration":$("#duration").val(),
              "start_date":$("#start_date").val(),
              "end_date":$("#end_date").val(),
            "start_hours":$("#start_hours").val(),
            "end_hours":$("#end_hours").val()},
        success:function(data){

          $("#timeSchemaHolder").html(data);
        },
        error:function(data){
          alert("Something Wrong !");
        }
      })
    })
    $(document).on("change",[
        "#duration",
        "#start_hours",
        "#end_hours",
        "#start_date",
        "#end_date",
    ],function(){

      $.ajax({
        url:"/services/TimeSchemaCreator",
        type:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{"duration":$("#duration").val(),
              "start_date":$("#start_date").val(),
              "end_date":$("#end_date").val(),
            "start_hours":$("#start_hours").val(),
            "end_hours":$("#end_hours").val()},
        success:function(data){

          $("#timeSchemaHolder").html(data);
        },
        error:function(data){
          alert("Something Wrong !");
        }
      })

    });

  })
</script>
@endsection

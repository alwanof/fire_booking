@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{__('Edit Category')}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" enctype="multipart/form-data" action="{{route('category.update',$category->id)}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
                <label for="">{{__('Title')}}</label>
                <input type="text" class="form-control" value="{{$category->title}}" name="title" required>
            </div>
            <div class="form-group">
                <label for="">{{__('Video')}}</label>
                <input type="text" class="form-control" value="{{$category->video}}" name="video" >
            </div>
            <div class="form-group">
                <label for="">{{__('Description')}}</label>
                <textarea name="description" class="form-control" rows="5" cols="50" required>{{$category->description}}</textarea>
            </div>
        @if($category->Images->count() != 0)
            @foreach($category->Images as $image)
          <div class="form-group">
            <label for="inputName">{{__('Avatar')}}</label>
            <div class="input-group">
              <div class="custom-file">
              <input type="file" name="avatar[]" class="custom-file-input" id="images">
              <label class="custom-file-label" for="images">{{__('Choose file')}}</label>
              </div>
              <div class="input-group-append">
                                  <button type="button" id="add_image" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
              </div>
            </div>
          <img src="{{$image->path}}" width="10%" class="img-thumbnail" alt="">
        </div>
        @endforeach
        @else
        <div class="form-group">
          <label for="inputName">{{__('Avatar')}}</label>
          <div class="input-group">
            <div class="custom-file">
            <input type="file" name="avatar[]" class="custom-file-input" id="images">
            <label class="custom-file-label" for="images">{{__('Choose file')}}</label>
            </div>
            <div class="input-group-append">
                                <button type="button" id="add_image" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
            </div>
          </div>

      </div>
        @endif
        <div id="images_holder"></div>

          <div class="form-group">
            <a href="{{route('home')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            <button type="submit"  class="btn btn-success float-right">{{__('Save Changes')}}</button>
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

@endsection

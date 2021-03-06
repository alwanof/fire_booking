@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">

        <button data-toggle="modal" data-target="#createModel" class="btn btn-success float-right">{{__('Add Model')}} <i class="fas fa-cogs"></i> </button>
    </div>
    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Models Managment')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Bio')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($models as $model)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$model->id}}">
                            <td>{{$i}}</td>
                            <td>
                                @if(isset($model->Images->first()->path))
                                <img src="{{$model->Images->first()->path}}" class="img-thumbnail" width="80" alt="">
                                @endif
                            </td>
                            <td>{{$model->title}}</td>
                            <td>{{$model->bio}}</td>
                            <td>
                              <div class="btn-group">
                                <a type="button" href="{{route('model.duplicate',$model->id)}}" class="btn btn-primary"><i class="fas fa-clone"></i></a>
                                  <a type="button" href="{{route('model.edit',$model->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                  <form action="{{route('model.destroy',$model->id)}}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                  </form>

                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
          </div>
          <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>
<div class="modal fade" id="createModel">
    <div class="modal-dialog modal-m">
        <form action="{{route('model.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('New Model')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="">{{__('Title')}}</label>
                <input type="text" class="form-control" value="" name="title" required>
            </div>
            <div class="form-group">
                <label for="">{{__('Video')}}</label>
                <input type="text" class="form-control" value="" name="video" >
            </div>
            <div class="form-group">
              <label for="">{{__('Model Catgory')}}</label>
              <select class="form-control" name="category_id" required>
                <option value="">{{__('Select Category')}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="">{{__('Bio')}}</label>
                <textarea name="bio" class="form-control" rows="5" cols="50" required></textarea>
            </div>
            <div class="form-group">
								<label for="images">{{__('Avatar')}}</label>

                <input id="input-b3" name="avatar[]" required type="file" class="file" multiple
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">

            </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
          <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </form>
    </div>
    <!-- /.modal-dialog -->
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

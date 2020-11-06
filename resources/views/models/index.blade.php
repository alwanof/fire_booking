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
                            <td><img src="{{$model->avatar}}" class="img-thumbnail" width="80" alt=""> </td>
                            <td>{{$model->title}}</td>
                            <td>{{$model->bio}}</td>
                            <td>
                              <div class="btn-group">
                                <a type="button" href="{{route('model.edit',$model->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <button type="button"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                <label for="">{{__('Avatar')}}</label>
                <input type="file" class="form-control" name="avatar" value="" required>
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

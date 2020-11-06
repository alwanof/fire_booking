@extends('layouts.admin-lte')

@section('content')

<div class="row">
    <div class="col-md-12 mb-2">

        <button data-toggle="modal" data-target="#createCategory" class="btn btn-success float-right">{{__('Add Category')}} <i class="fas fa-cogs"></i> </button>
    </div>
    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Categories Managment')}}</h3>

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
                    <th>{{__('Description')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($categories as $category)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$category->id}}">
                            <td>{{$i}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                              <div class="btn-group">
                                <a type="button" href="{{route('category.edit',$category->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{route('category.destroy',$category->id)}}" method="post">
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
<div class="modal fade" id="createCategory">
    <div class="modal-dialog modal-m">
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('New Category')}}</h4>
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
                <label for="">{{__('Description')}}</label>
                <textarea name="description" class="form-control" rows="5" cols="50" required></textarea>
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

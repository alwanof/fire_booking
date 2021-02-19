@extends('layouts.admin-lte')

@section('content')
<div class="row">

    <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Arguments')}}</h3>

            <div class="card-tools">
                <a href="{{route('arguments.create')}}" class="btn btn-round btn-success">{{__('Create New Arguments')}} </a>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Created At')}}</th>
                    <th>{{__('Updated At')}}</th>
                    <th>{{__('Actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($arguments as $argument)
                    @php
                        $i++
                    @endphp
                        <tr id="#argument{{$argument->id}}">
                            <td>{{$i}}</td>
                            <td>{{$argument->title}}</td>
                            <td>{{$argument->description}}</td>

                            <td>
                                @if($argument->is_active)
                                    <p><i class="fa fa-circle " style="color:darkgreen;font-size: 1rem;font-weight: 500"> </i> Active</p>
                                    @else
                                    <p><i class="fa fa-circle danger" style="color: #BE1622;font-size: 1rem;font-weight: 500"> </i> Deactive</p>

                                @endif

                            </td>
                            <td>{{$argument->created_at}}</td>
                            <td>{{$argument->updated_at}}</td>
                            <td>
                              <div class="row">
                                <div class="col-6"><a href="{{route('arguments.edit',$argument->id)}}" type="button" class="btn btn-success">
                                  <i class="fa fa-edit"></i>
                                </a></div>


                                  <div class="col-6">
                                      <form action="{{route('arguments.destroy',$argument->id)}}" method="POST">
                                      @method("DELETE")
                                      @csrf
                                      <button  type="submit" class="btn btn-danger">
                                  <i class="fa fa-trash"></i>
                                </button>
                                   </form>
                                  </div>



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

@endsection

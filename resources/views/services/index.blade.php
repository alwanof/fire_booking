@extends('layouts.admin-lte')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">

            <a href="{{route('services.create')}}" class="btn btn-success float-right">{{__('Add Service')}} <i
                    class="fas fa-cogs"></i> </a>
        </div>
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Services Managment')}}</h3>

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
                            <th>{{__('Rate / Rates Count')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0
                        @endphp
                        @foreach ($services as $service)
                            @php
                                $i++
                            @endphp
                            <tr id="#user{{$service->id}}">
                                <td>{{$i}}</td>
                                <td>{{$service->title}}</td>
                                <td>{{$service->bio}}</td>
                                <td>@if(!empty($service->Rateer)){{$service->calc()}}
                                    /{{$service->Rateer->count()}} @endif</td>
                                <td>
                                    <div class="btn-group">
                                      <a type="button" href="{{route('services.duplicate',$service->id)}}" class="btn btn-primary"><i class="fas fa-clone"></i></a>
                                        <a type="button" href="{{route('services.edit',$service->id)}}"
                                           class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{route('services.destroy',$service->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <a type="button" href="{{route('services.rates',$service->id)}}"
                                           class="btn btn-primary"><i class="fas fa-comment"></i></a>

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

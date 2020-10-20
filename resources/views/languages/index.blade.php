@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Language Managment')}}</h3>

            <div class="card-tools">
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    
                    <th>{{__('Name')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;   
                    @endphp
                    @foreach ($languages as $language)
                    @php
                        $i++    
                    @endphp
                        <tr>
                            <td>{{$language->name}}</td>
                            <td>
                                
                                <a type="button" href="{{route('languages.translate',$language->id)}}" class="btn btn-success"><i class="fas fa-language"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
          </div>
          
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>

@endsection
@section('script')
   


@endsection
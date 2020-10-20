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
              <form action="{{route('languages.translate.store',$language->id)}}" method="POST">
                @csrf
                <table class="table table-hover" >
                <thead>
                    <tr>
                    
                    <th>{{__('Key')}}</th>
                    <th>{{__('Value')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;   
                    @endphp
                    @foreach ($content as $key => $value)
                    
                        <tr>
                            <td>{{$key}}</td>
                            <td> <input type="text" class="form-control" name="data[{{$key}}]" value="{{$value}}"> </td>
                        </tr>
                    @endforeach
                </tbody>
                
                </table>
                
          </div>
          <div class="card-footer">
            <div class="col-12">
                <button type="submit" class="btn btn-success float-right">{{__('Save')}}</button>
            </div>
        </div>
    </form>

          
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>

@endsection
@section('script')
   


@endsection
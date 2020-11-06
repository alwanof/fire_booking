@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Permissions Managment')}}</h3>

            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Permission Name')}}</th>

                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($permissions as $permission)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$permission->id}}">
                            <td>{{$i}}</td>
                            <td>{{$permission->name}}</td>

                            <td><div class="btn-group">
                                <a type="button" href="{{route('permissions.edit',$permission->id)}}" class="btn btn-warning"><i class="fas fa-cogs"></i></a>
                                <form action="{{route('permissions.delete',$permission->id)}}" method="post">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                  </form>
                              </div></td>
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
@section('script')
    <script>
        function search() {

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("table_search");
            filter = input.value.toUpperCase();
            table = document.getElementById("users_table");
            tr = table.getElementsByTagName("tr");

            // Search By Email
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>


@endsection

@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Roles Managment')}}</h3>

            <div class="card-tools">
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Role Name')}}</th>
                    <th>{{__('Guard Name')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;   
                    @endphp
                    @foreach ($roles as $role)
                    @php
                        $i++    
                    @endphp
                        <tr id="#user{{$role->id}}">
                            <td>{{$i}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->guard_name}}</td>
                            <td><div class="btn-group">
                              <a type="button" href="{{route('roles.edit',$role->id)}}" class="btn btn-warning"><i class="fas fa-cogs"></i></a>
                              @if($role->id != config('permission.default_role_id'))
                              <form action="{{route('roles.delete',$role->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                @endif
                                
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
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Small Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
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
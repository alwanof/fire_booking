@extends('layouts.admin-lte')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{__('Users Managment')}}</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" id="table_search" onkeyup="search()" class="form-control float-right" placeholder="{{__('Search By Email')}}">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="users_table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>{{__('Full Name')}}</th>
                    <th>{{__('username')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Role')}}</th>
                    <th>{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($users as $user)
                    @php
                        $i++
                    @endphp
                        <tr id="#user{{$user->id}}">
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td><span class="badge badge-success">@if(isset($user->getRoleNames()[0])){{$user->getRoleNames()[0]}} @endif</span></td>
                            <td>
                              @can('Manage User')
                              <div class="btn-group">
                                @if(isset($user->getRoleNames()[0]) && $user->getRoleNames()[0]=="User")
                                <a type="button" target="_blank" href="{{route('provider',$user->username)}}" class="btn btn-success"><i class="fas fa-globe"></i></a>
                                @endif
                                <a type="button" href="{{route('users.edit',$user->id)}}" class="btn btn-warning"><i class="fas fa-user-edit"></i></a>
                                <button type="button" onclick="delete_user({{$user->id}})" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                              </div>
                              @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
          </div>
          <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{$users->links()}}
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
        function delete_user(id) {
            $.ajax({
                url:"/Users/delete_user/"+id,
                type:"POST",
                data:{"_token":"{{ csrf_token() }}"},
                success:function(data){showToast('bg-success','{{__("User Deleted")}}','','{{__("The User Has Been Deleted Successfully")}}')},
                error : function(error){showToast('bg-danger','{{__("Error")}}','','{{__("Something Wrong !")}}')}
            });
            tr = document.getElementById("#user"+id);
            tr.remove();
        }
    </script>


@endsection

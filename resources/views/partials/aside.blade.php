    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{Auth()->user()->avatar}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{route('users.profile',Auth()->user()->id)}}" class="d-block">{{Auth()->user()->name}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                   @can('View User')
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  {{__('Users')}}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('View User')
                <li class="nav-item">
                  <a href="{{route('users.all')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Users Managment')}}</p>
                  </a>
                </li>
                @endcan

                @can('Manage User')
                <li class="nav-item">
                  <a href="{{route('users.create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Create User')}}</p>
                  </a>
                </li>
                @endcan
                @can('View Role')
                <li class="nav-item">
                  <a href="{{route('roles.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Roles Managment')}}</p>
                  </a>
                </li>
                @endcan

                @can('Manage Role')
                <li class="nav-item">
                  <a href="{{route('roles.create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Create Role')}}</p>
                  </a>
                </li>
                @endcan
                @can('View Permission')
                <li class="nav-item">
                  <a href="{{route('permissions.index')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Permissions Managment')}}</p>
                  </a>
                </li>
                @endcan
                @can('Manage Permission')
                <li class="nav-item">
                  <a href="{{route('permissions.create')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Create Permission')}}</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('Manage Language')
            <li class="nav-item">
              <a href="{{route('languages.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-globe"></i>
                <p>{{__('Language Managment')}}</p>
              </a>
            </li>
            @endcan
            @can('Manage Configuration')
            <li class="nav-item">
              <a href="{{route('configurations.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-globe"></i>
                <p>{{__('Configurations Managment')}}</p>
              </a>
            </li>
            @endcan
            @can('Manage Setting')
            <li class="nav-item">
              <a href="{{route('settings.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-globe"></i>
                <p>{{__('Settings Managment')}}</p>
              </a>
            </li>
            @endcan
            <li class="nav-item">
              <a href="{{route('category.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-globe"></i>
                <p>{{__('Categories Managment')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('model.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-globe"></i>
                <p>{{__('Models Managment')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('services.index')}}" class="nav-link ">
                <i class="nav-icon fas fa-globe"></i>
                <p>{{__('Services Managment')}}</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->

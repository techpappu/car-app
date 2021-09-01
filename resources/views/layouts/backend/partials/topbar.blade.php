
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">

           <h5 class='col-12 modal-title text-center'>Change Profile</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>


       <form action="" id="profileUpdateForm" method="post">
           <div class="modal-body">
              @csrf
               <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" name="name" class="form-control is-invalid" id="name"
                          placeholder="Name" value="{{Auth::user()->name}}">
                   <span class="text-danger">
                       <strong id="name-error"></strong>
                   </span>
               </div>

               <div class="form-group">
                   <label for="email_address">E-Mail Address</label>
                   <input type="text" name="email_address" class="form-control is-invalid" id="email_address"
                          placeholder="E-Mail Address" value="{{Auth::user()->email}}">
                   <span class="text-danger">
                       <strong id="name-error"></strong>
                   </span>
               </div>

               <div class="form-group">
                   <label for="password">Password</label>
                   <input type="text" name="password" class="form-control is-invalid" id="password"
                          placeholder="Password">
                   <span class="text-danger">
                       <strong id="name-error"></strong>
                   </span>
               </div>

               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary addSchool">Save</button>
               </div>
           </div>
       </form>

   </div>
</div>
</div>
<header class="main-header">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">       
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
    
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header" style="height: 100px">
                        <p>
                            {{Auth::user()->name}}
                        </p>
                    </li>

                    <li class="user-footer">
                        <div class="pull-left">
                            <a data-toggle="modal" data-target="#profileModal" class="btn btn-default btn-flat">Change Profile</a>
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                               class="btn btn-default btn-flat">Sign out</a>

                            <form id="logout-form"
                                  action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('logout') }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                </ul>               
              </li>

            </ul>
          </div>
        </nav>
    
      </header>
      @push('js')
      <script type="text/javascript">

       
    </script>
@endpush
      
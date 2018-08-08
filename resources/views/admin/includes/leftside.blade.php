 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{ URL::to('admin/images/users/profile.png')}}" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5>{{ Auth::user()->name }}</h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
						@if (Route::has('login'))
									 @auth
								 
										 <!-- text-->
											<a href="{{ route('logout') }}" class=""   data-toggle="tooltip" title="Logout"
														onclick="event.preventDefault();document.getElementById('logout-form').submit();">
														<i class="mdi mdi-power"></i>
											</a>  
											<!-- text-->
									 @endauth
					    @endif
                         
						 <div class="dropdown-menu animated flipInY">
								@if (Route::has('login'))
									 @auth
								 
										 <!-- text-->
											<a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
											<!-- text-->
											<a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
											<!-- text-->
											<a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
											<!-- text-->
											<div class="dropdown-divider"></div>
											<!-- text-->
											<a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
											<!-- text-->
											<div class="dropdown-divider"></div> 
											<!-- text-->
													<a href="{{ route('logout') }}"  class="dropdown-item"
														onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
														<i class="fa fa-power-off"></i> Logout
													</a> 
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
													</form>
											<!-- text-->
									 @endauth
								 @endif
						  </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">PERSONAL</li>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User Management </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                               
                            </ul>
                        </li>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Role & Permissions </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                                <li><a href="{{ route('admin.permission.index') }}">Permissions</a></li>
								 <li><a href="{{ route('admin.permissionmodule.index') }}">Permission Modules</a></li>
                            </ul>
                        </li>
						
						{{-- Plan Type Starts here --}}
						
						 <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Plan & Packages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                
                                <li> <a class="has-arrow" href="#" aria-expanded="false">Plans Management</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('admin.plans.index')}}">Plan</a></li>
                                        <li><a href="{{ route('admin.planpackage.index') }}">Packages</a></li> 
                                    </ul>
                                </li>
								<!--
                                 <li> <a class="has-arrow" href="#" aria-expanded="false">Packages</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('admin.package-feature.index')}}">Package Feature</a></li>
                                        
                                    </ul>
                                </li>-->
                            </ul>
                        </li>
						
                     
                       

                       
					{{--Opportunity Management Start here --}}
				  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Opportunity Management </span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="{{ route('admin.opportunity.index') }}">Opportunity</a></li>
									</ul>
				  </li>
		
				 {{--Opportunity Management End  here --}}
						
                     
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
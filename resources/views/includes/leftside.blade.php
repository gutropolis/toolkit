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
                        <h5>Markarn Doe</h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="pages-login.html" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
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
                            <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
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
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Plan & Packages  </span></a>
                            <ul aria-expanded="false" class="collapse">
							<li><a href="#" class="has-arrow">Plans Management </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{'admin.plans.index'}}">Plan</a></li>
										<li><a href="{{ route('admin.plan.index') }}">Plan Type</a></li>
                                    </ul>
                                </li>
								<li><a href="#" class="has-arrow">Packages </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{'admin.package-feature.index'}}">Package Feature</a></li>
                                    </ul>
                                </li>
								
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
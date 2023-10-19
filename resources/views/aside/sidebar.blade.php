 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <!-- User Profile-->
                 <li>
                     <!-- User Profile-->
                     <div class="user-profile dropdown m-t-20">
                         <div class="user-pic">
                             <img src="{{ asset('dash/assets/images/users/1.jpg') }}" alt="users"
                                 class="rounded-circle img-fluid" />
                         </div>
                         <div class="user-content hide-menu m-t-10">
                             <h5 class="m-b-10 user-name font-medium">{{ Auth::user()->name }}</h5>
                             <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd"
                                 role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="ti-settings"></i>
                             </a>
                             <a href="javascript:void(0)" title="Logout" class="btn btn-circle btn-sm">
                                 <i class="ti-power-off"></i>
                             </a>
                             <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                 <a class="dropdown-item" href="javascript:void(0)">
                                     <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                 <a class="dropdown-item" href="javascript:void(0)">
                                     <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                 <a class="dropdown-item" href="javascript:void(0)">
                                     <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="javascript:void(0)">
                                     <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="javascript:void(0)">
                                     <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                             </div>
                         </div>
                     </div>
                     <!-- End User Profile-->
                 </li>
                 <!-- User Profile-->

                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                         aria-expanded="false">
                         <i class="fa fa-home" aria-hidden="true"></i>
                         <span class="hide-menu">Dashboard</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users') }}"
                         aria-expanded="false">
                         <i class="fa fa-users" aria-hidden="true"></i>
                         <span class="hide-menu">Users</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('ay') }}"
                         aria-expanded="false">
                         <i class="m-r-10 mdi mdi-calendar-question"></i>
                         <span class="hide-menu">Academic Years</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('classes') }}"
                         aria-expanded="false">
                         <i class="fa fa-sitemap" aria-hidden="true"></i>
                         <span class="hide-menu">Classes</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('students') }}"
                         aria-expanded="false">
                         <i class="m-r-10 mdi mdi-school"></i>
                         <span class="hide-menu">Students</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('payments') }}"
                         aria-expanded="false">
                         <i class="fa fa-dollar-sign "></i>
                         <span class="hide-menu">Payments</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('books') }}"
                         aria-expanded="false">
                         <i class="fa fa-book" aria-hidden="true"></i>
                         <span class="hide-menu">Books</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('subjects') }}"
                        aria-expanded="false">
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                        <span class="hide-menu">Subjects</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#"
                        aria-expanded="false">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="hide-menu">TimeTable</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item">
                            <a href="{{ route('timetable.exam') }}" class="sidebar-link">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Exam TimeTable</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('timetable.class') }}" class="sidebar-link">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Class TimeTable</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('slots') }}" class="sidebar-link">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Slots</span>
                            </a>
                        </li>
                    </ul>
                </li>

             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>

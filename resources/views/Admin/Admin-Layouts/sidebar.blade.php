 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="{{ url('/dashboard') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-people fs-3"></i><span>Employee Management</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                 <!-- Employee Menu  -->
                 @if (Auth::user()->hasPermission('manage employees'))
                     <li>
                         <a class="nav-link collapsed" data-bs-target="#employee-submenu" data-bs-toggle="collapse"
                             href="#">
                             <i class="bi bi-person-badge fs-4"></i><span>Employees</span><i
                                 class="bi bi-chevron-down ms-auto fs-5"></i>
                         </a>
                         <ul id="employee-submenu" class="nav-content collapse ms-auto ps-4"
                             data-bs-parent="#components-nav">
                             <li>
                                 <a href="{{ url('/employee/create') }}">
                                     <i class="bi bi-person-plus fs-3"></i><span>Manage Employees</span>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 @endif

                 <!-- End Employee Menu  -->

                 <!-- Leave Menu  -->
                 <li>
                     <a class="nav-link collapsed" data-bs-target="#leave-submenu" data-bs-toggle="collapse"
                         href="#">
                         <i class="bi bi-calendar2-week fs-4"></i><span>Leave</span><i
                             class="bi bi-chevron-down ms-auto fs-5"></i>
                     </a>
                     <ul id="leave-submenu" class="nav-content collapse ms-auto ps-4" data-bs-parent="#components-nav">
                         @if (Auth::user()->hasPermission('my leaves'))
                             <li>
                                 <a href="{{ url('/leaves/create') }}">
                                     <i class="bi bi-person-dash fs-3"></i><span>My Leaves</span>
                                 </a>
                             </li>
                         @endif
                         @if (Auth::user()->hasPermission('manage employee leaves'))
                             <li>
                                 <a href="{{ url('/manage-leave') }}">
                                     <i class="bi bi-person-lines-fill fs-3"></i><span>Manage Employee Leaves</span>
                                 </a>
                             </li>
                         @endif
                     </ul>
                 </li>
                 <!-- End Leave Menu  -->

                 <!-- Monthly Salary Slip Menu  -->
                 @if (Auth::user()->hasPermission('monthly salary slip'))
                     <li>
                         <a href="#">
                             <i class="bi bi-cash-coin fs-4"></i><span>Monthly Salary Slip</span>
                         </a>
                     </li>
                 @endif
                 <!--End Monthly Salary Slip Menu  -->

                 <!-- Emoplyee status Menu  -->
                 <li>
                     <a class="nav-link collapsed" data-bs-target="#status-submenu" data-bs-toggle="collapse"
                         href="#">
                         <i class="bi bi-person-lines-fill fs-4"></i><span>Emoplyee Status</span><i
                             class="bi bi-chevron-down ms-auto fs-5"></i>
                     </a>
                     <ul id="status-submenu" class="nav-content collapse ms-auto ps-4" data-bs-parent="#components-nav">
                         @if (Auth::user()->hasPermission('add employee status'))
                             <li>
                                 <a href="{{ url('/employee-status/create') }}">
                                     <i class="bi bi-person-check fs-3"></i><span>Add Employee Status</span>
                                 </a>
                             </li>
                         @endif

                         @if (Auth::user()->hasPermission('manage employee status'))
                             <li>
                                 <a href="{{ url('/manage-status') }}">
                                     <i class="bi bi-person-gear fs-3"></i><span>Manage Employee Status</span>
                                 </a>
                             </li>
                         @endif
                     </ul>
                 </li>

             </ul>
         </li><!-- End leave Nav -->

         @if (Auth::user()->hasPermission('view events'))
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#event-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-calendar-event"></i><span>Event Calender</span><i
                         class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="event-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="{{ url('/view-events') }}">
                             <i class="bi bi-calendar-check fs-4"></i><span>View Events</span>
                         </a>
                     </li>
                 </ul>
             </li><!-- End event Nav -->
         @endif
     </ul>

 </aside><!-- End Sidebar-->

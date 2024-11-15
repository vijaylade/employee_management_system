 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="dashboard">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-menu-button-wide"></i><span>Employee Management</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <!-- Employee Menu  -->
                    @if (Auth::check() && Auth::user()->role === 'admin') 
                    <li>
                        <a class="nav-link collapsed" data-bs-target="#employee-submenu" data-bs-toggle="collapse"
                            href="#">
                            <i class="bi bi-bag fs-4"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto fs-5"></i>
                        </a>
                        <ul id="employee-submenu" class="nav-content collapse ms-auto ps-4" data-bs-parent="#components-nav">
                            <li>
                                <a href="/employee/create">
                                    <i class="bi bi-droplet fs-3"></i><span>Add Employee</span>
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
                         <i class="bi bi-bag fs-4"></i><span>Leave</span><i class="bi bi-chevron-down ms-auto fs-5"></i>
                     </a>
                     <ul id="leave-submenu" class="nav-content collapse ms-auto ps-4" data-bs-parent="#components-nav">
                         <li>
                             <a href="#">
                                 <i class="bi bi-droplet fs-3"></i><span>My Leaves</span>
                             </a>
                         </li>
                         <li>
                            <a href="#">
                                <i class="bi bi-droplet fs-3"></i><span>View Employee Leaves</span>
                            </a>
                        </li>
                     </ul>
                 </li>
                <!-- End Leave Menu  -->

                

                <!-- Monthly Salary Slip Menu  -->
                 <li>
                     <a href="">
                         <i class="bi bi-building fs-4"></i><span>Monthly Salary Slip</span>
                     </a>
                 </li>
                 <!--End Monthly Salary Slip Menu  -->

                <!-- Emoplyee status Menu  -->
                 <li>
                  <a class="nav-link collapsed" data-bs-target="#status-submenu" data-bs-toggle="collapse"
                      href="#">
                      <i class="bi bi-bag fs-4"></i><span>Emoplyee Status</span><i class="bi bi-chevron-down ms-auto fs-5"></i>
                  </a>
                  <ul id="status-submenu" class="nav-content collapse ms-auto ps-4" data-bs-parent="#components-nav">
                      <li>
                          <a href="#">
                              <i class="bi bi-droplet fs-3"></i><span>Add Status</span>
                          </a>
                      </li>
                      <li>
                        <a href="#">
                            <i class="bi bi-droplet fs-3"></i><span>View Employee Status</span>
                        </a>
                    </li>
                  </ul>
              </li>

             </ul>
         </li><!-- End leave Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#event-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-wallet2"></i><span>Event Calender</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="event-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="">
                         <i class="bi bi-person-circle fs-4"></i><span>View Events</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End event Nav -->




     </ul>

 </aside><!-- End Sidebar-->

<section class="sidebar">
      
    <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ "Admin" }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active ">
              <a href="{{ route('home')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                  <!-- <i class="fa fa-angle-left pull-right"></i> -->
                </span>
              </a>
            </li>


            <!-- Ads naviagtion -->   

            <li class="treeview">
              <a href="#">
                <i class="fa fa-lg fa-audio-description"></i>
                <span> &nbsp; Management</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('ads')}}"><i class="fa fa-circle-o"></i> Pending Ads</a></li>
                <li><a href="{{route('approvedAds')}}"><i class="fa fa-circle-o"></i> Approved Ads</a></li>
                <li><a href="{{ route('deletedAds')}}"><i class="fa fa-circle-o"></i> Deleted Ads</a></li>
                <!--<li><a href="#"><i class="fa fa-circle-o"></i> All types</a></li>-->
              
              </ul>
            </li>

              <!-- Sellers naviagtion -->

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Users Management</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('Sellers')}}"><i class="fa fa-circle-o"></i> All Users</a></li>
                <!-- <li><a href="{{route('approvedAds')}}"><i class="fa fa-circle-o"></i> Approved Ads</a></li>
                <li><a href="{{ route('deletedAds')}}"><i class="fa fa-circle-o"></i> Deleted Ads</a></li> -->
              
              </ul>
            </li>

                <!----------------------- Vehicals details --------------------->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-car"></i> <span>Vehicle Details</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                    <li><a href="{{ route('VehicleFeatures.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Features</a></li>
                    <li><a href="{{ route('VehicleMakes.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Makes</a></li>
                    <li><a href="{{ route('VehicleModel.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Model</a></li>
                    <li><a href="{{ route('VehicleVariant.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Variant</a></li>
                    <li><a href="{{ route('VehicleDerivative.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Derivative</a></li>
                    <li><a href="{{ route('VehicleTrim.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Trim</a></li>
                    <li><a href="{{ route('VehicleBodytype.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Bodytype</a></li>
                    <li><a href="{{ route('VehicleFueltype.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Fueltype</a></li>
                    <li><a href="{{ route('VehicleTransmission.index')}}"><i class="fa fa-circle-o text-red"></i>Vehicle Transmission</a></li>
                           
                         <!-- Multilevel side menu -->

                                    <!-- <li class="treeview">
                                            <a href="#"><i class="fa  fa-circle-o text-red"></i> Bikes
                                                <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="#"><i class="fa fa-circle-o"></i>bike features</a></li>
                                                <li><a href="#"><i class="fa fa-circle-o"></i>bike makes</a></li>
                                                <li><a href="#"><i class="fa fa-circle-o"></i>bike model</a></li>
                                                <li><a href="#"><i class="fa fa-circle-o"></i>bike bodyType</a></li>
                                            </ul>
                                            <li class="treeview">
                                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                                    <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                                </ul>
                                            </li>
                                        </li> -->  
                </ul>
            </li> 



      </ul>
</section>
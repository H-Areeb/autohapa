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
                <i class="fa fa-files-o"></i>
                <span>View Ads</span>
                <span class="pull-right-container">
                  <!-- <span class="label label-primary pull-right">4</span> -->
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('ads')}}"><i class="fa fa-circle-o"></i> All Ads</a></li>
                <li><a href="{{route('approvedAds')}}"><i class="fa fa-circle-o"></i> Approved Ads</a></li>
                <li><a href="{{ route('deletedAds')}}"><i class="fa fa-circle-o"></i> Deleted Ads</a></li>
                <li><a href="{{ route('deletedAds')}}"><i class="fa fa-circle-o"></i> listing types</a></li>
              
              </ul>
            </li>

              <!-- Sellers naviagtion -->

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>View Sellers</span>
                <span class="pull-right-container">
                  <!-- <span class="label label-primary pull-right">4</span> -->
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('Sellers')}}"><i class="fa fa-circle-o"></i> All Sellers</a></li>
                <!-- <li><a href="{{route('approvedAds')}}"><i class="fa fa-circle-o"></i> Approved Ads</a></li>
                <li><a href="{{ route('deletedAds')}}"><i class="fa fa-circle-o"></i> Deleted Ads</a></li> -->
              
              </ul>
            </li>
  
      </ul>
</section>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
        
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{route('banner.index')}}">
            <i class="fa fa-files-o"></i>
            <span>Banner</span>
          </a>
        </li>
        <li>
          <a href="{{route('feature.index')}}">
            <i class="fa fa-th"></i> <span>Features</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{route('workshop.index')}}">
            <i class="fa fa-pie-chart"></i>
            <span>Upcoming Workshop</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{route('faculty.index')}}">
            <i class="fa fa-laptop"></i>
            <span>Faculty Members</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{route('feedback.index')}}">
            <i class="fa fa-edit"></i> <span>Feedback</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{route('course.index')}}">
            <i class="fa fa-table"></i> <span>Courses</span>
          </a>
        </li>
        <li>
         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Prices</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{route('contact.index')}}">
            <i class="fa fa-share"></i> <span>Contact</span>
          </a>
         </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
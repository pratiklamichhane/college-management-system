<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('storage/' ,Auth::user()->image )}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
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
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        @can('viewAny', App\Models\Department::class)
        <li>
          <a href="{{route('departments.index')}}">
            <i class="fa fa-th"></i> <span>Departments</span>
          </a>
        </li>
        @endcan
       
        <li>
          <a href="{{route('courses.index')}}">
            <i class="fa fa-th"></i> <span>Courses</span>
          </a>
        </li>
        <li>
          <a href="{{route('subjects.index')}}">
            <i class="fa fa-th"></i> <span>Subjects</span>
          </a>
        </li>
        <li>
          <a href="{{route('students.index')}}">
            <i class="fa fa-th"></i> <span>Students</span>
          </a>
        </li>
        <li>
          <a href="{{route('teachers.index')}}">
            <i class="fa fa-th"></i> <span>Teachers</span>
          </a>
        </li>
        <li>
          <a href="{{route('enrollments.index')}}">
            <i class="fa fa-th"></i> <span>Enrollments</span>
          </a>
        </li>
        <li>
          <a href="{{route('assignments.index')}}">
            <i class="fa fa-th"></i> <span>Assignments</span>
          </a>
        </li>
        <li>
          <a href="{{route('users')}}">
            <i class="fa fa-th"></i> <span>Users</span>
          </a>
        </li>
       
    
    </section>
    <!-- /.sidebar -->
  </aside>
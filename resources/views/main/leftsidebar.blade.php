<ul class="sidebar-menu tree" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="active treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active">
                <a href="{{route('admin.doctor.index')}}" title="Company setup">
                    <i class="fa fa-user-circle"></i>Doctors</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{route('admin.schedule.index')}}" title="create new schedule">
            <i class="fa fa-files-o"></i>
            <span>Schedule </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
        </a>
    </li>

    <li>
        <a href="{{route('admin.doctorSchedule.index')}}" title="create doctor schedule">
            <i class="fa fa-pie-chart"></i>
            <span>Doctor's Schedule</span>
        </a>

    </li>



</ul>


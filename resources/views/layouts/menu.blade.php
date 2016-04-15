<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->image)
                    {{ Html::image(asset("img/users/".Auth::user()->image), Auth::user()->name, ['class' => 'img-circle']) }}
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="{{ getActive('users') }}">
                <a href="{{ url('users') }}"><i class="fa fa-users"></i> <span>Users</span></a>
            </li>
            <li class="{{ getActive('projects') }}">
                <a href="{{ url('projects') }}"><i class="glyphicon glyphicon-briefcase"></i> <span>Projects</span></a>
            </li>
            <li class="{{ getActive('phases') }}">
                <a href="{{ url('phases') }}"><i class="glyphicon glyphicon-pushpin"></i> <span>Phases</span></a>
            </li>

            <li class="treeview {{ getActive('(task|task-status)') }}">
                <a href="#">
                    <i class="glyphicon glyphicon-flag"></i> <span>Tasks Config</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ getActive('task-status') }}">
                        <a href="{{ url('tasks-status') }}"> <i class="fa fa-info"></i> Status</a>
                    </li>
                    <li class="{{ getActive('tasks') }}">
                        <a href="{{ url('tasks') }}"> <i class="fa fa-sticky-note"></i> Tasks</a>
                    </li>
                </ul>
            </li>

            <li class="{{ getActive('boards') }}">
                <a href="{{ url('boards') }}"><i class="fa fa-tasks"></i> <span>Boards</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
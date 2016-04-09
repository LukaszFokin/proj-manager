@if(count($notifications))
    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ count($notifications) }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have {{ count($notifications) }} notification(s)</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach($notifications as $notification)
                        <li>
                            <a href="{{ $notification['url'] }}">
                                <i class="fa {{ $notification['icon'] }}"></i>
                                {{ $notification['message'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </li>
@endif
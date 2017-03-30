<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-gears pull-left"></i>
            <span>اعدادات الموقع</span>

            <span class="pull-left-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin/settings/') }}">
                    <i class="fa fa-circle-o"></i>
                    اعدادات رئيسية
                </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>
                    اعدادات اخرى
                </a></li>
        </ul>
    </li>

    {{-- users --}}
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users pull-left"></i>

            <span>التحكم فى الأعضاء</span>

            <span class="pull-left-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin/users/create') }}"><i class="fa fa-circle-o"></i> اضف عضو </a></li>
            <li><a href="{{url('/admin/users')}}"><i class="fa fa-circle-o"></i> كل الأعضاء </a></li>
        </ul>
    </li>

    {{-- buildings --}}
    <li class="treeview">
        <a href="#">
            <i class="fa fa-building pull-left"></i>

            <span>التحكم فى العقارات</span>

            <span class="pull-left-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/admin/buildings/create') }}"><i class="fa fa-circle-o"></i> اضف عقار </a></li>
            <li><a href="{{url('/admin/buildings')}}"><i class="fa fa-circle-o"></i> كل العقارات </a></li>
        </ul>
    </li>

</ul>
<!-- /.sidebar-menu -->

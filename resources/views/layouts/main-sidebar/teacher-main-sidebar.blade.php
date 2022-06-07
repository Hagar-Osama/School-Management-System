<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{route('teacher.dashboard')}}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main-sidebar.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>

        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
        <!-- menu item Elements-->
        <!-- sections-->

        <li>
            <a href="{{route('sections.show')}}"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">{{trans('sections.Sections')}}</span></a>
        </li>
        <!-- الطلاب-->
        <li>
            <a href="{{route('students.names')}}"><i class="fas fa-user-graduate"></i><span class="right-nav-text">{{trans('students.Students')}}</span></a>
        </li>


        <!-- الامتحانات-->
       
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">{{trans('exams.Exams')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('onlineExams.index')}}">  {{trans('dashboardPage.Exams List')}}</a></li>
                <li><a href="#"> {{trans('dashboardPage.Questions List')}}</a></li>
            </ul>

        </li>

        <!-- Reports-->

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">{{trans('dashboardPage.Reports')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('attendance.report')}}">  {{trans('dashboardPage.Attendance Reports')}}</a></li>
                <li><a href="#"> {{trans('dashboardPage.Exams Reports')}}</a></li>
            </ul>

        </li>

        <!-- الملف الشخصي-->
        <li>
            <a href=""><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{trans('dashboardPage.Personal File')}}</span></a>
        </li>


    </ul>
</div>

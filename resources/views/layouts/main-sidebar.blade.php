<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('dashboard')}}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main-sidebar.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{__('main-sidebar.Grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grades.index')}}">{{__('main-sidebar.Grades List')}}</a></li>

                        </ul>
                    </li>
                    <!-- menu item classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main-sidebar.Classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('classes.index')}}">{{__('main-sidebar.Classes List')}}</a> </li>
                        </ul>
                    </li>
                    <!-- menu sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main-sidebar.Sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('sections.index')}}">{{trans('main-sidebar.Sections List')}} </a> </li>
                        </ul>
                    </li>
                    <!-- menu item students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main-sidebar.Students')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('students.index')}}">{{trans('main-sidebar.Students List')}}</a> </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main-sidebar.Upgraded Students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{route('upgradedStudents.index')}}">{{trans('main-sidebar.Upgraded Students List')}}</a></li>
                                    <li> <a href="{{route('upgradedStudents.create')}}">{{trans('main-sidebar.Add New Upgraded Student')}}</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_graduated">{{trans('main-sidebar.Graduated Students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Students_graduated" class="collapse">
                                    <li> <a href="{{route('graduatedStudents.index')}}">{{trans('main-sidebar.Graduated Students List')}}</a></li>
                                    <li> <a href="{{route('graduatedStudents.create')}}">{{trans('main-sidebar.Add New Graduated Student')}}</a> </li>
                                </ul>
                            </li>


                        </ul>
                    </li>
                    <!-- menu item teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main-sidebar.Teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('teachers.index')}}">{{__('main-sidebar.Teachers List')}}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main-sidebar.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{url('add-parent')}}">{{trans('main-sidebar.Parents List')}}</a> </li>

                        </ul>
                    </li>
                    <!-- menu item accountings-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accountings-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main-sidebar.Accountings')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accountings-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">{{trans('main-sidebar.Tuition Fees')}}</a> </li>
                            <li> <a href="{{route('feesInvoices.index')}}">{{trans('main-sidebar.Tuition Invoices')}}</a> </li>
                            <li> <a href="{{route('payments.index')}}">{{trans('main-sidebar.Payments')}}</a> </li>
                            <li> <a href="{{route('refunds.index')}}">{{trans('main-sidebar.Refunds')}}</a> </li>
                            <li> <a href="{{route('studentRefunds.index')}}">{{trans('main-sidebar.Student Refunds')}}</a> </li>


                        </ul>
                    </li>

                    <!-- menu attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Attendance')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendance.index')}}">{{trans('main-sidebar.Sections List')}}</a> </li>

                        </ul>
                    </li>

                             <!-- menu subjects-->
                             <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Subjects')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subject" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subjects.index')}}">{{trans('main-sidebar.Subjects')}}</a> </li>

                        </ul>
                    </li>
                    <!-- menu exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Exams')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{route('exams.index')}}">{{trans('main-sidebar.Exams')}}</a> </li>
                        <li> <a href="{{route('onlineExams.index')}}">{{trans('main-sidebar.Online Exams')}}</a> </li>
                        <li> <a href="{{route('questions.index')}}">{{trans('main-sidebar.Questions')}}</a> </li>



                        </ul>
                    </li>
                    <!-- menu library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Library')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{route('library.index')}}">{{trans('main-sidebar.Library')}}</a> </li>
                        </ul>
                    </li>
                    <!-- menu onlineClasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#onlineClasses">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Online Classes')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="onlineClasses" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('onlineMeetings.index')}}">{{trans('main-sidebar.Online Classes')}}</a> </li>

                        </ul>
                    </li>
                    <!-- menu settings-->
                    <li>
                    <a href="{{route('info.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main-sidebar.School Information')}}</span></a>

                    </li>
                    <!-- menu users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Users')}}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>

                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

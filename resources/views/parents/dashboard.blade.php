@section('title')
{{trans('dashboardPage.Dashboard Page Title')}}
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <!-- <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div> -->

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> {{trans('dashboardPage.Parent Dashboard')}}</h4>
                        <br />
                        <h4 class="mb-0"> {{trans('dashboardPage.Welcome')}} : {{auth()->user()->father_name}}</h4>
                        <br />
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->

                <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row justify-content-center">
                            @foreach($children as $child)
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <a href="">
                                    <div class="card text-black">
                                        <img src="{{URL::asset('assets/images/student.png')}}" style: width="100px" height="100px"/>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{$child->name}}</h5>
                                                <p class="text-muted mb-4">معلومات الطالب</p>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <span>المرحلة</span>{{$child->grade->name}}<span></span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>الصف</span>{{$child->class->name}}<span></span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>القسم</span><span>{{$child->section->name}}</span>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <!-- {{-- @if(\App\Models\Degree::where('student_id',$son->id)->count() == 0)--}}
                                                    {{-- <span>عدد الاختبارات</span><span--}}
                                                    {{-- class="text-danger">{{\App\Models\Degree::where('student_id',$son->id)->count()}}</span>--}}
                                                    {{-- @else--}}
                                                    {{-- <span>عدد الاختبارات</span><span--}}
                                                    {{-- class="text-success">{{\App\Models\Degree::where('student_id',$son->id)->count()}}</span>--}}
                                                    {{-- @endif--}} -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>




            <!-- Orders Status widgets-->

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>

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
    @livewireStyles

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
                        <h4 class="mb-0"> {{trans('dashboardPage.Admin Dashboard')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('dashboardPage.Total Students')}}</p>
                                    <h4>{{$students}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i> <a href="{{route('students.index')}}" target="_blank"><span class="text-danger">{{trans('students.Students')}}</span></a>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('dashboardPage.Total Teachers')}}</p>
                                    <h4>{{$teachers}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('teachers.index')}}" target="_blank"><span class="text-danger">{{trans('teachers.Teachers')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('dashboardPage.Total Parents')}}</p>
                                    <h4>{{$parents}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i> <a href="{{route('parents')}}" target="_blank"><span class="text-danger">{{trans('parents.Parents')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('dashboardPage.Total Sections')}}</p>
                                    <h4>{{$sections}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i> <a href="{{route('sections.index')}}" target="_blank"><span class="text-danger">{{trans('sections.Sections')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->

            <div class="row">

                <div style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{trans('dashboardPage.Latest Actions')}}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="true"> {{trans('students.Students')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers" role="tab" aria-controls="teachers" aria-selected="false">{{trans('teachers.Teachers')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="parents" aria-selected="false"> {{trans('parents.Parents')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices" role="tab" aria-controls="fee_invoices" aria-selected="false">{{trans('fees.Tuition Invoices')}}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">

                                    {{--students Table--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>{{trans('students.Student Name')}}</th>
                                                        <th>{{trans('students.Email')}}</th>
                                                        <th>{{trans('students.Gender')}}</th>
                                                        <th>{{trans('classes.Class Name')}}</th>
                                                        <th>{{trans('grades.Grade Name')}}</th>
                                                        <th>{{trans('sections.Section Name')}}</th>
                                                        <th>{{trans('students.Created At')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->gender->name}}</td>
                                                        <td>{{$student->grade->name}}</td>
                                                        <td>{{$student->class->name}}</td>
                                                        <td>{{$student->section->name}}</td>
                                                        <td class="text-success">{{$student->created_at}}</td>
                                                        @empty
                                                        <td class="alert-danger" colspan="8">{{trans('dashboardPage.There Is No Data')}}</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--teachers Table--}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>{{trans('Teachers.Teacher Name')}}</th>
                                                        <th>{{trans('Teachers.Gender')}}</th>
                                                        <th>{{trans('Teachers.Hiring Date')}}</th>
                                                        <th>{{trans('Teachers.Specialization')}}</th>
                                                        <th>{{trans('teachers.Created At')}}</th>
                                                    </tr>
                                                </thead>

                                                @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$teacher->name}}</td>
                                                        <td>{{$teacher->gender->name}}</td>
                                                        <td>{{$teacher->hiring_date}}</td>
                                                        <td>{{$teacher->specialization->name}}</td>
                                                        <td class="text-success">{{$teacher->created_at}}</td>
                                                        @empty
                                                        <td class="alert-danger" colspan="8"> {{trans('dashboardPage.There Is No Data')}}</td>
                                                    </tr>
                                                </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>{{ trans('Parents.Father Name') }}</th>
                                                        <th>{{ trans('Parents.Email') }}</th>
                                                        <th>{{ trans('Parents.Father National ID') }}</th>
                                                        <th>{{ trans('Parents.Father Phone') }}</th>
                                                        <th>{{ trans('Parents.Created At') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\myParent::latest()->take(5)->get() as $parent)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$parent->father_name}}</td>
                                                        <td>{{$parent->email}}</td>
                                                        <td>{{$parent->father_national_id}}</td>
                                                        <td>{{$parent->father_phone}}</td>
                                                        <td class="text-success">{{$parent->created_at}}</td>
                                                        @empty
                                                        <td class="alert-danger" colspan="8"> {{trans('dashboardPage.There Is No Data')}}</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--fee Invoice Table--}}
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>{{trans('students.Student Name')}}</th>
                                                        <th>{{trans('fees.Fees Type')}}</th>
                                                        <th>{{trans('fees.Amount')}}</th>
                                                        <th> {{trans('grades.Grade Name')}}</th>
                                                        <th> {{trans('classes.Class Name')}}</th>
                                                        <th>{{trans('fees.Invoice Date')}}</th>
                                                        <th>{{trans('fees.Created At')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\FeeInvoice::latest()->take(10)->get() as $invoice)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$invoice->student->name}}</td>
                                                        <td>{{$invoice->fees->title}}</td>
                                                        <td>{{ number_format($invoice->amount, 2) }}</td>
                                                        <td>{{$invoice->grade->name}}</td>
                                                        <td>{{$invoice->class->name}}</td>
                                                        <td>{{$invoice->invoice_date}}</td>
                                                        <td class="text-success">{{$invoice->created_at}}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td class="alert-danger" colspan="9">{{trans('dashboardPage.There Is No Data')}}</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <livewire:calendar />


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
    @livewireScripts
    @stack('scripts')
</body>


</html>

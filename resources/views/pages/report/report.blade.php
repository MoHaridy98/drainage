<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>  تقارير مشروع الصرف المغطي </h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="approved-tab" data-toggle="tab"
                                                    href="#approved" role="tab" aria-controls="approved"
                                                    aria-selected="false">مشاريع
                                                    اعتمدت</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="notapproved-tab" data-toggle="tab"
                                                    href="#notapproved" role="tab" aria-controls="notapproved"
                                                    aria-selected="false">مشاريع
                                                    جديدة</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="changed-tab" data-toggle="tab" href="#changed"
                                                    role="tab" aria-controls="changed" aria-selected="false">مشاريع
                                                    عُدلت</a>
                                            </li>
                                        </ul>
                                        @include('layouts.success')
                                        @include('layouts.error')
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="approved" role="tabpanel"
                                                aria-labelledby="approved-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th> المشروع</th>
                                                                    <th> تاريخ الحصر (نهو)</th>
                                                                    <th> تاريخ العرض والنشر (نهو)</th>
                                                                    <th> تاريخ المعارضات (نهو)</th>
                                                                    <th> إبلاغ الضرائب</th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @isset($Vprojects)
                                                                    @if ($Vprojects && $Vprojects->count() > 0)
                                                                        @foreach ($Vprojects as $project)
                                                                            <tr>
                                                                                <td>{{ $project->id }}</td>
                                                                                <td>{{ $project->name }}</td>
                                                                                <td class="text-danger mb-2">{{ $project->pdate->enclose_end ?? 'NULL' }}</td>
                                                                                <td class="text-danger mb-2">{{ $project->pdate->view_end ?? 'NULL' }}</td>
                                                                                <td class="text-danger mb-2">{{ $project->pdate->opposition_end ?? 'NULL' }}</td>
                                                                                <td class="text-danger mb-2">{{ $project->pdate->tax_final ?? 'NULL' }}</td>
                                                                                <td>
                                                                                    <a class="badge badge-info text-dark mb-1"
                                                                                        href="{{ route('print', $project->id) }}">عرض
                                                                                        التقرير</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                @endisset
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="notapproved" role="tabpanel"
                                                aria-labelledby="notapproved-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الزمام</th>
                                                                    <th> تاريخ البدأ</th>
                                                                    <th>التكلفة الكلية</th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- @isset($unVprojects)
                                                                    @if ($unVprojects && $unVprojects->count() > 0)
                                                                        @foreach ($unVprojects as $project)
                                                                            <tr>
                                                                                <td>{{ $project->id }}</td>
                                                                                <td>{{ $project->name }}</td>
                                                                                <td>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->acre }}
                                                                                        فدان</div>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->carat }}
                                                                                        فراط</div>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->share }}
                                                                                        سهم</div>
                                                                                </td>
                                                                                <td>{{ $project->pdate->excution ?? 'NULL' }}
                                                                                </td>
                                                                                <td>{{ $project->total_cost }} جنية</td>
                                                                                <td>
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('space', $project->id) }}">عرض
                                                                                        وتعديل</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                @endisset --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="changed" role="tabpanel"
                                                aria-labelledby="changed-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الزمام</th>
                                                                    <th> تاريخ البدأ</th>
                                                                    <th>التكلفة الكلية</th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- @isset($chVprojects)
                                                                    @if ($chVprojects && $chVprojects->count() > 0)
                                                                        @foreach ($chVprojects as $project)
                                                                            <tr>
                                                                                <td>{{ $project->id }}</td>
                                                                                <td>{{ $project->name }}</td>
                                                                                <td>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->acre }}
                                                                                        فدان</div>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->carat }}
                                                                                        فراط</div>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->share }}
                                                                                        سهم</div>
                                                                                </td>
                                                                                <td>{{ $project->pdate->excution ?? 'NULL' }}
                                                                                </td>
                                                                                <td>{{ $project->total_cost }} جنية</td>
                                                                                <td>
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('space', $project->id) }}">عرض
                                                                                        وتعديل</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                @endisset --}}
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
                    </div>
                </section>
                @include('layouts.setting')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
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
                                        <h4> مـدريــة المساحــة </h4>
                                    </div>
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
                                                        <th>تاريخ الاخطار</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($projects)
                                                        @if ($projects && $projects->count() > 0)
                                                            @foreach ($projects as $project)
                                                                <tr>
                                                                    <td>{{ $project->id }}</td>
                                                                    <td>{{ $project->name }}</td>
                                                                    <td>
                                                                        <div class="badge badge-light">{{ $project->acre }}
                                                                            فدان</div>
                                                                        <div class="badge badge-light">{{ $project->carat }}
                                                                            فراط</div>
                                                                        <div class="badge badge-light">{{ $project->share }}
                                                                            سهم</div>
                                                                    </td>
                                                                    <td>{{ $project->pdate->area_initial ?? 'NULL' }}</td>
                                                                    <td>{{ $project->total_cost }} جنية</td>
                                                                    <td>
                                                                        <div class="btn-group dropup">
                                                                            <button id="btnGroupVerticalDrop5"type="button"
                                                                                class="btn"data-toggle="dropdown"
                                                                                aria-haspopup="true"aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-v"></i>
                                                                            </button>

                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="btnGroupVerticalDrop2">
                                                                                <a class="dropdown-item"
                                                                                    href="#">عرض</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    تعديل</a>
                                                                                <a class="dropdown-item"
                                                                                    href="#">حذف</a>
                                                                            </div>
                                                                        </div>
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
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>

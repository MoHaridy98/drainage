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
                                @include('layouts.success')
                                @include('layouts.error')
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4> المزارعيـــن</h4>
                                        <button class="btn btn-dark" style="position: absolute; left: 10px; top:5px"><a
                                                class="nav-link text-white"
                                                href="{{ route('agr.farmerCreate') }}">اضافة</a></button>
                                    </div>
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>اسم المركز</th>
                                                        <th>اسم المنطقة</th>
                                                        <th>اسم الجمعية</th>
                                                        <th>اسم المزارع</th>
                                                        <th>مساحة الارض المملوكة</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($Farmer)
                                                        @if ($Farmer && $Farmer->count() > 0)
                                                            @foreach ($Farmer as $Farmer)
                                                                <tr>
                                                                    <td>{{ $Farmer->id }}</td>
                                                                    <td>{{ $Farmer->assname->regionname->cityname->name }}
                                                                    </td>
                                                                    <td>{{ $Farmer->assname->regionname->name }}</td>
                                                                    <td>{{ $Farmer->assname->name }}</td>
                                                                    <td>{{ $Farmer->name }}</td>
                                                                    <td>
                                                                        <div class="badge badge-light">
                                                                            {{ $Farmer->acre }}
                                                                            فدان</div>
                                                                        <div class="badge badge-light">
                                                                            {{ $Farmer->carat }}
                                                                            فراط</div>
                                                                        <div class="badge badge-light">
                                                                            {{ $Farmer->share }}
                                                                            سهم</div>
                                                                    </td>
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
                                                                                    href="{{ route('agr.farmerEdit', $Farmer->id) }}">عرض
                                                                                    وتعديل</a>
                                                                                {{-- <a class="dropdown-item"
                                                                                href="{{ route('', $Farmer->id) }}">حذف</a> --}}
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
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>

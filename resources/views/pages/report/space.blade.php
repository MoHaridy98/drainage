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
                                    <div class="card-body">
                                        <form action="{{ route('space-date') }}" method="GET"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <button name="dateAction" value="all"
                                                    class="btn btn-primary col-2">عرض
                                                    الكل</button>
                                                <button name="dateAction" value="date" class="btn btn-info col-2">عرض
                                                    التاريخ</button>
                                                <input type="date" name="date" class="form-control col-8">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card card-secondary" id="print">
                                    <div class="card-header">
                                        <h4> الهيئة العامة للمساحة </h4>
                                        <h5> بيان عن مراحل العمل بمناطق الصرف المغطى خلال شهر {{ '' }}</h5>
                                    </div>
                                    {{-- <div id="centerlogo"
                                        style="margin-bottom: 30px ; justify-content: space-around; display:flex;">
                                        <img width="100px" height="120px" src="../images/logo/aswan.png">
                                        <img width="80px" height="100px" src="../images/logo/logo.png">
                                    </div> --}}
                                    <div class="card-body">
                                        <div class="card-body" style="direction: rtl;">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2"> # </th>
                                                            <th rowspan="2"> المشروع</th>
                                                            <th colspan="3"> الزمام</th>
                                                            <th colspan="2"> ت. الحصر</th>
                                                            <th colspan="2"> ت. العرض والنشر</th>
                                                            <th colspan="2"> ت. المعارضات</th>
                                                            <th rowspan="2"> ت.ارسال المناطق</th>
                                                            <th rowspan="2"> ت.ارسال الضرائب </th>
                                                        </tr>
                                                        <tr>
                                                            <td>ف</td>
                                                            <td>ط</td>
                                                            <td>س</td>
                                                            <td>بدء</td>
                                                            <td>نهو</td>
                                                            <td>بدء</td>
                                                            <td>نهو</td>
                                                            <td>بدء</td>
                                                            <td>نهو</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @isset($Vprojects)
                                                            @if ($Vprojects && $Vprojects->count() > 0)
                                                                @foreach ($Vprojects as $project)
                                                                    <tr>
                                                                        <td>{{ $project->id }}</td>
                                                                        <td>{{ $project->name }}</td>
                                                                        <td>
                                                                            {{ $project->net_acre ?? '-' }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $project->net_carat ?? '-' }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $project->net_share ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->enclose_start ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->enclose_end ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->view_start ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->view_end ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->opposition_start ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->opposition_end ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->area_final ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $project->tax_final ?? '-' }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </tbody>
                                                    <tfoot class="table-info">
                                                        <tr>
                                                            <th style="text-align:left">الاجمالي:</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-right d-flex">
                                    <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button"
                                        onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button>
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
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('table.table').DataTable({
                paging: false,
                searching: false,
                "bInfo": false,
                columnDefs: [{
                    target: 1,
                    className: 'cell-border'
                }],
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();
                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };

                    //total projects
                    totalProject = api
                        .column(1)
                        .data();
                    // Update footer
                    $(api.column(1).footer()).html(totalProject.count());
                },
            });
        });

        function printDiv() {
            // var printContents = document.getElementById('print').innerHTML;
            // var originalContents = document.body.innerHTML;
            // document.body.innerHTML = printContents;
            // window.print();
            // document.body.innerHTML = originalContents;
            // location.reload();
            var css = '@page { size: landscape; }',
                head = document.head || document.getElementsById('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);

            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
            window.print();
        }
    </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>

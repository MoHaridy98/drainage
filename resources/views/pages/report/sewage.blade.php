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
                                <div class="card card-secondary" id="print">
                                    <div class="card-header">
                                        <h4> الهيئة العامة لمشاريع الصرف</h4>
                                        <h5> بيان بالمشاريع التي تم تنفيذها من الانشاء وحتى تاريخه</h5>
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
                                                            <th rowspan="2"> ت. الانشاء</th>
                                                            <th rowspan="2"> ت. الانتهاء</th>
                                                            <th rowspan="2"> التكلفة</th>
                                                            <th rowspan="2"> المحصل</th>
                                                            <th rowspan="2"> المتبقي</th>
                                                            <th rowspan="2"> ت.ارساله للهيئات </th>
                                                        </tr>
                                                        <tr>
                                                            <td>ف</td>
                                                            <td>ط</td>
                                                            <td>س</td>
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
                                                                            {{ $project->acre }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $project->carat }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $project->share }}
                                                                        </td>
                                                                        <td>{{ $project->pdate->excution ?? 'NULL' }}
                                                                        </td>
                                                                        <td>{{ $project->pdate->end ?? 'NULL' }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $project->total_cost ?? 'NULL' }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $project->projectInstallment->sum('amount') ?? '0' }}
                                                                        </td>
                                                                        <td class="text-danger mb-2">
                                                                            {{ ($project->total_cost ?? '0') - ($project->projectInstallment->sum('amount') ?? '0') }}
                                                                        </td>
                                                                        </td>
                                                                        <td>{{ $project->pdate->tax_initial ?? 'NULL' }}
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
                    // TotalCost over all pages
                    totalCost = api
                        .column(7)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    // totalCollect over all pages
                    totalCollect = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    // totalRemain over all pages
                    totalRemain = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    // Update footer
                    $(api.column(1).footer()).html(totalProject.count());
                    $(api.column(7).footer()).html(totalCost);
                    $(api.column(8).footer()).html(totalCollect);
                    $(api.column(9).footer()).html(totalRemain);
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

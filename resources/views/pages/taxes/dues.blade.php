<!DOCTYPE html>
<html lang="en">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 style="display: inline-block">مشروع / &nbsp;</h3>
                        <h2 style="display: inline-block"> {{ $projects->name }} </h2>
                    </div>
                </div>
                <div class="row" style="direction: rtl" id="print">
                    <div class="col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>بيانات المشروع</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label> اسم المشروع</label>
                                        <input type="text" class="form-control" value="{{ $projects->name }}"
                                            disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ الانشاء</label>
                                        <input type="text" value="{{ $projects->pdate->excution }}"
                                            class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ الانتهاء</label>
                                        <input type="text" value="{{ $projects->pdate->end }}" class="form-control"
                                            disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ ابلاغ الصرف</label>
                                        <input type="text" value="{{ $projects->pdate->tax_initial }}"
                                            class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ ابلاغ المساحة</label>
                                        <input type="text" value="{{ $projects->pdate->tax_final }}"
                                            class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>فدان زمام </label>
                                        <input type="text" value="{{ $projects->net_acre }}" class="form-control"
                                            disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>قيراط زمام </label>
                                        <input type="number" value="{{ $projects->net_carat }}" class="form-control"
                                            disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>سهم زمام </label>
                                        <input type="number" value="{{ $projects->net_share }}" class="form-control"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4>المستحقات</h4>
                            </div>
                            <div class="card-body" style="direction: rtl;">
                                <table class="table table-striped table-hover" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>اسم المركز</th>
                                            <th>اسم المنطقة</th>
                                            <th>اسم الجمعية</th>
                                            <th>اسم المزارع</th>
                                            <th>التكلفة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($Benefits)
                                            @if ($Benefits && $Benefits->count() > 0)
                                                @foreach ($Benefits as $item)
                                                    <tr>
                                                        <td>{{ $item->farmerName->assname->regionname->cityname->name }}
                                                        </td>
                                                        <td>{{ $item->farmerName->assname->regionname->name }}
                                                        </td>
                                                        <td>{{ $item->farmerName->assname->name }}
                                                        </td>
                                                        <td>{{ $item->farmerName->name }}
                                                        </td>
                                                        <td>{{ $item->Total_installment ?? 0 }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>تكلفة المشروع: </th>
                                            <th>{{ $projects->total_cost }}</th>
                                            <th></th>
                                            <th style="text-align:left">الاجمالي:</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="justify-content-right d-flex">
                                    <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button"
                                        onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                class="btn btn-primary form-label" onclick="addWorkRow()">+ اضف مستحق
                            </a> --}}
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
    <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $(document).ready(function() {
            $('table.table').DataTable({
                paging: false,
                searching: false,
                "bInfo": false,
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();
                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    // Update footer
                    $(api.column(4).footer()).html(total);
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
            // var css = '@page { size: landscape; }',
            //     head = document.head || document.getElementsById('head')[0],
            //     style = document.createElement('style');

            // style.type = 'text/css';
            // style.media = 'print';

            // if (style.styleSheet) {
            //     style.styleSheet.cssText = css;
            // } else {
            //     style.appendChild(document.createTextNode(css));
            // }

            // head.appendChild(style);
            document.getElementById('print_Button').style.display = "none"
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


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>

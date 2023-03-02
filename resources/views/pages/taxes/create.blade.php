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
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
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
                        @include('layouts.success')
                        @include('layouts.error')
                        <div class="row" style="direction: rtl">
                            <div class="col-lg-6">
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('taxes.create', $project->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h4>الضرائب العقارية</h4>
                                            {{-- <button class="btn btn-success" type="button"
                                                style="position: absolute; left: 10px; top:5px"><a
                                                    class="nav-link text-white"
                                                    href="{{ route('space.dues', $project->id) }}">اضافة
                                                    مستحقات</a></button> --}}
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label> اسم المشروع</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $project->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ الانشاء</label>
                                                    <input type="text" value="{{ $project->pdate->excution }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ الانتهاء</label>
                                                    <input type="text" value="{{ $project->pdate->end }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ ابلاغ الضرائب</label>
                                                    <input type="text" value="{{ $project->pdate->tax_final }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label> التكلفة المستحقة</label>
                                                    <input type="text" value="{{ $project->total_cost }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>اجمالي ما تم جمعه</label>
                                                    <input type="text" value="{{ $inst }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المتبقي من اجمالي التكلفة</label>
                                                    <input type="text" value="{{ $project->total_cost - $inst }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label> قيمة القسط السنوي</label>
                                                    <input type="text" value="{{ $project->total_cost / 20 }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>بداية من</label>
                                                    <input type="text" value="{{ $year }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>الى</label>
                                                    <input type="text" value="{{ $year + 20 }}"
                                                        class="form-control" disabled>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row pt-2">
                                                <div class="form-group col-md-7">
                                                    <label>
                                                        <h6>اضافة اجمالي مستحقات</h6>
                                                    </label>
                                                    <input type="text" name="amount" step="0.1"
                                                        placeholder="ادخل القيمة الجديدة" class="form-control">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label>
                                                        <h6>التاريخ</h6>
                                                    </label>
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>جدول التسديد</h4>
                                    </div>
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>قيمة القسط</th>
                                                        <th>التاريخ</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($installment)
                                                        @if ($installment && $installment->count() > 0)
                                                            @foreach ($installment as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>
                                                                    <td>{{ $item->amount }}</td>
                                                                    <td>{{ $item->date }}</td>
                                                                    <td>
                                                                        <div class="btn-group dropup">
                                                                            <button
                                                                                id="btnGroupVerticalDrop5"type="button"
                                                                                class="btn"data-toggle="dropdown"
                                                                                aria-haspopup="true"aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-v"></i>
                                                                            </button>

                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="btnGroupVerticalDrop2">
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('taxes.delete', $item->id) }}">حذف</a>
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
                            <div class="col-lg-6">
                                <div class="card card-secondary" id="print">
                                    <div class="card-header">
                                        <h4> جدول الاقساط السنوية ل " {{ $project->name }} " </h4>
                                    </div>
                                    <div class="card-body" style="direction: rtl;">
                                        <table class="table table-striped table-hover" id="table"
                                            style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>السنة</th>
                                                    <th>قيمة القسط</th>
                                                    <th>المحصل</th>
                                                    <th>المتأخرات</th>
                                                    <th>اجمالي المطلوب</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (range($year, $year + 19) as $y)
                                                    <tr>
                                                        <td>{{ $y }}</td>
                                                        <td>{{ number_format($project->total_cost / 19, 4) }}</td>
                                                        <td>{{ $totalYear = number_format(App\Models\Installment::select('amount')->whereYear('date', $y)->where('project_id', $project->id)->sum('amount'),4) }}
                                                        </td>
                                                        <td>
                                                            @if (@Carbon\Carbon::today()->year >= $y)
                                                                {{ number_format($project->total_cost / 19 - $totalYear, 4) }}
                                                            @else
                                                                {{ 0 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($y == $year)
                                                                {{ number_format($project->total_cost / 19, 4) }}
                                                            @elseif(@Carbon\Carbon::today()->year == $y)
                                                                <span
                                                                    style="color: red; font-weight: bold">{{ number_format($project->total_cost / 19 -App\Models\Installment::select('amount')->whereYear('date', $y - 1)->where('project_id', $project->id)->sum('amount') +$project->total_cost / 19,4) }}</span>
                                                            @else
                                                                {{ number_format($project->total_cost / 19, 4) }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>الاجمالي:</td>
                                                    <td>{{ $project->total_cost }}</td>
                                                    <td>المحصل:</td>
                                                    <td>{{ $inst }}</td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="justify-content-right d-flex">
                                            <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button"
                                                onclick="printDiv()"> <i
                                                    class="mdi mdi-printer ml-1"></i>طباعة</button>
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
    <!-- Page Specific JS File -->
    <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                paging: false,
                searching: false,
            });
            $('table.table').DataTable();
        });

        function printDiv() {
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

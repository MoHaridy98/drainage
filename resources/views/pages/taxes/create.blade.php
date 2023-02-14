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
                                                    {{-- <input type="text"
                                                        value="
                                                    @if ($installment && $installment->count() > 0) @foreach ($installment as $item)
                                                            {{ $item->amount->count() }}
                                                            @endforeach @endif
                                                     "
                                                        class="form-control" disabled> --}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المتبقي من اجمالي التكلفة</label>
                                                    {{-- <input type="text"
                                                        value="{{ $project->total_cost - $installment->amount }}"
                                                        class="form-control" disabled> --}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row pt-2">
                                                <div class="form-group col-md-7">
                                                    <label>
                                                        <h6>اضافة اجمالي مستحقات</h6>
                                                    </label>
                                                    <input type="text" name="amount"
                                                        placeholder="ادخل القيمة الجديدة" class="form-control">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label>
                                                        <h6>التاريخ</h6>
                                                    </label>
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4>جدول الاقساط</h4>
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
                                                                            <button id="btnGroupVerticalDrop5"type="button"
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
            $('table.table').DataTable();
        });

        function addWorkRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 6) {
                const div = document.createElement('div');
                div.className = 'card card-primary work-xp';
                div.innerHTML = `
                <div class="card-body form-row">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control"placeholder=" اسم المشروع / المنطقة">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" name="xp-year" class="form-control"placeholder="المساحة">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" name="work-xp" class="form-control"placeholder=" التكلفة المستحقة">
                    </div>
                    </div>
                    <input type="button" class="btn-danger" style="width: 50px;
                    height: 35px; position: absolute; left: 0; border-radius: 10px" value="x" onclick="removeWorkRow(this)" />
                `;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 6) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work-xp").length != 6) {
                    document.getElementById("addWork-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(input) {
            console.log(input);
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 6) {
                document.getElementById("addWork-btn").style.display = "block";
            }
        }
    </script>
    <script>
        function addSkillRow() {
            var elements = document.getElementsByClassName('skill-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("skills").length < 10) {
                const div = document.createElement('div');
                div.className = 'col-md-4 skills';
                div.innerHTML = `
                <div class="h5">
                <select type="text" name="skill_id[]" class="skill-input" id="" placeholder="اسم المهارة">
                <optgroup label="من فضلك أخترالمهارة "></optgroup>

                <option value=""</option>

                </select>
                <a href="javascript:void(0)" style="padding: 5px 20px 5px 20px;"
                            class="btn btn-danger form-label" onclick="removeSkillRow(this)">-</a>
              </div>
            `;
                document.getElementById('skills').appendChild(div);
                if (document.getElementsByClassName("skills").length == 9) {
                    document.getElementById("addSkill-btn").style.display = "none";
                }
                if (document.getElementsByClassName("skills").length != 9) {
                    document.getElementById("addSkill-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeSkillRow(input) {
            confirm("متأكد؟") ? document.getElementById('skills').removeChild(input.parentNode.parentNode) : 0;
            if (document.getElementsByClassName("skills").length != 9) {
                document.getElementById("addSkill-btn").style.display = "block";
            }
        }
    </script>
</body>
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>

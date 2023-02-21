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
    <style>
        @media print {
            #print_Button {
                display: none;
            }

            #DataTables_Table_0_filter {
                display: none;
            }

            #DataTables_Table_0_length {
                display: none;
            }

            #DataTables_Table_0_paginate {
                display: none;
            }

            #DataTables_Table_0_info {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section" id="print">
                    <div id="centerlogo"
                        style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                        <img width="80px" height="100px" src="../images/logo/aswan.png">

                        <img width="80px" height="100px" src="../images/logo/logo.png">
                    </div>
                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <div class="card card-primary work-xp">
                                    <div class="card-header">
                                        <h3>تقرير تفصيلي لمشروع "{{ $projects->name }}"</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px; ">
                                                        اسم المشروع : </th>
                                                    <td style="text-align: inherit; ">{{ $projects->name }}</td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px; ">
                                                        تاريخ الانشاء :</th>
                                                    <td style="text-align: inherit; ">
                                                        {{ $projects->pdate->enclose_end }}</td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px; ">
                                                        تاريخ الانتهاء :</th>
                                                    <td style="text-align: inherit;">
                                                        {{ $projects->pdate->enclose_end }}</td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        التكلفة المستحقة :</th>
                                                    <td style="text-align: inherit;">{{ $projects->total_cost }}
                                                        جنيه
                                                    </td>
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        ما تم تحصيله :</th>
                                                    <td style="text-align: inherit;">
                                                        {{ $projects->projectInstallment->sum('amount') ?? '0' }}
                                                        جنيه
                                                    </td>
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        التكلفة المتبقية :</th>
                                                    <td style="text-align: inherit;">
                                                        {{ ($projects->total_cost ?? '0') - ($projects->projectInstallment->sum('amount') ?? '0') }}
                                                        جنيه
                                                    </td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        المساحة / الزمام :</th>
                                                    <td style="text-align: inherit;">
                                                        <div class="badge badge-light">
                                                            {{ $projects->acre }}
                                                            فدان</div>
                                                        <div class="badge badge-light">
                                                            {{ $projects->carat }}
                                                            فراط</div>
                                                        <div class="badge badge-light">
                                                            {{ $projects->share }}
                                                            سهم</div>
                                                    </td>
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        المساحة / الزمام (الفعلي):</th>
                                                    <td style="text-align: inherit;">
                                                        <div class="badge badge-light">
                                                            {{ $projects->net_acre }}
                                                            فدان</div>
                                                        <div class="badge badge-light">
                                                            {{ $projects->net_carat }}
                                                            فراط</div>
                                                        <div class="badge badge-light">
                                                            {{ $projects->net_share }}
                                                            سهم</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-bordered" style="margin-top: 50px;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">تاريخ الحصر </th>
                                                    <th scope="col">تاريخ العرض والنشر </th>
                                                    <th scope="col">تاريخ المعارضات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">بدأ</th>
                                                    <td>{{ $projects->pdate->enclose_start }}</td>
                                                    <td>{{ $projects->pdate->view_start }}</td>
                                                    <td>{{ $projects->pdate->opposition_start }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">نهو</th>
                                                    <td>{{ $projects->pdate->enclose_end }}</td>
                                                    <td>{{ $projects->pdate->view_end }}</td>
                                                    <td>{{ $projects->pdate->opposition_end }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="margin-top: 50px;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">تاريخ ابلاغ الضرائب </th>
                                                    <th scope="col">تاريخ ابلاغ المساحة </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">مبدأي (صرف)</th>
                                                    <td>{{ $projects->pdate->tax_initial }}</td>
                                                    <td>{{ $projects->pdate->area_initial }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">نهائي (مساحة)</th>
                                                    <td>{{ $projects->pdate->tax_final }}</td>
                                                    <td>{{ $projects->pdate->area_final }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
    <!-- Page Specific JS File -->
    <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
    <script>
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

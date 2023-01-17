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
                <section class="section">
                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <form class="needs-validation" novalidate="" action="{{ route('space.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>مراحل العمل [مـدريــة المساحة] </h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <label> فئة المشاريع</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="categorys_id">
                                                            <option> الصرف المغطي </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>اختر المشروع</label>
                                                    <select class="form-control" style="height: unset"
                                                        name="categorys_id">
                                                        <option> الصرف المغطي </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card card-primary work-xp">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label> التكلفة المستحقة</label>
                                                    <input type="number" name="work-xp"
                                                        class="form-control"placeholder=" التكلفة المستحقة" disabled>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>فدان زمام الصرف </label>
                                                    <input type="number" name="acre"
                                                        class="form-control"placeholder="فدان" disabled>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>قيراط زمام الصرف </label>
                                                    <input type="number" name="carat"
                                                        class="form-control"placeholder="قراط" disabled>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>سهم زمام الصرف </label>
                                                    <input type="number" name="share"
                                                        class="form-control"placeholder="سهم" disabled>
                                                </div>

                                            </div>
                                            <div class="form-row pt-2">
                                                <div class="form-group col-md-3">
                                                    <label
                                                        style="font-size: 14px;font-weight: 700;line-height: 20px;-ms-grid-row-align: center;align-self: center;width: 100%;padding: 8px 8px;align-items: center;">
                                                        الزمام الفعلي للمصرف:</label>
                                                </div>
                                                <div class="form-group col-md-3">

                                                    <input type="number" name="net_acre"
                                                        class="form-control"placeholder="فدان">
                                                </div>
                                                <div class="form-group col-md-3">

                                                    <input type="number" name="net_carat"
                                                        class="form-control"placeholder="قراط">
                                                </div>
                                                <div class="form-group col-md-3">

                                                    <input type="number" name="net_share"
                                                        class="form-control"placeholder="سهم">
                                                </div>
                                            </div>
                                            <div class="form-row pt-2">
                                                <div class="form-group col-md-2">
                                                    <label
                                                        style="font-size: 14px;font-weight: 700;line-height: 20px;-ms-grid-row-align: center;align-self: center;width: 100%;padding: 8px 8px;align-items: center;">
                                                        تاريخ الحصر :</label>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">بدأ</label>
                                                    <input type="date" name="enclose_start" class="form-control"
                                                        placeholder="فدان">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">نهو</label>
                                                    <input type="date" name="enclose_end"
                                                        class="form-control"placeholder="قراط">
                                                </div>
                                            </div>
                                            <div class="form-row pt-2">
                                                <div class="form-group col-md-2">
                                                    <label
                                                        style="font-size: 14px;font-weight: 700;line-height: 20px;-ms-grid-row-align: center;align-self: center;width: 100%;padding: 8px 8px;align-items: center;">
                                                        تاريخ العرض والنشر :</label>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">بدأ</label>
                                                    <input type="date" name="view_start" class="form-control"
                                                        placeholder="فدان">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">نهو</label>
                                                    <input type="date" name="view_end"
                                                        class="form-control"placeholder="قراط">
                                                </div>
                                            </div>
                                            <div class="form-row pt-2">
                                                <div class="form-group col-md-2">
                                                    <label
                                                        style="font-size: 14px;font-weight: 700;line-height: 20px;-ms-grid-row-align: center;align-self: center;width: 100%;padding: 8px 8px;align-items: center;">
                                                        تاريخ المعارضات :</label>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">بدأ</label>
                                                    <input type="date" name="opposition_start"
                                                        class="form-control" placeholder="فدان">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">نهو</label>
                                                    <input type="date" name="opposition_end"
                                                        class="form-control"placeholder="قراط">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="">تاريخ ارسال المناطق</label>
                                                    <input type="date" name="area_final" class="form-control"
                                                        placeholder="فدان">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">تاريخ ابلاغ الضرائب</label>
                                                    <input type="date" name="tax_final" class="form-control"
                                                        placeholder="فدان">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </form>
                            </div>
                            {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                class="btn btn-primary form-label" onclick="addWorkRow()">+ اضف مستحق
                            </a> --}}
                        </div>
                    </div>
            </div>
            </section>
            <div class="settingSidebar">
                <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                </a>
                <div class="settingSidebar-body ps-container ps-theme-default">
                    <div class=" fade show active">
                        <div class="setting-panel-header">Setting Panel
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Select Layout</h6>
                            <div class="selectgroup layout-color w-50">
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="1"
                                        class="selectgroup-input-radio select-layout" checked>
                                    <span class="selectgroup-button">Light</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="2"
                                        class="selectgroup-input-radio select-layout">
                                    <span class="selectgroup-button">Dark</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Sidebar Color</h6>
                            <div class="selectgroup selectgroup-pills sidebar-color">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1"
                                        class="selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                        data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2"
                                        class="selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                        data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Color Theme</h6>
                            <div class="theme-setting-options">
                                <ul class="choose-theme list-unstyled mb-0">
                                    <li title="white" class="active">
                                        <div class="white"></div>
                                    </li>
                                    <li title="cyan">
                                        <div class="cyan"></div>
                                    </li>
                                    <li title="black">
                                        <div class="black"></div>
                                    </li>
                                    <li title="purple">
                                        <div class="purple"></div>
                                    </li>
                                    <li title="orange">
                                        <div class="orange"></div>
                                    </li>
                                    <li title="green">
                                        <div class="green"></div>
                                    </li>
                                    <li title="red">
                                        <div class="red"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        id="mini_sidebar_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Mini Sidebar</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        id="sticky_header_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Sticky Header</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                <i class="fas fa-undo"></i> Restore Default
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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

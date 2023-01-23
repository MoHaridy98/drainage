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
                                <form class="needs-validation" novalidate="" action="#" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div id="work_experience">
                                        <div class="card card-primary farmer">
                                            <div class="card-header">
                                                <h4>مـدريــة الزراعة</h4>
                                                <button class="btn btn-dark"
                                                    style="position: absolute; left: 10px; top:5px"><a
                                                        class="nav-link text-white"
                                                        href="{{ route('agr.farmer') }}">عودة</a></button>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label> اختر المركز</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <select class="form-control" name="city">
                                                            <option> الصرف المغطي </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label> المنطقة</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <select class="form-control" name="region">
                                                            <option> الصرف المغطي </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label> اختر الجمعية</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <select class="form-control" name="agr_ass">
                                                            <option> الصرف المغطي </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-5">
                                                        <label>اسم المزارع</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <input style="height: calc(2.25rem + 6px);" type="text"
                                                            name="farmer_name"
                                                            class="form-control farmer-input"placeholder="اسم المزارع رباعي">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label
                                                            style="font-size: 14px;font-weight: 700;line-height: 20px;-ms-grid-row-align: center;align-self: center;width: 100%;padding: 8px 8px;align-items: center;">
                                                            الزمام المملوك</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">فدان</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <input type="number" name="acre"
                                                            class="form-control farmer-input"placeholder="فدان">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">قراط</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <input type="number" name="carat"
                                                            class="form-control farmer-input"placeholder="قراط">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">سهم</label>
                                                        <input type="text" class="form-control" value=""
                                                            disabled>
                                                        <input type="number" name="share"
                                                            class="form-control farmer-input"placeholder="سهم">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                        class="btn btn-primary" onclick="addWorkRow()">+ اضف مزارع
                                    </a> --}}
                                </form>
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
    {{-- <script>
        function addWorkRow() {
            var elements = document.getElementsByClassName('farmer-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("farmer").length < 5) {
                const div = document.createElement('div');
                div.className = 'card card-primary farmer';
                div.innerHTML = `
                    <div class="card-body form-row">
                        <div class="form-group col-md-5">
                            <label>اسم المزارع</label>
                            <input style="height: calc(2.25rem + 6px);" type="text"
                                name="farmer_name"
                                class="form-control farmer-input"placeholder="اسم المزارع رباعي">
                        </div>
                        <div class="form-group col-md-1">
                            <label
                                style="font-size: 14px;font-weight: 700;line-height: 20px;-ms-grid-row-align: center;align-self: center;width: 100%;padding: 8px 8px;align-items: center;">
                                الزمام المملوك</label>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">فدان</label>
                            <input type="number" name="acre"
                                class="form-control farmer-input"placeholder="فدان">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">قراط</label>
                            <input type="number" name="carat"
                                class="form-control farmer-input"placeholder="قراط">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">سهم</label>
                            <input type="number" name="share"
                                class="form-control farmer-input"placeholder="سهم">
                        </div>
                    </div>
                    <input type="button" class="btn btn-danger btn-sm" style="width: 30px;
                        height: 30px; position: absolute; top: 5px; left: 5px;" value="x" onclick="removeWorkRow(this)" />
                    `;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("farmer").length == 5) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("farmer").length != 5) {
                    document.getElementById("addWork-btn").style.display = "inline-block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(input) {
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("farmer").length != 5) {
                document.getElementById("addWork-btn").style.display = "inline-block";
            }
        }
    </script> --}}
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>

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

                <div class="row" style="direction: rtl">

                    <div class="col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>مـدريــة الزراعة</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" id="work_experience" novalidate=""
                                    action="{{ route('agr.update', $Agrass->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label> اختر المركز</label>
                                            <input type="text" class="form-control"
                                                value="{{ $Agrass->regionname->cityname->name }}" disabled>
                                            <select class="form-control" id="city" name="city">
                                                {{-- <option value="{{ $Agrass->regionname->cityname->id }}" selected hidden>
                                                    {{ $Agrass->regionname->cityname->name }}</option> --}}
                                                <option value="{{ $Agrass->regionname->cityname->id }}" selected hidden>
                                                    اختر المركز</option>
                                                @isset($City)
                                                    @if ($City && $City->count() > 0)
                                                        @foreach ($City as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label> المنطقة</label>
                                            <input type="text" class="form-control"
                                                value="{{ $Agrass->regionname->name }}" disabled>
                                            <select class="form-control" name="region">
                                                {{-- <option value="{{ $Agrass->regionname->id }}" selected hidden>
                                                    {{ $Agrass->regionname->name }}</option> --}}
                                                <option value="{{ $Agrass->regionname->id }}" selected hidden>اختر
                                                    المنطقة</option>
                                                @isset($Region)
                                                    @if ($Region && $Region->count() > 0)
                                                        @foreach ($Region as $item)
                                                            <option class="option city-{{ $item->city_id }}"
                                                                value="{{ $item->id }}">
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label> اسم الجمعية</label>
                                            <input type="text" class="form-control" value="{{ $Agrass->name }}"
                                                disabled>
                                            <input style="height: calc(2.25rem + 6px);" type="text" name="agr_name"
                                                class="form-control" value="{{ $Agrass->name }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4> مزارعو الجمعية</h4>
                            </div>
                            <div class="card-body" style="direction: rtl;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>اسم الجمعية</th>
                                                <th>اسم المزارع</th>
                                                <th>تفاصيل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($Farmer)
                                                @if ($Farmer && $Farmer->count() > 0)
                                                    @foreach ($Farmer as $Farmer)
                                                        <tr>
                                                            <td>{{ $Farmer->id }}</td>
                                                            <td>{{ $Agrass->name }}</td>
                                                            <td>{{ $Farmer->name }}</td>
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
                    {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                class="btn btn-primary form-label" onclick="addWorkRow()">+ اضف مستحق
                            </a> --}}
                </div>
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
        $('.option').hide();
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });

        function addWorkRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 4) {
                const div = document.createElement('div');
                div.className = 'card card-primary';
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
                <input type="button" class="btn-danger" style="width: 50px;
                height: 35px;" value="x" onclick="removeWorkRow(this)" />
                </div>
                `;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 4) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work-xp").length != 4) {
                    document.getElementById("addWork-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(input) {
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 4) {
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

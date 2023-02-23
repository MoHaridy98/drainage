<!DOCTYPE html>
<html lang="en">

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

                                <form class="needs-validation" id="work_experience" novalidate=""
                                    action="{{ route('update.User', $user->id) }}" method="get"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>تعديل مستخدم </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">

                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $user->name }}" name="name"
                                                        class="form-control"placeholder=" اسم المستخدم  ">
                                                </div>
                                                <div class="form-group col-md-6">

                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $user->email }}" name="email"
                                                        class="form-control"placeholder=" البريد الإلكتروني ">
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input style="height: calc(2.25rem + 6px);" type="password"
                                                        value="{{ $user->password }}" name="password"
                                                        class="form-control"placeholder=" الرقم السري ">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">

                                                    <select class="form-control" name="role">
                                                        <option value="{{ $user->role }}" hidden> {{ $user->role }}
                                                        </option>
                                                        @isset($roles)
                                                            @if ($roles && $roles->count() > 0)
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->name }}">{{ $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">

                                                    <select class="form-control" name="state">
                                                        <option value="{{ $user->state }}" disabled selected>
                                                            {{ $user->state }}
                                                        </option>
                                                        <option value="1"> فعال </option>
                                                        <option value="0"> غير فعال</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
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


</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>

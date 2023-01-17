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
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
                                    <div class="card-header">
                                        <h4> كل المنتاجات </h4>
                                    </div>
                                    <div class="card-body" style="direction: rtl;">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                          <li class="nav-item ">
                                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                              aria-controls="profile" aria-selected="false">1</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                              aria-controls="contact" aria-selected="false">2</a>
                                          </li>

                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="save-stage"
                                                    style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th>اسم المورد</th>
                                                            <th> رقم الموبايل</th>
                                                            <th>حالة</th>
                                                            <th>التخصص</th>
                                                            <th>دائن</th>
                                                            <th>مدين</th>
                                                            <th>تفاصيل</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                          </div>
                                          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="save-stage"
                                                    style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th>اسم المورد</th>
                                                            <th> رقم الموبايل</th>
                                                            <th>حالة</th>
                                                            <th>التخصص</th>
                                                            <th>دائن</th>
                                                            <th>مدين</th>
                                                            <th>تفاصيل</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
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
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>

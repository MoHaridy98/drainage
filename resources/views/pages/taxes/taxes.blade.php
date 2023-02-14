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
                {{-- <div class="card card-primary">
                    <div class="card-header">
                        <h4>الضرائب العقارية </h4>
                    </div>
                    <div class="card-body">

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label> لمشاريع</label>
                                <div class="input-group">
                                    <select class="form-control" name="categorys_id">
                                        <option> الصرف المغطي </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                @include('layouts.success')
                                @include('layouts.error')

                            </div>
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>الضرائب العقارية </h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            {{-- <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                    href="#home" role="tab" aria-controls="home"
                                                    aria-selected="true">كل المشاريع</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                                    href="#profile" role="tab" aria-controls="profile"
                                                    aria-selected="false">مشاريع
                                                    مستحقة</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                                    role="tab" aria-controls="contact" aria-selected="false">مشاريع
                                                    استحقت</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            {{-- <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>المركز</th>
                                                                    <th>المنطقة</th>
                                                                    <th>الجمعية</th>
                                                                    <th>المشروع</th>
                                                                    <th>تكلفة المشروع</th>
                                                                    <th>ما تم تحصيله</th>
                                                                    <th>المتبقي</th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @isset($projects)
                                                                    @if ($projects && $projects->count() > 0)
                                                                        @foreach ($projects as $project)
                                                                            <tr>
                                                                                <td>{{ $project->id }}</td>
                                                                                <td>{{ $project->name }}</td>
                                                                                <td>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->acre }}
                                                                                        فدان</div>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->carat }}
                                                                                        فراط</div>
                                                                                    <div class="badge badge-light">
                                                                                        {{ $project->share }}
                                                                                        سهم</div>
                                                                                </td>
                                                                                <td>{{ $project->pdate->excution ?? 'NULL' }}
                                                                                </td>
                                                                                <td>{{ $project->total_cost }} جنية</td>
                                                                                <td>
                                                                                    <div class="btn-group dropup">
                                                                                        <button
                                                                                            id="btnGroupVerticalDrop5"type="button"
                                                                                            class="btn"data-toggle="dropdown"
                                                                                            aria-haspopup="true"aria-expanded="false">
                                                                                            <i
                                                                                                class="fas fa-ellipsis-v"></i>
                                                                                        </button>

                                                                                        <div class="dropdown-menu"
                                                                                            aria-labelledby="btnGroupVerticalDrop2">
                                                                                            <a class="dropdown-item"
                                                                                                href="{{ route('sewage.edit', $project->id) }}">عرض
                                                                                                وتعديل</a>
                                                                                            <a class="dropdown-item"
                                                                                                href="{{ route('sewage.delete', $project->id) }}">حذف</a>
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
                                            </div> --}}
                                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    {{-- <th> # </th>
                                                                    <th>المركز</th>
                                                                    <th>المنطقة</th>
                                                                    <th>الجمعية</th> --}}
                                                                    <th>المشروع</th>
                                                                    <th>ت وارد م.المساحة</th>
                                                                    <th>تكلفة المشروع</th>
                                                                    <th>ما تم تحصيله</th>
                                                                    <th>المتبقي</th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @isset($projectTotal)
                                                                    @if ($projectTotal && $projectTotal->count() > 0)
                                                                        @foreach ($projectTotal as $project)
                                                                            <tr>
                                                                                <td>{{ $project->name }}</td>
                                                                                <td>{{ $project->tax_final }}</td>
                                                                                <td>{{ $project->total_cost }} جنية
                                                                                </td>
                                                                                <td>{{ $project->amount ?? '0' }} جنية
                                                                                </td>
                                                                                <td>{{ $project->total_cost - $project->amount }}
                                                                                    جنية</td>
                                                                                <td>
                                                                                    <div class="btn-group dropup">
                                                                                        <button
                                                                                            id="btnGroupVerticalDrop5"type="button"
                                                                                            class="btn"data-toggle="dropdown"
                                                                                            aria-haspopup="true"aria-expanded="false">
                                                                                            <i
                                                                                                class="fas fa-ellipsis-v"></i>
                                                                                        </button>
                                                                                        <div class="dropdown-menu"
                                                                                            aria-labelledby="btnGroupVerticalDrop2">
                                                                                            <a class="dropdown-item"
                                                                                                href="{{ route('taxes.total', $project->id) }}">اضافة
                                                                                                اجمالية</a>
                                                                                            {{-- <a class="dropdown-item"
                                                                                                href="#">اضافة
                                                                                                اقساط</a> --}}

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
                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    {{-- <th> # </th>
                                                                    <th>المركز</th>
                                                                    <th>المنطقة</th>
                                                                    <th>الجمعية</th> --}}
                                                                    <th>المشروع</th>
                                                                    <th>تكلفة المشروع</th>
                                                                    <th>ما تم تحصيله</th>
                                                                    <th>المتبقي</th>
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
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>

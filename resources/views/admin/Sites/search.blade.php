@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>جستجو</h3>
@endsection
@section('CSS')
    <link href="/admin-files/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="/admin-files/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-files/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-files/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-files/assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        @if(Session::has('create_site'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('create_site')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('edit_site'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('edit_site')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('delete_site'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('delete_site')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(count($sites) > 0)
            <form method="get" action="/admin/search ">
                <div class="input-group col-md-6 mb-4">
                    <input type="text" name="title" class="form-control" placeholder="نام سایت را وارد کنید" aria-label="نام سایت را وارد کنید">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                    </div>
                </div>
            </form>
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="card-header">
                        <div class="text-right">
                            <span class="float-left h5">سایت ها</span>
                            <a href="{{ route('sites.create') }}" class="btn btn-outline-info btn-sm">ایجاد سایت</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4 text-center">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sites as $site)
                                <tr>
                                    <td>{{ $counter += 1 }}</td>
                                    <td>{{ $site->name }}</td>
                                    @if($site->status == 1)
                                        <td><span class="badge badge-info">فعال</span></td>
                                    @else
                                        <td><span class="badge badge-danger">غیر فعال</span></td>
                                    @endif
                                    <td>
                                        <a class="btn btn-primary mt-1" href="{{ route('sites.show', $site->id) }}"><i data-feather="eye"></i></a>
                                        <a class="btn btn-warning mt-1" href="{{ route('sites.edit', $site->id) }}" ><i data-feather="edit"></i></a>
                                        <form id="form_{{ $site->id }}" method="post" action="/admin/sites/{{$site->id}}" class="d-inline-block">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-danger mt-1 warning confirm_{{$site->id}}"><i data-feather="trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    @else
        <form method="get" action="/admin/search ">
            <div class="input-group col-md-6 mb-4">
                <input type="text" name="title" class="form-control" placeholder="نام سایت را وارد کنید" aria-label="نام سایت را وارد کنید">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                </div>
            </div>
        </form>
        <div class="alert alert-danger mb-4 text-warning text-center">
            <h5 class="text-danger"><i data-feather="alert-triangle"></i> توجه!</h5>
            <p class="text-danger">سایت مورد نظر یافت نشد</p>
        </div>
    @endif
@endsection
@section('JS')
    <script src="/admin-files/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="/admin-files/plugins/sweetalerts/custom-sweetalert.js"></script>
    @foreach($sites as $site)
        <script>
            $('.widget-content .warning.confirm_{{$site->id}}').on('click', function () {
                swal({
                    title: 'آیا میخواهید این سایت را حذف کنید?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'حذف',
                    cancelButtonText: 'انصراف',
                    padding: '1em'
                }).then(function(result) {
                    if (result.value) {
                        document.getElementById("form_{{ $site->id }}").submit();
                    }
                })
            })
        </script>
    @endforeach
@endsection

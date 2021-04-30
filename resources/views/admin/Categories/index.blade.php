@extends('admin.Layout.master')
@section('CSS')
    <link href="/admin-files/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="/admin-files/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-files/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="/admin-files/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css"/>
@endsection
@section('breadcrumb')
    <h3>دسته بندی ها</h3>
@endsection
@section('content')
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        @if(Session::has('create_category'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('create_category')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('edit_category'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('edit_category')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('delete_category'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('delete_category')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(count($categories) > 0)
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="card-header">
                        <div class="text-right">
                            <span class="float-left h5">دسته بندی ها</span>
                            <a href="{{ route('categories.create') }}" class="btn btn-outline-info btn-sm">ایجاد دسته بندی</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4 text-center">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $counter += 1 }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ str_limit($category->description, 50) }}</td>
                                    <td>
                                        <a class="btn btn-primary mt-1" href="{{ route('categories.show', $category->id) }}"><i data-feather="eye"></i></a>
                                        <a class="btn btn-warning mt-1" href="{{ route('categories.edit', $category->id) }}" ><i data-feather="edit"></i></a>
                                        <form id="form_{{ $category->id }}" method="post" action="/admin/categories/{{$category->id}}" class="d-inline-block">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-danger mt-1 warning confirm_{{$category->id}}"><i data-feather="trash-2"></i></button>
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
        <div class="alert alert-danger mb-4 text-warning text-center">
            <h5 class="text-danger"><i data-feather="alert-triangle"></i> توجه!</h5>
            <p class="text-danger">هیچ دسته بندی وجود ندارد لطفا با کلیک بر روی گزینه <a href="{{ route('categories.create') }}"><button class="btn btn-primary btn-sm">ایجاد دسته بندی</button></a> یک دسته بندی جدید ایجاد کنید</p>
        </div>
    @endif
@endsection
@section('JS')
    <script src="/admin-files/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="/admin-files/plugins/sweetalerts/custom-sweetalert.js"></script>
    @foreach($categories as $category)
        <script>
            $('.widget-content .warning.confirm_{{$category->id}}').on('click', function () {
                swal({
                    title: 'آیا میخواهید این دسته بندی را حذف کنید?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'حذف',
                    cancelButtonText: 'انصراف',
                    padding: '1em'
                }).then(function(result) {
                    if (result.value) {
                        document.getElementById("form_{{ $category->id }}").submit();
                    }
                })
            })
        </script>
    @endforeach
@endsection

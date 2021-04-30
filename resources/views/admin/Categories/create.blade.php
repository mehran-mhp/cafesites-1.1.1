@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>دسته بندی جدید</h3>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.validation')
                <div class="statbox widget box box-shadow mb-5">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>ایجاد دسته بندی</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="/admin/categories" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="عنوان">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="10" placeholder="توضیحات"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i data-feather="save"></i> ذخیره </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

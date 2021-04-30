@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>ویرایش دسته بندی / {{ $category->title }}</h3>
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
                                <h4>ویرایش دسته بندی</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="/admin/categories/{{ $category->id }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control text-warning" value="{{$category->title}}" placeholder="عنوان دسته بندی را وارد کنید ">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control text-warning" rows="10" placeholder="توضیحات دسته بندی را وارد کنید" style="white-space: pre-line">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning"><i data-feather="edit"></i> ویرایش </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

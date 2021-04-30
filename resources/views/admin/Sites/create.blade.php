@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>ایجاد سایت</h3>
@endsection
@section('CSS')
    <link href="/admin-files/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/admin-files/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css">
    <link href="/admin-files/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
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
                                <h4>ایجاد سایت</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="/admin/sites" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="نام سایت">
                            </div>

                            <div class="form-group">
                                <input type="url" name="site_link" class="form-control" placeholder="لینک سایت : http://Example.com">
                            </div>

                            <div class="form-group">
                                <input type="text" name="security" class="form-control" placeholder="میزان امنیت">
                            </div>

                            <div class="form-group">
                                <input type="text" name="location" class="form-control" placeholder="موقعیت">
                            </div>

                            <div class="form-group">
                                <input type="text" name="speed" class="form-control" placeholder="سرعت">
                            </div>

                            <div class="form-group">
                                <input type="text" name="domain_owner" class="form-control" placeholder="مالک دامنه">
                            </div>

                            <div class="form-group">
                                <input type="text" name="frameworks" class="form-control" placeholder="فریم ورک ها">
                            </div>

                            <div class="form-group">
                                <input type="text" name="cms" class="form-control" placeholder="سیستم مدیریت محتوا">
                            </div>

                            <div class="form-group">
                                <input type="text" name="frontend_languages" class="form-control" placeholder="زبان های سمت کاربر">
                            </div>

                            <div class="form-group">
                                <input type="text" name="backend_languages" class="form-control" placeholder="زبان های سمت سرور">
                            </div>

                            <div class="form-group">
                                <span>وضعیت نشر : </span>
                                <div class="form-control">
                                    <label class="new-control new-checkbox checkbox-success">
                                        <input type="radio" name="status" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>فعال
                                    </label>

                                    <label class="new-control new-checkbox checkbox-danger">
                                        <input type="radio" name="status"  class="new-control-input" value="0" checked>
                                        <span class="new-control-indicator"></span>غیر فعال
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <span>واکنشگرا : </span>
                                <div class="form-control">
                                    <label class="new-control new-checkbox checkbox-success">
                                        <input type="radio" name="responsive" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>بله
                                    </label>

                                    <label class="new-control new-checkbox checkbox-danger">
                                        <input type="radio" name="responsive"  class="new-control-input" value="0" checked>
                                        <span class="new-control-indicator"></span>خیر
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <lable>امتیاز :
                                <select name="score" class="form-control">
                                    <option value="">خالی</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </lable>
                            </div>

                            <div class="form-group">
                                <lable>دسته بندی ها :
                                    @if(count($categories) > 0)
                                        <select class="form-control" name="categories[]" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                        </select>
                                    @else
                                        <div class="alert alert-danger mb-4 text-warning text-center">
                                            <p class="text-danger">هیچ دسته بندی وجود ندارد لطفا از بخش دسته بندی ها یک یا چند دسته بندی جدید ایجاد کنید</p>
                                        </div>
                                    @endif
                                </lable>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="10" placeholder="توضیحات سایت را وارد کنید"></textarea>
                            </div>

                            <div class="form-group border border-primary rounded p-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>آیکون سایت : <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="img_profile" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control">انتخاب فایل...<span class="custom-file-container__custom-file__custom-file-control__button"> Browse </span></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>

                            <div class="form-group border border-primary rounded p-4">
                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                    <label>تصاویر سایت :<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="photos[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <input type="text" name="slug" class="form-control" placeholder="نام مستعار را وارد کنید ">
                            </div>

                            <div class="form-group">
                                <input type="text" name="title_page" class="form-control" placeholder="نام صفحه را وارد کنید ">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="meta_description" rows="10" placeholder="متا توضیحات سایت را وارد کنید"></textarea>
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
@section('JS')
    <script src="/admin-files/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>var firstUpload = new FileUploadWithPreview('myFirstImage')</script>
    <script>var secondUpload = new FileUploadWithPreview('mySecondImage')</script>
    </script>
@endsection


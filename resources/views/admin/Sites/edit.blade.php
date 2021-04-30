@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>ویرایش سایت / {{ $site->name }}</h3>
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
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <p class="h5">ویرایش سایت</p>
                        <hr>
                        <form action="/admin/sites/{{ $site->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control text-warning" value="{{ $site->name }}" placeholder="نام سایت را وارد کنید ">
                            </div>

                            <div class="form-group">
                                <input type="url" name="site_link" class="form-control text-warning" value="{{ $site->site_link }}" placeholder="لینک سایت را وارد کنید ">
                            </div>

                            <div class="form-group">
                                <label>دسته بندی ها</label>
                                <select class="form-control text-warning" name="categories[]" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($site->categories)
                                                @foreach($site->categories as $site_category)
                                                @if($category->id == $site_category->id)
                                                selected
                                            @endif
                                            @endforeach
                                            @endif >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <span>وضعیت نشر : </span>
                                <div class="form-control">
                                    <label class="new-control new-checkbox checkbox-success">
                                        <input type="radio" name="status" class="new-control-input" value="1" @if($site->status == 1) checked @endif>
                                        <span class="new-control-indicator"></span>فعال
                                    </label>

                                    <label class="new-control new-checkbox checkbox-danger">
                                        <input type="radio" name="status"  class="new-control-input" value="0" @if($site->status == 0) checked @endif>
                                        <span class="new-control-indicator"></span>غیر فعال
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <span>واکنشگرا : </span>
                                <div class="form-control">
                                    <label class="new-control new-checkbox checkbox-success">
                                        <input type="radio" name="responsive" class="new-control-input" value="1" @if($site->responsive == 1) checked @endif>
                                        <span class="new-control-indicator"></span>بله
                                    </label>

                                    <label class="new-control new-checkbox checkbox-danger">
                                        <input type="radio" name="responsive"  class="new-control-input" value="0" @if($site->responsive == 0) checked @endif>
                                        <span class="new-control-indicator"></span>خیر
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <lable>امتیاز :
                                    <select name="score" class="form-control">
                                        <option value="">خالی</option>
                                        <option value="1" @if($site->score == 1) selected @endif>1</option>
                                        <option value="2" @if($site->score == 2) selected @endif>2</option>
                                        <option value="3" @if($site->score == 3) selected @endif>3</option>
                                        <option value="4" @if($site->score == 4) selected @endif>4</option>
                                        <option value="5" @if($site->score == 5) selected @endif>5</option>
                                    </select>
                                </lable>
                            </div>

                            <div class="form-group">
                                <input type="text" name="security" class="form-control text-warning" value="{{ $site->security }}" placeholder="میزان امنیت">
                            </div>

                            <div class="form-group">
                                <input type="text" name="location" class="form-control text-warning" value="{{ $site->location }}" placeholder="موقعیت">
                            </div>

                            <div class="form-group">
                                <input type="text" name="speed" class="form-control text-warning" value="{{ $site->speed }}" placeholder="سرعت">
                            </div>

                            <div class="form-group">
                                <input type="text" name="domain_owner" class="form-control text-warning" value="{{ $site->domain_owner }}" placeholder="مالک دامنه">
                            </div>

                            <div class="form-group">
                                <input type="text" name="frameworks" class="form-control text-warning" value="{{ $site->frameworks }}" placeholder="فریم ورک ها">
                            </div>

                            <div class="form-group">
                                <input type="text" name="cms" class="form-control text-warning" value="{{ $site->cms }}" placeholder="سیستم مدیریت محتوا">
                            </div>

                            <div class="form-group">
                                <input type="text" name="frontend_languages" class="form-control text-warning" value="{{ $site->frontend_languages }}" placeholder="زبان های سمت کاربر">
                            </div>

                            <div class="form-group">
                                <input type="text" name="backend_languages" class="form-control text-warning" value="{{ $site->backend_languages }}" placeholder="زبان های سمت سرور">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control text-warning" name="description" rows="10" placeholder="توضیحات سایت را وارد کنید" style="white-space: pre-line">{{ $site->description }}</textarea>
                            </div>

                            <div class="form-group border border-primary rounded p-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>آیکون سایت : <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="img_profile" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control">انتخاب فایل...<span class="custom-file-container__custom-file__custom-file-control__button"> Browse </span></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                    <div class="text-center">
                                        <p>عکس فعلی سایت</p>
                                        <img class="border border-danger" width="250" src="{{ '/photos/'.$site->img_icon }}">
                                    </div>
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
                                    <div class="text-center">
                                        <p>عکس های فعلی سایت</p>
                                        @foreach($site->photos as $photo)
                                            <img class="m-1 border border-danger" width="100" src="{{ '/photos/'.$photo->photo_path }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="text" name="slug" class="form-control text-warning" value="{{ $site->slug }}" placeholder="نام مستعار را وارد کنید ">
                            </div>

                            <div class="form-group">
                                <input type="text" name="title_page" class="form-control text-warning" value="{{ $site->title_page }}" placeholder="نام صفحه را وارد کنید ">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control text-warning" name="meta_description" rows="10" placeholder="متا توضیحات سایت را وارد کنید">{{ $site->meta_description }}</textarea>
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
@section('JS')
    <script src="/admin-files/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>var firstUpload = new FileUploadWithPreview('myFirstImage')</script>
    <script>var secondUpload = new FileUploadWithPreview('mySecondImage')</script>
    </script>
@endsection

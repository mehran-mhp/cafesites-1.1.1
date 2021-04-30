@extends('layouts.master')
@section('title-page')
    <title>کافه سایت |  {{ $site->name }}</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><span class="badge badge-dark">خانه</span></li>
    <li class="breadcrumb-item"><span class="badge badge-dark">سایت</span></li>
    <li class="breadcrumb-item"><span class="badge badge-dark">{{ $site->name }}</span></li>
@endsection
@section('content')
    <div id="info-site" class="row" dir="rtl">
        <div id="image-site" class="col-xl-3 col-md-4 col-sm-12 col-12 mt-2">
            <img src="{{ '/photos/'.$site->img_icon }}" class="w-100 shadow-sm  rounded" alt="{{ $site->title }}">
            <a href="{{ $site->site_link }}" target="_blank" class="btn btn-outline-dark w-100 mt-3">رفتن به سایت</a>
        </div>
        <div class="col-xl-5 col-md-4 col-sm-12 col-12 mt-4">
            <h1>{{ $site->name }}</h1>
            @foreach($site->categories as $category)
                <span class="badge badge-success">{{ $category->title }}</span>
            @endforeach
            <p class="mt-2">{{ $site->domain_owner }}</p>
            <p class="mt-2">{{ $site->location }}</p>
            <p>
                @for($i = 1; $i <= $site->score; $i++)
                    <i class="fa fa-star"></i>
                @endfor
            </p>
        </div>

        <div class="col-xl-4 col-md-4 col-sm-12 col-12 mt-4">
            <span>موقعیت</span>
            <p class="text-secondary">{{ $site->location }}</p>
            <span>نظرات</span>
            <p class="text-secondary">{{ count($site->comments) }}</p>
            <span>واکنشگرا</span>
            @if($site->responsive == 1)
                <p class="text-secondary">بله</p>
            @elseif($site->responsive == 0)
                <p class="text-secondary">خیر</p>
            @endif
            <span>دامنه</span>
            <p class="text-secondary">{{ substr($site->site_link, 11) }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="main-thing">
                <div class="thing" id="thing">
                    @foreach($site->photos as $photo)
                        <div class="text-center ">
                            <img  id="myImg" src="{{ '/photos/'.$photo->photo_path }}" style="width:100%;max-width:300px" >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row" dir="rtl">
        <div class="col-md-12 mb-5 mt-4">
            <h4 class="mt-5">توضیحات</h4>
            <p class="text-justify" style="white-space: pre-line">{{ mb_substr($site->description,0,400) }}<span id="dots">...</span><span id="more-text">{{ mb_substr($site->description,400) }}</span></p>
            <button onclick="more_text()" id="myBtn" class="btn btn-outline-dark btn-sm">بیشتر <i class="fa fa-chevron-down"></i> </button>
        </div>
    </div>

    <div class="row" dir="rtl">
        <div class="col-md-6">
            <table class="table table table-light shadow-sm rounded">
                <tbody>
                <tr>
                    <td> <i class="fa fa-lock"></i> امنیت</td>
                    <td> <i class="fa fa-chevron-left"></i> {{$site->security}} </td>
                </tr>
                <tr>
                    <td> <i class="fa fa-map-marker-alt"></i> موقعیت </td>
                    <td> <i class="fa fa-chevron-left"></i> {{$site->location}} </td>
                </tr>
                <tr>
                    <td> <i class="fa fa-mobile-alt"></i> واکنشگرا</td>
                    @if($site->responsive == 1)
                        <td> <i class="fa fa-chevron-left"></i> بله </td>
                    @elseif($site->responsive == 0)
                        <td> <i class="fa fa-chevron-left"></i> خیر </td>
                    @endif
                </tr>
                <tr>
                    <td> <i class="fa fa-tachometer-alt"></i> سرعت </td>
                    <td> <i class="fa fa-chevron-left"></i> {{ $site->speed }}</td>
                </tr>
                <tr>
                    <td> <i class="fa fa-user"></i> مالک دامنه</td>
                    <td> <i class="fa fa-chevron-left"></i>{{ $site->domain_owner }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table table-light shadow-sm rounded">
                <tbody>
                <tr>
                    <td> <i class="fa fa-globe"></i> Domain</td>
                    <td> <i class="fa fa-chevron-left"></i> {{ substr($site->site_link, 11) }}</td>
                </tr>
                <tr>
                    <td> <i class="fa fa-file-code"></i> Frontend</td>
                    <td><i class="fa fa-chevron-left"></i> {{ $site->frontend_languages }}</td>
                </tr>
                <tr>
                    <td> <i class="fa fa-server"></i> Backend</td>
                    <td> <i class="fa fa-chevron-left"></i> {{ $site->backend_languages }}</td>
                </tr>
                <tr>
                    <td> <i class="fa fa-th"></i> Framework</td>
                    <td> <i class="fa fa-chevron-left"></i> {{ $site->frameworks }}</td>
                </tr>
                <tr>
                    <td> <i class="fa fa-cube"></i> CMS</td>
                    <td> <i class="fa fa-chevron-left"></i> {{ $site->cms }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    @if(count($site->comments) > 0)
        <div class="row" dir="rtl">
            <div class="col-md-8 mt-5">
                <h4>نظرات</h4><br>
                @foreach($site->comments as $comment)
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            @foreach($users as $user)
                                @if($comment->user_id == $user->id)
                                    <img src="/photos/login.jpg" width="50" class="rounded-circle mr-2 shadow-sm">
                                    <strong class="mr-auto">{{ $user->name }}</strong>
                                @endif
                            @endforeach
                            <small>{{ $comment->created_at }}</small>
                        </div>
                        <div class="toast-body">
                            <p class="text-justify">{{ $comment->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-danger alert-dismissible shadow-sm fade show mt-5 text-center">
            هیچ نظری برای نمایش نیست
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @auth
        <div class="row" dir="rtl">
            <div class="col-md-6 mt-5">
                <form action="/comment" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden"name="site_id" value="{{ $site->id }}">
                        <textarea name="comment" class="form-control" rows="5" placeholder="دیدگاه خود را وارد کنید ..."></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="ثبت نظر">
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-danger alert-dismissible shadow-sm fade show mt-5 text-center">
            برای ثبت نظر ابتدا وارد سایت شوید
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endauth
@endsection
@section('JS')
    <script type="text/javascript">
        $(document).ready(function (){
            $('#thing').slick({
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 5,
                arrows: true,
                appendArrows: $('#thing'),
                prevArrow: '<a class="next" type="button"><i class="fa fa-chevron-right"></i></a>',
                nextArrow: '<a class="prev" type="button"><i class="fa fa-chevron-left"></i></a>',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 2
                        }
                    }
                ]
            });
        });
    </script>
@endsection

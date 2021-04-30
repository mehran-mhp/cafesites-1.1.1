@extends('layouts.master')
@section('title-page')
    <title>کافه سایت | Cafe Sites</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><span class="badge badge-dark">خانه</span></li>
    <li class="breadcrumb-item"><span class="badge badge-dark">سایت ها</span></li>
@endsection
@section('content')
    @foreach($categories as $category)
        @if(count($category->sites) > 0)
            <div class="main-thing">
                <div class="row" dir="rtl">
                    <div class="col-6">
                        <p>{{ $category->title }}</p>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('more.index', $category->slug) }}"><button class="btn btn-outline-dark btn-sm">بیشتر <i class="fa fa-chevron-left"></i></button></a>
                    </div>
                </div>
                <div class="thing" id="thing_{{$category->id}}">
                    @foreach($category->sites as $site)
                        @if($site->status === 1)
                            <a href="{{ route('show.siteInfo', $site->slug) }}" class="text-secondary">
                                <div class="text-center big">
                                    <img src="{{ '/photos/'.$site->img_icon }}">
                                    <strong class="border-bottom">{{ $site->name }}</strong>
                                    <p class="mt-2">
                                        @for($i = 1; $i <= $site->score; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endsection
@section('JS')
    @foreach($categories as $category)
        <script type="text/javascript">
            $(document).ready(function (){
                $('#thing_{{$category->id}}').slick({
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 5,
                    arrows: true,
                    appendArrows: $('#thing_{{$category->id}}'),
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
                                slidesToShow: 3
                            }
                        }
                    ]
                });
            });
        </script>
    @endforeach
@endsection

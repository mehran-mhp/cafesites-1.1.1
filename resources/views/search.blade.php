@extends('layouts.master')
@section('title-page')
    <title>کافه سایت | Cafe Sites</title>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><span class="badge badge-dark">خانه</span></li>
    <li class="breadcrumb-item"><span class="badge badge-dark">جست و جو</span></li>
    <li class="breadcrumb-item"><span class="badge badge-dark">{{{ $query }}}</span></li>
@endsection
@section('content')
    <div class="row" dir="rtl">
        @if(count($sites) > 0)
            @foreach($sites as $site)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center mt-4 more">
                    <div class="card">
                        <img class="card-img-top" src="{{ '/photos/'.$site->img_icon }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong class="border-bottom border-primary">{{ $site->name }}</strong></h5>
                            <p class="card-text">
                            <span>
                                @for($i = 1; $i <= $site->score; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </span>
                            </p>
                            <a href="{{ $site->site_link }}" target="_blank" class="btn btn-dark w-100 shadow-sm">رفتن به سایت</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="alert alert-danger mb-5 mt-5 text-warning text-center">
                    <h5 class="text-danger"> توجه!</h5>
                    <p class="text-danger">هیچ موردی با عنوان <strong><q> {{ $query }} </q></strong> یافت نشد</p>
                </div>
            </div>
        @endif
    </div>
@endsection

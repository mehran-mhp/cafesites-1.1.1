@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>سایت / {{ $site->name }}</h3>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card component-card_1">
                    <div class="card-body">
                        <h5 class="card-title">سایت : {{ $site->name }}</h5>
                        <hr>
                        <p class="card-text text-justify" style="white-space: pre-line">{{ $site->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.Layout.master')
@section('breadcrumb')
    <h3>داشبرد</h3>
@endsection
@section('CSS')
    <link href="/admin-files/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="/admin-files/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="row widget-statistic">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <i data-feather="users"></i>
                        </div>
                        <p class="w-value">{{ $users }}</p>
                        <h5 class="">کاربران</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <i data-feather="globe"></i>
                        </div>
                        <p class="w-value">{{ $sites }}</p>
                        <h5 class="">سایت ها</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <i data-feather="database"></i>
                        </div>
                        <p class="w-value">{{ $categories }}</p>
                        <h5 class="">دسته بندی ها</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <i data-feather="message-circle"></i>
                        </div>
                        <p class="w-value">{{ $comments }}</p>
                        <h5 class="">نظرات</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

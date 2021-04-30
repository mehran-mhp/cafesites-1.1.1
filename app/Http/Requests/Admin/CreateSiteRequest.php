<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class CreateSiteRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required',
            'site_link' => 'required|url',
            'security' => 'required',
            'location' => 'required',
            'speed' => 'required',
            'domain_owner' => 'required',
            'frameworks' => 'required',
            'cms' => 'required',
            'frontend_languages' => 'required',
            'backend_languages' => 'required',
            'score' => 'required',
            'categories' => 'required',
            'description' => 'required|min:100',
            'img_profile' => 'required|dimensions:max_width=400,max_height=400|mimes:jpeg,jpg,png|max:250',
            'photos' => 'required',
            'slug' => 'required|unique:sites',
            'title_page' => 'required|max:60|unique:sites',
            'meta_description' => 'required|max:320',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'لطفا نام سایت را وارد کنید',
            'site_link.required' => 'لطفا پیوند سایت را وارد کنید',
            'site_link.url' => 'لطفا یک پیوند معتبر را وارد کنید',
            'security.required' => 'لطفا میزان امنیت را به درصد وارد کنید',
            'location.required' => 'لطفا موقعیت را وارد کنید',
            'speed.required' => 'لطفا سرعت سایت را وارد کنید',
            'domain_owner.required' => 'لطفا نام مالک دامنه را وارد کنید',
            'frameworks.required' => 'لطفا نوع فریم ورک استفاده شده را وارد کنید',
            'cms.required' => 'لطفا نوع سیستم مدیریت محتوا را وارد کنید',
            'frontend_languages.required' => 'لطفا نام زبان های سمت کاربر را وارد کنید',
            'backend_languages.required' => 'لطفا نام زبان های سمت سرور را وارد کنید',
            'score.required' => 'لطفا به سایت امتیاز دهید را وارد کنید',
            'categories.required' => 'لطفا یک یا چند دسته بندی را انتخواب کنید',
            'description.required' => 'لطفا توضیحات سایت را وارد کنید',
            'description.min' => 'توضیحات سایت نباید کمتر از 100 کاراکتر داشته باشد',
            'img_profile.required' => 'لطفا آیکون سایت را انتخواب کنید',
            'img_profile.dimensions' => 'ابعاد سایت باید 400 × 400 باشد',
            'img_profile.mimes' => 'فرمت عکس باید یکی از فرمت های jpeg,png,jpg باشد',
            'img_profile.max' => 'حجم عکس نباید بیشتر از 250 کیلوبایت باشد',
            'photos.required' => 'لطفا تصاویر سایت را انتخواب کنید',
            'slug.required' => 'لطفا نام مستعار سایت را وارد کنید',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
            'title_page.required' => 'لطفا عنوان صفحه را وارد کنید',
            'title_page.max' => 'عنوان سایت نباید بیشتر از 60 کاراکتر باشد',
            'title_page.unique' => 'این عنوان صفحه قبلا ثبت شده است',
            'meta_description.required' => 'لطفا توضیحات متا را وارد کنید',
            'meta_description.max' => 'توضیحات متا نباید بیشتر از 320 کارکتر باشد',
        ];
    }
}

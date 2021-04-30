<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class CreateCategoryRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'title' => 'required|unique:categories',
            'description' => 'required|min:100',
        ];
    }
    public function messages(){
        return [
            'title.required'=>'عنوان دسته بندی الزامیست',
            'title.unique'=>'این عنوان قبلا ثبت شده است',
            'description.required'=>'توضیحات دسته بندی الزامیست',
            'description.min'=>'توضیحات دسته بندی باید بیشتر از 100 کاراکتر باشد',
        ];
    }
}

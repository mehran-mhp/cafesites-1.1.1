<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class EditCategoryRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'title' => 'required',
            'description' => 'required|min:100',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'عنوان دسته بندی الزامیست',
            'description.required' => 'توضیحات دسته بندی الزامیست',
            'description.min' => 'توضیحات دسته بندی باید بیشتر از 100 کاراکتر باشد',
        ];
    }
}

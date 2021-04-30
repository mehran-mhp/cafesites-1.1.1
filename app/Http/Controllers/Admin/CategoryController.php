<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\EditCategoryRequest;
use App\Http\Requests\Admin\CreateCategoryRequest;
class CategoryController extends Controller{

    public function index(){
        $categories = Category::all();
        $counter = 0;
        return view('admin.Categories.index', compact(['categories', 'counter']));
    }

    public function create(){
        return view('admin.Categories.create');
    }

    public function store(CreateCategoryRequest $request){
        $category = new Category();
        $category->title = $request->input(['title']);
        $category->description = $request->input(['description']);
        $category->slug = make_slug($request->input(['title']));
        $category->save();
        Session::flash('create_category'," دسته بندی  $request->title با موفقیت ایجاد شد");
        return redirect('/admin/categories');
    }

    public function show($id){
        $category = Category::findorFail($id);
        return view('admin.Categories.show', compact(['category']));
    }

    public function edit($id){
        $category = Category::findorFail($id);
        return view('admin.Categories.edit', compact([
            'category'
        ]));
    }

    public function update(EditCategoryRequest $request, $id){
        $category = Category::findorFail($id);
        $category->title = $request->input(['title']);
        $category->description = $request->input(['description']);
        $category->save();
        Session::flash('edit_category'," دسته بندی  $category->title با موفقیت ویرایش شد");
        return redirect('/admin/categories');
    }

    public function destroy($id){
        $category = Category::findorFail($id);
        $category->delete();
        Session::flash('delete_category'," دسته بندی  $category->title با موفقیت حذف شد");
        return redirect('/admin/categories');
    }
}

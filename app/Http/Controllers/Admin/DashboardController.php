<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\Site;
use App\Comment;
use App\Category;
use App\Http\Controllers\Controller;
class DashboardController extends Controller{
    public function index(){
        $users = User::count();
        $sites = Site::count();
        $comments = Comment::count();
        $categories = Category::count();
        return view('admin.Dashboard.index', compact([
            'users',
            'sites',
            'comments',
            'categories',
        ]));
    }
}

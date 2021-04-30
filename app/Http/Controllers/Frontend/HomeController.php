<?php
namespace App\Http\Controllers\Frontend;
use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Site;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller{
    public function searchTitleSites(){
        $query = Input::get('title');

        $sites = Site::with('categories')
            ->where('name', 'like', "%".$query."%")
            ->get();
        return view('search', compact([
            'sites',
            'query'
        ]));
    }

    public function index(){
        $users = User::all();
        $categories = Category::with('sites')->get();
        return view('index', compact([
            'categories',
            'users',
        ]));
    }
    public function show($slug){
        $users = User::all();
        $categories = Category::all();
        $site = Site::with(['categories', 'photos', 'comments' => function($q){
            $q->orderBy('id', 'desc')->paginate(20);
        }])->where('slug', $slug)->first();
        return view('site', compact(['site','categories', 'users']));
    }

    public function showCategorySites($slug){
        $category = Category::with('sites')->where('slug', $slug)->first();
        $sites = $category->sites()->paginate(20);
        return view('more', compact(['category','sites']));
    }

    public function store(Request $request){
        $comment = new Comment();
            $comment->user_id = Auth::id();
            $comment->site_id = $request->input(['site_id']);
            $comment->description = $request->input(['comment']);
        $comment->save();
        return redirect()->back();
    }
}

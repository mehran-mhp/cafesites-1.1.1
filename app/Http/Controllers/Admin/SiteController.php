<?php
namespace App\Http\Controllers\Admin;
use App\Site;
use App\Photo;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\EditSiteRequest;
use App\Http\Requests\Admin\CreateSiteRequest;
class SiteController extends Controller{
    public function searchTitle(){
        $query = Input::get('title');

        $counter = 0;
        $sites = Site::with('categories')
            ->where('name', 'like', "%".$query."%")
            ->get();
        return view('admin.Sites.search', compact([
            'counter',
            'sites',
            'query'
        ]));
    }

    public function index(){
        $counter = 0;
        $sites = Site::paginate(100);
        return view('admin.Sites.index', compact(['sites','counter']));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.Sites.create', compact([
            'categories',
        ]));
    }

    public function store(CreateSiteRequest $request){
        $site = new Site();
        $site->name = $request->input(['name']);
        $site->site_link = $request->input(['site_link']);
        $site->status = $request->input(['status']);
        $site->responsive = $request->input(['responsive']);
        $site->description = $request->input(['description']);
        $site->security = $request->input(['security']);
        $site->location = $request->input(['location']);
        $site->speed = $request->input(['speed']);
        $site->domain_owner = $request->input(['domain_owner']);
        $site->frameworks = $request->input(['frameworks']);
        $site->cms = $request->input(['cms']);
        $site->score = $request->input(['score']);
        $site->frontend_languages = $request->input(['frontend_languages']);
        $site->backend_languages = $request->input(['backend_languages']);

        $file = $request->file('img_profile');
        $file_name = time() . $file->getClientOriginalName();
        $file->move('photos', $file_name);
        $site->img_icon = $file_name;

        $site->slug = make_slug($request->input('slug'));
        $site->title_page = $request->input(['title_page']);
        $site->meta_description = $request->input(['meta_description']);
        $site->save();
        $site->categories()->sync($request->categories);


        if($request->hasfile('photos')) {
            foreach($request->file('photos') as $image) {
                $name=$image->getClientOriginalName();
                $fileName = time().$name;
                $image->move('photos', $fileName);
                $data[] = $fileName;
            }
        }foreach ($data as $dat){
        $photo = new Photo();
        $photo->photo_path=$dat;
        $photo->save();
    }
        $photos = Photo::all();
        foreach ($photos as $photo){
            foreach ($data as $dt){
                if ($photo->photo_path == $dt){
                    $photo_id[$photo->id] = $photo->id;
                }
            }
        }
        $site->photos()->sync($photo_id);

        Session::flash('create_site'," سایت  $request->name  با موفقیت ایجاد شد");
        return redirect('/admin/sites');
    }

    public function show($id){
        $site = Site::findorFail($id);
        return view('admin.Sites.show', compact([
            'site'
        ]));
    }

    public function edit($id){
        $categories = Category::all();
        $photos = Photo::all();
        $site = Site::with('categories', 'photos')->findOrFail($id);
        return view('admin.Sites.edit', compact([
            'categories',
            'photos',
            'site',
        ]));
    }

    public function update(EditSiteRequest $request, $id){
        $site = Site::findorFail($id);
        $site->name = $request->input(['name']);
        $site->site_link = $request->input(['site_link']);
        $site->status = $request->input(['status']);
        $site->responsive = $request->input(['responsive']);
        $site->description = $request->input(['description']);
        $site->security = $request->input(['security']);
        $site->location = $request->input(['location']);
        $site->speed = $request->input(['speed']);
        $site->domain_owner = $request->input(['domain_owner']);
        $site->frameworks = $request->input(['frameworks']);
        $site->cms = $request->input(['cms']);
        $site->frontend_languages = $request->input(['frontend_languages']);
        $site->backend_languages = $request->input(['backend_languages']);

        $file = $request->file('img_profile');
        $oldFile = $site->img_icon;
        if (empty($file)){
            $site->img_icon = $oldFile;
        }elseif (isset($file)){
            unlink(public_path().'/photos/'.$site->img_icon);
            $file_name = time() . $file->getClientOriginalName();
            $file->move('photos', $file_name);
            $site->img_icon = $file_name;
        }
        $site->slug = make_slug($request->input('slug'));
        $site->title_page = $request->input(['title_page']);
        $site->meta_description = $request->input(['meta_description']);
        $site->save();
        $site->categories()->sync($request->categories);

        if($request->hasfile('photos')) {
            foreach ($site->photos as $photo){
                unlink(public_path().'/photos/'.$photo->photo_path);
                $photo->delete();
            }
            foreach($request->file('photos') as $image) {
                $name=$image->getClientOriginalName();
                $fileName = time().$name;
                $image->move('photos', $fileName);
                $data[] = $fileName;
            }

        }
        foreach ($data as $dat){
            $photo = new Photo();
            $photo->photo_path=$dat;
            $photo->save();
        }
        $photos = Photo::all();
        foreach ($photos as $photo){
            foreach ($data as $dt){
                if ($photo->photo_path == $dt){
                    $photo_id[$photo->id] = $photo->id;
                }
            }
        }
        $site->photos()->sync($photo_id);


        Session::flash('edit_site'," سایت  $site->name  با موفقیت ویرایش شد");
        return redirect('/admin/sites');
    }


    public function destroy($id){
        $site = Site::with('photos')->findorFail($id);
        foreach ($site->photos as $photo){
            unlink(public_path().'/photos/'.$photo->photo_path);
            $photo->delete();
        }
        unlink(public_path().'/photos/'.$site->img_icon);
        $site->delete();
        Session::flash('delete_site'," سایت  $site->name  با موفقیت حذف شد");
        return redirect('/admin/sites');
    }
}

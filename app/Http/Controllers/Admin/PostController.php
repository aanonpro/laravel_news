<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use COM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\AssignOp\Pow;
use Illuminate\Support\Str; // import slug

use function Psy\debug;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){
        $category = Category::where('status', '0')->get();
        return view('admin.post.create', compact('category'));
    }

    public function store(PostFormRequest $request){

        $data = $request->validated();

        $post = new Post;

        $post->category_id = $data['category_id'];

       if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file ->move('uploads/post', $filename);
            $post -> image_cover = $filename;
        }

        $post->title = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->short_title = $data['short_title'];

        $post->Description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];

        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect('admin/posts')->with('message','Post Added Successfully');
    }

    public function edit($post_id){
        $category = Category::where('status','0')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit', compact('post','category'));
    }

    public function update(PostFormRequest $request, $post_id){

        $data = $request->validated();

        $post = Post::find($post_id);

        $post->category_id = $data['category_id'];

        if($request->hasfile('image')){

            $destination = 'uploads/post/' . $post->image_cover;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file ->move('uploads/post', $filename);
            $post -> image_cover = $filename;
        }


        $post->title = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->short_title = $data['short_title'];

        $post->Description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];

        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->update();

        return redirect('admin/posts')->with('message','Post Updated Successfully');
    }



    public function destroy(Request $request) {

        $post = Post::find($request->post_delete_id);

        if($post){
            $destination = 'uploads/post/' . $post->image_cover;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $post->delete();
            return redirect('admin/posts')->with('message','Post Deleted Successfully');

        }
        else{
            return redirect('admin/posts')->with('message','Post not found');
        }


    }
}

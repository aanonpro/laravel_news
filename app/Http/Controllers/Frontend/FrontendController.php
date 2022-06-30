<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class FrontendController extends Controller
{
    public function index(){

        $cate_item = Category::where('navbar_status','0')->where('status','0')->get();
        $category_post = Category::where('status','0')->get();
        $all_posts = Post::where('status','0')->orderBy('created_at','DESC')->take(3)->get();
        return view('frontend.index', compact('cate_item','all_posts','category_post'));

    }


    public function viewCategoryPost(string $category_slug){

        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id', $category->id)->where('status','0')->paginate(6);
             $latest_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(3);
            return view('frontend.post.page', compact('post','category','latest_posts'));
        }
        else{
            return redirect('/');
        }
    }

    public function viewPost(string $category_slug, string $post_slug){
        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status','0')->first();
            $lastest_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(3);

            return view('frontend.post.view', compact('post','lastest_posts','category'));
        }
        else{
            return redirect('/');
        }
    }

}

<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class FrontendController extends Controller
{
    public function index(){
        $setting = Setting::find(1);

        $date = Carbon::now()->subDays(1);

        $cate_item = Category::where('navbar_status','0')->where('status','0')->get();
        $latest_news = Post::where('status','0')->inRandomOrder()->get()->take(3);

        // $category_post = Category::where('status','0')->get();
        $all_posts = Post::where('status','0')->orderBy('created_at','DESC', '>=', $date)->take(3)->get();
        return view('frontend.index', compact('cate_item','latest_news','all_posts','setting'));

    }

<<<<<<< HEAD
    public $amount = 10;
=======
    // public $amount = 10;
>>>>>>> fd6dd48fe50c807276e68decbab37b08c33fe4eb

    public function viewCategoryPost(string $category_slug){

        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category){
<<<<<<< HEAD
            $post = Post::where('category_id', $category->id)->where('status','0')->take($this->amount)->get();
          
             $latest_posts = Post::where('category_id', $category->id)->where('status','0')->latest('created_at','DESC')->get()->take(3);
            return view('frontend.post.page', compact('post','category','latest_posts'));
=======
            $post = Post::where('category_id', $category->id)->where('status','0')->paginate(6);
            $popular_posts = Post::inRandomOrder()->take(3)->get();
            $latest_posts = Post::where('status','0')->latest('created_at','DESC')->inRandomOrder()->get()->take(3);
            return view('frontend.post.page', compact('post','category','popular_posts','latest_posts'));
>>>>>>> fd6dd48fe50c807276e68decbab37b08c33fe4eb
        }
        else{
            return redirect('/');
        }
    }

<<<<<<< HEAD
    public function load(){
        $this->amount +=10;
    }
=======
    // public function load(){
    //     $this->amount +=10;
    // }
>>>>>>> fd6dd48fe50c807276e68decbab37b08c33fe4eb

    public function viewPost(string $category_slug, string $post_slug){
        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status','0')->first();
            $lastest_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(3);
            $popular_posts = Post::inRandomOrder()->take(3)->get();
            return view('frontend.post.view', compact('post','popular_posts','lastest_posts','category'));
        }
        else{
            return redirect('/');
        }
    }

}

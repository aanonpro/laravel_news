<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        // $auth = Auth::get();
        $categories = Category::count();
        $posts = Post::count();
        $users = User::where('role_as','0')->count();
        $admins = User::where('role_as','1')->count();

        return view('admin.dashboard', compact('categories','posts','users','admins'));
    }


}

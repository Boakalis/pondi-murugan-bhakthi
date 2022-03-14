<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Blog;
use App\Models\Post;
use Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8|max:24',
            ],
            [
                'email.required' => 'Please Enter Email-address',
                'email.email' => 'Please provide valid email-address',
                'password.required' => 'Password is required',
            ]
        );
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if(Auth::user() != null){
            $user = $request->except('_token');
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error','Login Credentials Invalid');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function blogIndex()
    {
        $datas = Blog::get();
        return view('admin.blogs.index')->with(compact('datas'));
    }

    public function postIndex()
    {
        $datas = Post::get();
        return view('admin.posts.index')->with(compact('datas'));
    }

    public function blogCreate()
    {
        $datas = Blog::select('title','id')->get();
        return view('admin.blogs.create')->with(compact('datas'));
    }

    public function postCreate()
    {
        $datas = Blog::select('title','id')->get();
        return view('admin.posts.create')->with(compact('datas'));
    }

    public function blogEdit($id)
    {

        $data = Blog::find($id);
        $blogs = Blog::select('title','id')->get();
        return view('admin.blogs.edit')->with(compact('data','blogs'));
    }

    public function postEdit($id)
    {

        $data = Post::find($id);
        $blogs = Blog::select('title','id')->get();
        return view('admin.posts.edit')->with(compact('data','blogs'));
    }

    public function blogStore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                // 'parent_id' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Title Required',
                'title.max' => 'Maximum Character Exceed',

            ]
        );

        Blog::create([
            'title' => $request->title,
            'parent_id' =>$request->parent_id,
            'status' => $request->status,
        ]);

        return redirect()->route('blog.index')->with(Session::flash('added', 'Blog Created Successfully'));
        ;

    }

    public function postStore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required',
                'blog_id' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Title Required',
                'title.max' => 'Maximum Character Exceed',

            ]
        );
        if (request('slug') != null) {
            $request['slug'] = str_slug(request('slug'), '-');
        } else {
            $request['slug'] = str_slug(request('title'), '-');
        }

        Post::create([
            'title' => $request->title,
            'blog_id' =>$request->blog_id,
            'description' =>$request->description,
            'slug' =>$request->slug,
            'status' => $request->status,
        ]);

        return redirect()->route('post.index')->with(Session::flash('post-added', 'Blog Created Successfully'));
        ;

    }

    public function blogUpdate(Request $request,$id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                // 'parent_id' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Title Required',
                'title.max' => 'Maximum Character Exceed',

            ]
        );

        Blog::where('id',$id)->update([
            'title' => $request->title,
            'parent_id' =>$request->parent_id,
            'status' => $request->status,
        ]);

        return redirect()->route('blog.index')->with(Session::flash('updated', 'Blog Created Successfully'));
        ;

    }

    public function postUpdate(Request $request,$id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Title Required',
                'title.max' => 'Maximum Character Exceed',

            ]
        );

        Post::where('id',$id)->update([
            'title' => $request->title,
            'blog_id' =>$request->blog_id,
            'description' =>$request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('post.index')->with(Session::flash('post-updated', 'Post Updated Successfully'));
        ;

    }

    public function blogDelete($id)
    {
        $data = BLog::where('id',$id)->delete();
        return redirect()->back()->with(Session::flash('blog-deleted', 'Blog Deleted Successfully'));;
    }

    public function postDelete($id)
    {
        $data = post::where('id',$id)->delete();
        return redirect()->back()->with(Session::flash('post-deleted', 'Post Deleted Successfully'));;
    }


}

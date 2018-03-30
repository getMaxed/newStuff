<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Photo;
use function foo\func;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('both', ['only' => ['create', 'store', 'edit', 'update']]);
        $this->middleware('admin', ['only' => ['publish', 'destroy', 'bin', 'restore', 'destroyBlog']]);
    }

//    public function index()
//    {
//        $blogs = Blog::where('status', 0)->latest()->paginate(1);
//        return view('blog.index', compact('blogs'));
//    }

    public function index(Request $request)
    {
        $blogs = Blog::where(function($query) use ($request) {
            if($term = $request->get('term')) {
                $query->orWhere('title', 'like', '%' . $term . '%');
            }
        })
        ->orderBy('id', 'desc')
        ->paginate(1);

        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'min:20', 'max:200', 'unique:blogs'],
            'body' => ['required', 'min:200'],
            'photo_id' => ['mimes:jpeg,jpg,png', 'max:10000'],
            'category_id' => ['required'],
            'meta_desc' => ['required', 'min:10', 'max:30'],
        ];

        $message = [
            'photo_id.mimes' => 'Your image must be jpeg, jpg or png',
            'category_id.required' => 'The category field is required',
            'photo_id.max' => 'Your image should not exceed 10mb'
        ];

        $this->validate($request, $rules, $message);
        $input = $request->all();
        $input['slug'] = str_slug($request->title);
        $input['user_id'] = Auth::user()->id;
        $input['meta_title'] = $request->title;

        if ($file = $request->file('photo_id')) {
            $name = Carbon::now(). '.' .$file->getClientOriginalName();
            $name = str_replace(':', '-', $name);
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name, 'title' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $blog = Blog::create($input);
        if ($categoryIds = $request->category_id) {
            $blog->category()->sync($categoryIds);
        }

        $users = User::where('get_email', 1)->get();
        foreach ($users as $user) {
            Mail::queue('emails.newBlog', ['blog' => $blog, 'user' => $user], function ($message) use ($user) {
                $message->to($user->email)->from('info@newstuff.com', 'newStuff')->subject('New blog has been posted. Check it out!');
            });
        }

        Session::flash('flash_message', 'Blog is created');

        return redirect('blog');
    }

    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        return view('blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog', 'categories'));
    }

//    public function publish(Request $request, $id)
//    {
//        $input = $request->all();
//        $blog = Blog::findOrFail($id);
//        $blog->update($input);
//        return redirect('admin');
//    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => ['required', 'min:20', 'max:200'],
            'body' => ['required', 'min:200'],
            'photo_id' => ['mimes:jpeg,jpg,png', 'max:10000'],
        ];

        $message = [
            'photo_id.mimes' => 'Your image must be jpeg, jpg or png',
            'category_id.required' => 'The category field is required',
            'photo_id.max' => 'Your image should not exceed 10mb'
        ];

        $this->validate($request, $rules, $message);

        $input = $request->all();
        $blog = Blog::findOrFail($id);

        if ($file = $request->file('photo_id')) {

            if ($blog->photo) {
                unlink('images/' . $blog->photo->photo);
                $blog->photo()->delete('photo');
            }

            $name = Carbon::now(). '.' .$file->getClientOriginalName();
            $name = str_replace(':', '-', $name);
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name, 'title' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $blog->update($input);
        if ($categoryIds = $request->category_id) {
            $blog->category()->sync($categoryIds);
        }
        return redirect('blog');
    }

    public function destroy(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $categoryIds = $request->category_id;
        $blog->category()->detach($categoryIds);
        $blog->delete($request->all());
        return redirect('/blog/bin');
    }

    public function bin()
    {
        $deletedBlogs = Blog::onlyTrashed()->get();
        return view('blog.bin', compact('deletedBlogs'));
    }

    public function restore($id)
    {
        $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlogs->restore($restoredBlogs);
        return redirect('/blog');
    }

    public function destroyBlog($id)
    {
        $destroyBlog = Blog::onlyTrashed()->findOrFail($id);
        if ($destroyBlog->photo) {
            unlink('images/' . $destroyBlog->photo->photo);
            $destroyBlog->photo()->delete('photo');
        }
        $destroyBlog->forceDelete($destroyBlog);
        return back();
    }
}

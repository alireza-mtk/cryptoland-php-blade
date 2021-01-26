<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\ImageGallery;
use App\Models\JobImageGallery;
use App\Models\PostImageGallery;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->withCount('comments')->paginate(env("PAGINATION_COUNT", 10));

        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:posts|max:255',
            'image'     => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
            'categories' => 'required',
            'tags'      => 'required',
            'body'      => 'required',
            'status'    => 'in:0,1'
        ]);


        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->body = $request->body;
        // store status
        if ($request->status)
            $post->status = 1;
        else
            $post->status = 0;
        $post->save();

        $gallary = $request->file('image');

        if ($gallary) {
            // Upload the new files
            $currentDate =  Carbon::now()->timestamp;
            $galimage['name'] = $currentDate . '-' . uniqid() . '.' . $gallary->getClientOriginalExtension();
            $galimage['size'] = $gallary->getSize();

            if (!Storage::disk('public')->exists('posts')) {
                Storage::disk('public')->makeDirectory('posts');
            }

            $theImage = Image::make($gallary)->stream();
            Storage::disk('public')->put('posts/' . $galimage['name'], $theImage);

            $post->gallery()->create($galimage);
        }

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        Toastr::success('message', 'اطلاعات با موفقیت ثبت شد');
        return redirect()->route('admin.posts.index');
    }


    public function show(Post $post)
    {
        $post = Post::withCount('comments')->find($post->id);

        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($post->id);

        $selectedtag = $post->tags->pluck('id');

        return view('admin.posts.edit', compact('categories', 'tags', 'post', 'selectedtag'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|max:255',
            'image'     => 'mimes:jpeg,jpg,png,gif,svg',
            'categories' => 'required',
            'tags'      => 'required',
            'body'      => 'required'
        ]);

        $slug = Str::slug($request->title, '-');

        $post = Post::findOrFail($id);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->body = $request->body;
        // store status
        if ($request->status)
            $post->status = 1;
        else
            $post->status = 0;

        $post->save();

        $gallary = $request->file('image');
        if ($gallary) {
            // delete all the previous files
            $this->GalleryImageDelete($post->id);

            // Upload the new files
            $currentDate =  Carbon::now()->timestamp;
            $galimage['name'] = $currentDate . '-' . uniqid() . '.' . $gallary->getClientOriginalExtension();
            $galimage['size'] = $gallary->getSize();

            if (!Storage::disk('public')->exists('posts')) {
                Storage::disk('public')->makeDirectory('posts');
            }

            $theImage = Image::make($gallary)->stream();
            Storage::disk('public')->put('posts/' . $galimage['name'], $theImage);

            $post->gallery()->create($galimage);
        }

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('message', 'اطلاعات با موفقیت آپدیت شد');
        return redirect()->route('admin.posts.index');
    }


    public function destroy(Post $post)
    {
        $post = Post::find($post->id);

        //deleting the gallery
        $this->galleryImageDelete($post->id);

        $post->delete();
        $post->categories()->detach();
        $post->tags()->detach();
        $post->comments()->delete();

        Toastr::success('message', 'اطلاعات با موفقیت حذف شد');
        return back();
    }


    public function publicIndex(Post $post)
    {
        $post = Post::withCount('comments')->find($post->id);
        return view('pages.blog.index', compact('post'));
    }


    public function galleryImageDelete($id)
    {
        //getting the items
        $gallaryimg = ImageGallery::where(["imageable_type" => 'App\Models\Post', 'imageable_id' => $id])->get();


        //deleting the items
        foreach ($gallaryimg as $item) {

            //deleting the files
            if (Storage::disk('public')->exists('posts/' . $item->name)) {
                Storage::disk('public')->delete('posts/' . $item->name);
            }

            //deletting the items
            ImageGallery::destroy($item->id);
        }
    }
}

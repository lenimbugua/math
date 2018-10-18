<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use JavaScript;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(1);
        
        return view('pages.admin.posts.blogs')->with('posts',$posts);
    }

    public function dashboard()
    {

        
        
        return view('pages.admin.posts.dashboard');
    }

    public function listBlogs()
    {

        
        
         $posts = Post::orderBy('created_at', 'desc')->paginate(20);
         JavaScript::put([        
            'posts' => $posts,            
        ]);
        
        return view('pages.admin.posts.list_blogs')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.posts.createTPA');
    }

    public function addPost($category)
    {
       return view('/pages.admin.posts.add_posts')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'category'=>'required',
            'title'=>'required',
            'body'=>'required',
            
        ]);

        //make order
        $post = new Post;
        $post->category=$request->input('category');
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        
        $post->save();

        
        //redirect
        
        return redirect(route('list.blogs'))->with(['success'=>'Your post has been successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('pages.admin.posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
        return view('pages.admin.posts.edit')->with('post',$post);
    }
    public function editTPA($category)
    {
         $post = Post::where('category',$category)->first();
        return view('pages.admin.posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request,[
            'category'=>'required',
            'title'=>'required',
            'body'=>'required',
            
        ]);

        //update post
        $post = Post::find($id);
        $post->category=$request->input('category');
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();
       
        return view('pages.admin.posts.show')->with(['post'=> $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        
        $post->delete();

        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
         JavaScript::put([        
            'posts' => $posts,            
        ]);
        return redirect(route('list.blogs'))->with(['success'=>'Blog Removed','posts'=>$posts]);
    }
}

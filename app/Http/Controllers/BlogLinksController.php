<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogLinksController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allBlogs()
    {

        $posts = Post::whereNotIn('category', ['about', 'termsandconditions', 'privacypolicy'])
                    ->paginate(1);
        
        return view('pages.admin.posts.all_blogs')->with('posts',$posts);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {

        $posts = Post::orderBy('created_at', 'desc')->where('category', 'about')->paginate(2);
        
        return view('pages.admin.posts.blogs')->with('posts',$posts);
    }
     public function legalBlogs($category)
    {

        $posts = Post::orderBy('created_at', 'desc')->where('category', $category)->get();
        
        return view('pages.admin.posts.legal')->with('posts',$posts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function termsandconditions()
    {
       $termsandconditions = Post::orderBy('created_at', 'desc')->where('category', 'termsandconditions')->paginate(1);
        
        return view('pages.admin.posts.termsandconditions')->with('termsandconditions',$termsandconditions);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacypolicy()
    {
       $privacypolicy = Post::orderBy('created_at', 'desc')->where('category', 'privacypolicy')->paginate(1);
        
        return view('pages.admin.posts.privacypolicy')->with('privacypolicy',$privacypolicy);
    }

    public function mathBlog()
    {
       $posts = Post::orderBy('created_at', 'desc')->where('category', 'math')->paginate(1);
        
        return view('pages.admin.posts.math_blog')->with('posts',$posts);
    }

    public function accountingBlog()
    {
       $posts = Post::orderBy('created_at', 'desc')->where('category', 'accounting')->paginate(1);
        
        return view('pages.admin.posts.accounting_blog')->with('posts',$posts);
    }

    public function statisticsBlog()
    {
       $posts = Post::orderBy('created_at', 'desc')->where('category', 'statistics')->paginate(1);
        
        return view('pages.admin.posts.statistics_blog')->with('posts',$posts);
    }


    /**
     * Display a listing of the resource.
     *
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
        
        return redirect('/blogposts')->with(['success'=>'Your post has been successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

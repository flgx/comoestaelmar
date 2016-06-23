<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostsRequest;
use App\Post;
use Auth;
use Flash;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
        
        $post->save();
        Flash::success('Propuesta creada con exito!');
        return redirect()->route('home');
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
    public function showMyPosts()
    {
        $posts= Post::where('user_id',Auth::user()->id)->get();
        return view('post.myposts')->with('posts',$posts);
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
        return view('post.edit')->with('post',$post);
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
        $post = Post::find($id);
        $post->update($request->all());
        Flash::success("La propuesta <strong>".$post->titulo."</strong> fue actualizada.");
        return redirect()->route('post.myposts');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->type == 'admin'){
            $post = Post::find($id);
            $post->delete();
            Flash::error("La propuesta '<strong>".$post->titulo."</strong>' fue eliminada.");
            return redirect()->route('post.myposts');            
        }else{
            return redirect()->route('welcome');
        }
    }
}

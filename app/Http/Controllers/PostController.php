<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller // Controller + Service in Java
{
    public function postById() // get one post by id
    {
        $post = Post::find(1); // find() - getting entity by id
        dump($post->id); // post.getId()
        dump($post->content); // post.getContent()
        dump($post->title); // post.getTitle()
        dump($post->image); // post.getImage()
        dump($post->likes); //dump() -> output the contents of a variable/object without stop the execution
        dd($post->is_published); //dd() - Dump and Die - output the contents of a variable/object & stop the execution
        // 'dd($post->likes);' -> Unreadable statement
    }

    public function posts() // get all posts
    {
        $posts = Post::all(); // all() - getting all models(entities)
        foreach ($posts as $post) {
            dump($post->title); // post.getTitle()
        }
    }

    public function postByCondition()
    {
        $posts = Post::where('title', 'First Post')->get(); //where()-get models by condition(always returns List)
        foreach ($posts as $post) {
            dump($post->id); // post.getId()
            dump($post->image); // post.getImage()
        }
    }

    public function firstPostByCondition()
    {
        $posts = Post::where('likes', '<', 20)->first(); //first()-get first model in list by condition(always returns object)
        dump($posts->title);
    }

    public function create()
    {
        $postsArray = [
            [
                'title' => 'Fourth Post',
                'content' => 'la la la la(4)',
                'image' => 'image.png',
                'likes' => 40,
                'is_published' => 1,
            ],
            [
                'title' => 'Fifth Post',
                'content' => 'la la la la la(5)',
                'image' => 'image.png',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArray as $post) {
            Post::create($post); // postRepository.save(post) - create new model(entity) and save it
        }
        dd('Post was created successfully');
    }

    public function update()
    {
        $post = Post::find(3);
        $post->update( //
            [
                'title' => 'Third Post Updated',
                'content' => 'la la la la(3) Updated',
                'likes' => 333
            ]
        );
        dd('Post was updated successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller // like Service in Java
{
    public function postById() // get one post by id
    {
        $post = Post::find(1); // find() - getting entity by id
        dump($post->id); // post.getId()
        dump($post->post_content); // post.getContent()
        dump($post->title); // post.getTitle()
        dump($post->image); // post.getImage()
        dump($post->likes); //dump() -> output the post_contents of a variable/object without stop the execution
        dd($post->is_published); //dd() - Dump and Die - output the post_contents of a variable/object & stop the execution
        // 'dd($post->likes);' -> Unreadable statement
    }

    public function posts() // get all posts
    {
        $posts = Post::all(); // all() - getting all models(entities)
        return view('posts', compact('posts'));//compact() - transmitting the data($posts) to view (posts.blade.php)
    }

    public function postByCondition() // get posts by condition
    {
        $posts = Post::where('title', 'First Post')->get(); //where()-get models by condition(always returns List)
        foreach ($posts as $post) {
            dump($post->id); // post.getId()
            dump($post->image); // post.getImage()
        }
    }

    public function firstPostByCondition() // get first post by condition
    {
        $posts = Post::where('likes', '<', 20)->first(); //first()-get first model in list by condition(always returns object)
        dump($posts->title);
    }

    public function create()
    {
        $postsArray = [
            [
                'title' => 'First Post',
                'post_content' => 'la',
                'image' => 'image.png',
                'likes' => 10,
                'is_published' => 1,
            ],
            [
                'title' => 'Second Post',
                'post_content' => 'la la',
                'image' => 'image.png',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'Third Post',
                'post_content' => 'la la la',
                'image' => 'image.png',
                'likes' => 30,
                'is_published' => 1,
            ],
            [
                'title' => 'Fourth Post',
                'post_content' => 'la la la la',
                'image' => 'image.png',
                'likes' => 40,
                'is_published' => 1,
            ],
            [
                'title' => 'Fifth Post',
                'post_content' => 'la la la la la',
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

    public function update() // updating post by id
    {
        $post = Post::find(3);
        $post->update(
            [
                'title' => 'Third Post Updated',
                'post_content' => 'la la la la(3) Updated',
                'likes' => 333
            ]
        );
        dd('Post was updated successfully');
    }

    public function softDelete() // deleting with ability to restore model
    {
        $post = Post::find(15);
        $post->delete(); // set deletion time
        dd('Post was deleted successfully');
    }

    public function restore() // restorfirsing model
    {
        $post = Post::withTrashed()->find(3); //withTrashed() - get only deleted models
        $post->restore(); //restore() - restore model(just delete deletion time)
        dd('Post was restored successfully');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'Another Post', //if there is post with title = 'Another Post' -> return it
        ],[ // else ->
            'title' => 'Another Post(created by firstOrCreate)', // -> create new model(post)
            'post_content' => 'bla bla bla(created by firstOrCreate)',
            'image' => 'image.png',
            'likes' => 12345,
            'is_published' => 1,
            ]);
        dump($post->post_content);
        dd('Post was created successfully');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'some post', // if there is post with title == 'some post' -> update it by new data
        ],[ // else ->
            'title' => 'new post', // -> create new model(post)
            'post_content' => 'some bla bla(updated by updateOrCreate)',
            'image' => 'image.png',
            'likes' => 1122,
            'is_published' => 1,
        ]);
        dump($post->post_content);
        dd('Post was created successfully');
    }
}

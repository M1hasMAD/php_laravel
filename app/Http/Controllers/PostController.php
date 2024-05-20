<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller // like Service in Java
{
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));// view() - method go to file 'views' and searches for a specific file
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string', // required|... - adding text 'The title field is required' if the field is empty
            'content' => 'string',
            'image' => 'string',
            'likes' => 'int',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags); // attaching tags($tags) to the post($post)
        return redirect()->route('post.index');
    }

    public function posts() // get all posts
    {
        $posts = Post::all(); // all() - getting all models(entities)
        return view('post.index', compact( 'posts'));//compact() - transmitting the data($posts) to view (index.blade.php)

        //$category = Category::find(1);
        //dump($category->posts);

        //$post = Post::find(1);
        //dd($post->category);

        //$tag = Tag::find(1);
        //dd($tag->posts);

        //$post = Post::find(1);
        //dd($post->tags);
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }
    public function postById() // get one post by id
    {
        $post = Post::find(1); // find() - getting entity by id
        dump($post->id); // post.getId()
        dump($post->content); // post.getContent()
        dump($post->title); // post.getTitle()
        dump($post->image); // post.getImage()
        dump($post->likes); //dump() -> output the post_contents of a variable/object without stop the execution
        dd($post->is_published); //dd() - Dump and Die - output the post_contents of a variable/object & stop the execution
        // 'dd($post->likes);' -> Unreadable statement
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

    public function update(Post $post) // updating post by id
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'likes' => 'int',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags); // sync() - delete all tags by this post($post) and attach new tags($tags)

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function restore() // restorfirsing model
    {
        $post = Post::withTrashed()->find(3); //withTrashed() - get only deleted models
        $post->restore(); //restore() - restore model(just delete deletion time)
        dd('Post was restored successfully');
    }

    public function softDelete() // deleting with ability to restore model
    {
        $post = Post::find(15);
        $post->delete(); // set deletion time
        dd('Post was deleted successfully');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'Another Post', //if there is post with title = 'Another Post' -> return it
        ],[ // else ->
            'title' => 'Another Post(created by firstOrCreate)', // -> create new model(post)
            'content' => 'bla bla bla(created by firstOrCreate)',
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
            'content' => 'some bla bla(updated by updateOrCreate)',
            'image' => 'image.png',
            'likes' => 1122,
            'is_published' => 1,
        ]);
        dump($post->post_content);
        dd('Post was created successfully');
    }
}

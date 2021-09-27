<?php


namespace App\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Controllers\Controller;


class PostController extends Controller {

    public function index()
    {
        $post = new Post($this->getDB());

        $posts = $post->all();

        return $this->view('admin.post.index', compact('posts'));
    }


    public function edit(int $id)
    {

        $post = (new Post($this->getDB()))->findById($id);

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.edit', compact('post', 'tags'));

    }


    public function update(int $id)
    {

        $post = new Post($this->getDB());

        $tags = null;

        if(count($_POST) === 3)
        {

            $tags = array_pop($_POST);

        }

        $result = $post->update($id, $_POST, $tags);

        if ($result) 
        {

            return header('Location: /admin/posts');

        }

    }


    public function destroy(int $id)
    {

        $post = new Post($this->getDB());

        $result = $post->destroy($id);

        if ($result) 
        {

            return header('Location: /admin/posts');

        }


    }

}
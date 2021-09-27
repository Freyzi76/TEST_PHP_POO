<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Post;


class BlogController extends Controller {

    public function welcome()
    {

        return $this->view('blog.welcome');

    }


    public function index() {

        $this->isConnected();

        $post = new Post($this->getDB());

        $posts = $post->all();

        return $this->view('blog.index', compact('posts'));

    }
    


    public function show(int $id) {

        $this->isConnected();

        $post = new Post($this->getDB());

        $post = $post->findById($id);

        return $this->view('blog.show', compact('post'));

    }


    public function tag(int $id) {

        $this->isConnected();

        $tag = new Tag($this->getDB());

        $tag = $tag->findById($id);

        return $this->view('blog.tag', compact('tag'));

    }


}
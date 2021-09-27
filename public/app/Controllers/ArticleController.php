<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Tag;



class ArticleController extends Controller {


    public function index() {

        $post = new Article($this->getDB());

        $posts = $post->all();

        return $this->viewArticleIndex('blog.index', compact('posts'));

    }
    


    public function show(int $id) {

        $this->isConnected();

        $post = new Article($this->getDB());

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
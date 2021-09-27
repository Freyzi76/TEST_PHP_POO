<?php


namespace App\Controllers\Admin;

use App\Models\Tag;
use App\Models\Article;
use App\Controllers\Controller;


class ArticleModifyController extends Controller {

    public function index()
    {
        $this->isAdmin();

        $post = new Article($this->getDB());

        $posts = $post->all();

        return $this->view('admin.article.index', compact('posts'));
    }


    public function create()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.article.form', compact('tags'));

    }


    public function createPost()
    {
        $this->isAdmin();

        $post = new Article($this->getDB());

        $tags = null;

        if(count($_POST) === 3)
        {

            $tags = array_pop($_POST);

        }

        $result = $post->create($_POST, $tags);

        if ($result) 
        {

            return header('Location: /admin/article');

        }

    }


    public function form(int $id)
    {
        $this->isAdmin();

        $post = (new Article($this->getDB()))->findById($id);

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.article.form', compact('post', 'tags'));

    }


    public function update(int $id)
    {
        $this->isAdmin();

        $post = new Article($this->getDB());

        $tags = null;

        if(count($_POST) === 3)
        {

            $tags = array_pop($_POST);

        }

        $result = $post->update($id, $_POST, $tags);

        if ($result) 
        {

            return header('Location: /admin/article');

        }

    }


    public function destroy(int $id)
    {
        $this->isAdmin();

        $post = new Article($this->getDB());

        $result = $post->destroy($id);

        if ($result) 
        {

            return header('Location: /admin/article');

        }


    }

}
<?php


namespace App\Controllers\Admin;

use App\Models\Tag;
use App\Models\Article;
use App\Controllers\Controller;


class Dashboard extends Controller {

    public function index()
    {
        $this->isAdmin();

        return $this->adminView('admin.index');
    }


    public function getArticle()
    {
        $this->isAdmin();

        $post = new Article($this->getDB());

        $posts = $post->all();

        return $this->adminView('admin.article.getArticle', compact('posts'));
    }



    public function createArticle()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->adminView('admin.article.form', compact('tags'));

    }



    public function getTag()
    {
        $this->isAdmin();

        $tags = new Tag($this->getDB());

        $tags = $tags->all();

        return $this->adminView('admin.tag.getTag', compact('tags'));
    }












    public function adminView(string $path, array $params = null) {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        require VIEWS . $path . '.php';

        $content = ob_get_clean();

        require VIEWS . 'adminView.php';

    }


}
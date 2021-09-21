<?php

namespace App\Models;

use DateTime;

class Post extends Model {


    protected $table = 'posts';

    public function getCreatedAt(): string
    {

        return 'publié le ' . (new DateTime($this->created_at))->format('d/m/Y');

    }


    public function getExcerpt(): string 
    {

        return substr($this->content, 0, 350) . '...';

    }


    public function getButton(): string 
    {

        return <<<END

        <a href="/posts/$this->id" class="btn btn-primary">Lire l'article</a>
END;

    }

}
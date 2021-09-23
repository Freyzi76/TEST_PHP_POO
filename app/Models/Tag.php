<?php

namespace App\Models;

use DateTime;


class Tag extends Model {


    protected $table = 'tags';


    public  function getPosts()
    {
        
        return $this->query("
        
        SELECT p.* FROM posts p

        INNER JOIN post_tag pt ON pt.post_id = p.id

        WHERE pt.tag_id = ?
    
        ", [$this->id]);

    }


    public function getExcerpt(): string 
    {

        return substr($this->content, 0, 350) . '...';

    }

    public function getCreatedAt(): string
    {

        return 'publié le ' . (new DateTime($this->created_at))->format('d/m/Y');

    }


    public function getButton(): string 
    {

        return <<<END

        <a href="/posts/$this->id" class="btn btn-primary">Lire l'article</a>
END;

    }



}
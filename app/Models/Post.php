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



    public function getTags() 
    {

        return $this->query("
        
        SELECT t.* FROM tags t

        INNER JOIN post_tag pt ON pt.tag_id = t.id

        WHERE pt.post_id = ?
        
        ", [$this->id]);

    }


    public function create(array $data, ?array $relation = null)
    {

        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

            if ($relation !== null) {

                foreach ($relation as $tagId)
                {
                    $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUES (?, ?)");

                    $stmt->execute([$id, $tagId]);
                }

            }

        return true;

    }



    public function update(int $id, array $data, ?array $relation = null) 
    {

        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");

        $stmt->execute([$id]);

            if ($relation !== null) {

                foreach ($relation as $tagId)
                {
                    $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUES (?, ?)");

                    $stmt->execute([$id, $tagId]);
                }

            }

        return true;

    }





}
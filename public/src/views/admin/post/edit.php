<h1>Modifer l'article : </h1>

<form action="/admin/posts/update/<?= $params['post']->id ?>" method="post">

    <div class="form-group">

        <label for="title"> Titre de l'article </label>

        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?>">

    </div>

    <br>

    <div class="form-group">

        <label for="content"> Contenu de l'article </label>

        <textarea name="content" id="content" rows="8" class="form-control"> <?= $params['post']->content ?> </textarea>

    </div>

    <br>

    <div class="form-group">

        <label for="tags">Tags de l'article</label>

        <select class="form-select" multiple name="tags[]" id="tags">

            <?php foreach($params['tags'] as $tag): ?>

                <option value="<?= $tag->id ?>"
                
                    <?php foreach($params['post']->getTags() as $postTag) 
                    {

                        echo ($tag->id === $postTag->id) ? ' selected' : '';

                    }
                    ?>
            
                > <?= $tag->name ?> </option>

            <?php endforeach ?>

        </select>

    </div>

    <br>

    <button type="submit" class="btn btn-primary"> Enregistrer </button>

</form>
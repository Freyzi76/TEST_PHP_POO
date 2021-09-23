<?php foreach ($params['posts'] as $post): ?>

    <div class="card">

        <div class="card-body mb-3">

         <h2><?= $post->title ?></h2>

         <div>

            <?php foreach ($post->getTags() as $tag): ?>

             <span class="badge bg-success"><a href="/tags/<?= $tag->id ?>" class="text-white"> <?= $tag->name ?> </a></span>

             <?php endforeach ?>

         </div>

         <small class="text-info"><?= $post->getCreatedAt() ?></small>

         <p><?= $post->getExcerpt() ?></p>    

         <?= $post->getButton() ?>

        </div>

    </div>



<?php endforeach ?>
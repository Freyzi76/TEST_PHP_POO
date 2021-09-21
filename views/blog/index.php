<?php foreach ($params['posts'] as $post): ?>

    <div class="card">

        <div class="card-body mb-3">

         <h2><?= $post->title ?></h2>

         <small class="badge bg-info"><?= $post->getCreatedAt() ?></small>

         <p><?= $post->getExcerpt() ?></p>    

         <?= $post->getButton() ?>

        </div>

    </div>



<?php endforeach ?>
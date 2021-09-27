
<div class="card">

<div class="card-body mb-3">

 <h2><?= $params['post']->title ?></h2>

    <div>

        <?php foreach ($params['post']->getTags() as $tag): ?>

            <span class="badge bg-success"><a href="/tags/<?= $tag->id ?>" class="text-white"> <?= $tag->name ?> </a></span>

        <?php endforeach ?>

    </div>

 <small><?= $params['post']->getCreatedAt() ?></small>

 <p><?= $params['post']->content ?></p>    

 <a href="/posts" class="btn btn-primary">Retour</a>

</div>

</div>
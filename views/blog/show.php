
<div class="card">

<div class="card-body mb-3">

 <h2><?= $params['post']->title ?></h2>

 <small><?= $params['post']->getCreatedAt() ?></small>

 <p><?= $params['post']->content ?></p>    

 <a href="/posts" class="btn btn-primary">Retour</a>

</div>

</div>
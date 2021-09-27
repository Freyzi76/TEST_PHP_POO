<a href="/admin/tag/create" class="btn btn-success my-3">Crée un tag</a>

<br>

<?= var_dump($_SESSION); ?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Publié le</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach ($params['tags'] as $tag): ?>


    <tr>

      <th scope="row"><?= $tag->id ?></th>

      <td><?= $tag->name ?></td>

      <td><?= $tag->getCreatedAt() ?></td>

      <td>

          <a href="/admin/posts/form/<?= $tag->id ?>" class="btn btn-warning">Modifier</a>

          <form action="/admin/posts/delete/<?= $tag->id ?>" method="post" class="d-inline">

            <button type='submit' class="btn btn-danger">Supprimer</button>

          </form>

        
        </td>

    </tr>


        <?php endforeach ?>
    
  </tbody>
</table>
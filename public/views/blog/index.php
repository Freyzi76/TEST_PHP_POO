<?php //echo crypt('admin', "$6$12=5000MEGAsecretKEY765325dqz6d2d265ad2kuh11dq9z$"); ?>

<?php foreach ($params['posts'] as $post): ?>

    <div class="col">

        <div class="card shadow-sm">

            <img src="../image/via.svg" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                
                <div class="card-body">
                
                    <h2><?= $post->title ?></h2>

                    <div>

                        <?php foreach ($post->getTags() as $tag): ?>

                            <span class="badge bg-success"><a href="/tags/<?= $tag->id ?>" class="text-white"> <?= $tag->name ?> </a></span>

                        <?php endforeach ?>

                    </div>

                            <p class="card-text"><?= $post->getExcerpt() ?></p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                    <div class="btn-group">
                                            
                                        <?= $post->getButton() ?>

                                    </div>

                                
                                    <small class="text-muted"><?= $post->getCreatedAt() ?></small>
                        
                                </div>
        
        </div>

    </div>

</div>



<?php endforeach ?>






<?php
    $this->layout('layout', ['title' => 'TechNews | '.ucfirst($categorie), 'current' => '']);
    use Model\Shortcut;
    $this->start('contenu');
?>

    <div class="row">
        <!--colleft-->
        <div class="col-md-8 col-sm-12">
             <?php if($nbarticles > 0) { ?>
            <div class="box-caption">
                <span><?= $categorie; ?></span>
            </div>
            <!--list-news-cate-->
            <div class="list-news-cate">
                <?php foreach ($articles as $article) : ?>
                        <article class="news-cate-item">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <a href="<?= $this->url('default_article', ['id' => $article->IDARTICLE, 'slug' => Shortcut::generateSlug($article->TITREARTICLE)]); ?>">
                                        <img alt="" src="<?= $this->assetUrl('/images/product/'.$article->FEATUREDIMAGEARTICLE); ?>">
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h3><a href="<?= $this->url('default_article', ['id' => $article->IDARTICLE, 'slug' => Shortcut::generateSlug($article->TITREARTICLE)]); ?>"><?= $article->TITREARTICLE; ?></a></h3>
                                    <div class="meta-post">
                                        <a href="#">
                                            <?= $article->PRENOMAUTEUR.' '.$article->NOMAUTEUR; ?>
                                        </a>
                                        <em></em>
                                        <span>
                                            <?= $article->DATECREATIONARTICLE; ?>
                                        </span>
                                    </div>
                                    <?= Shortcut::getAccroche($article->CONTENUARTICLE); ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
            </div>

            <!--paging
            <div class="paging">
                <a href="#">Prev</a>
                <a href="#" class="current">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">Next</a>
            </div>-->

            <?php } else { ?>
                <p><strong>Aucune publication pour le moment.</strong></p>
            <?php } ?>

        </div>

<?php $this->stop('contenu') ?>

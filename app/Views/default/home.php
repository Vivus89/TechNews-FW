<?php
    # Layout utilis� pour la vue
    $this->layout('layout', ['title' => 'Accueil', 'current' => '']);
    use Model\Shortcut;
?>

<?php $this->start('contenu') ?>
    <div class="row">
        <!--colleft-->
        <div class="col-md-8 col-sm-12">
        	<div class="box-caption">
        		<span>spotlight</span>
        	</div>
        	<!--sportlight-->
        	<section class="owl-carousel owl-spotlight">
        	<?php foreach ($spotlights as $slide) : ?>
        		<div>
        			<article class="spotlight-item">
        				<div class="spotlight-img">
        					<img alt="" src="<?= $this->assetUrl('/images/product/'.$slide->FEATUREDIMAGEARTICLE); ?>" class="img-responsive" />
        					<a href="#" class="cate-tag"><?= $slide->LIBELLECATEGORIE; ?></a>
        				</div>
        				<div class="spotlight-item-caption">
        					<h2 class="font-heading">
        						<a href="<?= $this->url('default_article', ['id' => $slide->IDARTICLE, 'slug' => Shortcut::generateSlug($slide->TITREARTICLE)]); ?>">
        							<?= $slide->TITREARTICLE; ?>
        						</a>
        					</h2>
        					<div class="meta-post">
        						<a href="#">
        							<?= $slide->PRENOMAUTEUR.' '.$slide->NOMAUTEUR; ?>
        						</a>
        						<em></em>
        						<span>
        							<?= $slide->DATECREATIONARTICLE; ?>
        						</span>
        					</div>
        					<p><?= Shortcut::getAccroche($slide->CONTENUARTICLE); ?></p>
        				</div>
        			</article>
        		</div>
        	  <?php endforeach; ?>
        	</section>

        	<!--spotlight-thumbs-->
        	<section class="spotlight-thumbs">
        		<div class="row">
        		<?php foreach($articles as $article) : ?>
        			<div class="col-md-4 col-sm-4 col-xs-12">
        				<div class="spotlight-item-thumb">
        					<div class="spotlight-item-thumb-img">
        						<a href="<?= $this->url('default_article', ['id' => $article->IDARTICLE, 'slug' => Shortcut::generateSlug($article->TITREARTICLE)]); ?>">
        							<img alt="" src="<?= $this->assetUrl('/images/product/'.$article->FEATUREDIMAGEARTICLE); ?>">
        						</a>
        						<a href="#" class="cate-tag"><?= $article->LIBELLECATEGORIE; ?></a>
        					</div>
        					<h3><a href="<?= $this->url('default_article', ['id' => $article->IDARTICLE, 'slug' => Shortcut::generateSlug($article->TITREARTICLE)]); ?>"><?= $article->TITREARTICLE; ?></a></h3>
        					<div class="meta-post">
        						<a href="#">
        							<?= $article->PRENOMAUTEUR; ?> <?= $article->NOMAUTEUR; ?>
        						</a>
        						<em></em>
        						<span>
        							<?= $article->DATECREATIONARTICLE; ?>
        						</span>
        					</div>
        				</div>
        			</div>
        		<?php endforeach; ?>
        		</div>
        	</section>
        </div>

<?php $this->stop('contenu') ?>

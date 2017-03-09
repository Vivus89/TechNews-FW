<?php 
    $this->layout('layout', ['title' => 'TechNews |'.ucfirst($categorie), 'current' => ucfirst($categorie)]);
    use Model\Shortcut;
    $this->start('contenu');
?>
<div class="row">
    <!--colleft-->
    <div class="col-md-8 col-sm-12">
		<!--Add Article Form-->
		<form method="post" action="#">
			<input type="text" name="TITREARTICLE" placeholder="Titre de l'article..."><br>
			<select name="LIBELLECATEGORIE">
			<?php foreach ($categorie as $category) :?>
				<option value="<?= $category->LIBELLECATEGORIE ?>"><?= $category->LIBELLECATEGORIE ?></option>
			<?php endforeach; ?>	
			</select>
			<select name="NOMAUTEUR">
			<?php foreach ($auteur as $author) :?>
				<option value="<?= $author->PRENOMAUTEUR ?>"><?= $author->PRENOMAUTEUR ?></option>
			<?php endforeach; ?>
			</select>
			<select name="PRENOMAUTEUR">
			<?php foreach ($auteur as $author) :?>
				<option value="<?= $author->PRENOMAUTEUR ?>"><?= $author->PRENOMAUTEUR ?></option>
			<?php endforeach; ?>
			</select>
			<select name="EMAILAUTEUR">
			<?php foreach ($auteur as $author) :?>
				<option value="<?= $author->EMAILAUTEUR ?>"><?= $author->EMAILAUTEUR ?></option>
			<?php endforeach; ?>
			</select>
			<input id="summernote" type="textarea" name="CONTENUARTICLE" placeholder="Votre article..."><br>
			
		</form>



	</div>
<?php $this->stop('contenu'); ?>
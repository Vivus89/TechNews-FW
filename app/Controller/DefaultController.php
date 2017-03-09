<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Db\DBFactory;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par d�faut
	 */
	public function home() {

	    # Connexion a la BDD
	    DBFactory::start();

	    # R�cup�ration des Articles en SPOTLIGHT
	    $spotlights = \ORM::for_table('view_articles')->where('SPOTLIGHTARTICLE', 1)->find_result_set();

	    # R�cup�rations des Articles de la Page d'Accueil
	    $articles = \ORM::for_table('view_articles')->find_result_set();

	    # Transmettre � la Vue
	    $this->show('default/home', ['spotlights' => $spotlights, 'articles' => $articles]);
	}

	/**
	 * Permet d'afficher les articles d'une cat�gorie
	 * @param STRING $categorie
	 */
	public function categorie($categorie) {
	    # Connexion a la BDD
	    DBFactory::start();

	    # R�cup�rations des Articles de la Cat�gorie
	    $articles  = \ORM::for_table('view_articles')->where('LIBELLECATEGORIE', ucfirst($categorie))->find_result_set();
	    $nbarticles = $articles->count();

	    # Transmettre � la Vue
	    $this->show('default/categorie', ['articles' => $articles, 'categorie' => $categorie, 'nbarticles' => $nbarticles]);

	}

	/**
	 * Permet d'afficher un Article
	 * @param Entier $id IDARTICLE
	 * @param String $slug SLUGARTICLE
	 */
	public function article($id, $slug) {

	    # Connexion a la BDD
	    DBFactory::start();

	    # R�cup�ration des Donn�es de l'Article
	    $article = \ORM::for_table('view_articles')->find_one($id);

	    # Suggestions
	    $suggestions = \ORM::for_table('view_articles')->where('IDCATEGORIE', $article->IDCATEGORIE)->where_not_equal('IDARTICLE', $id)->limit(3)->order_by_desc('IDARTICLE')->find_result_set();

	    # Transmettre � la Vue
	    $this->show('default/article', ['article' => $article, 'suggestions' => $suggestions, 'categorie' => $article->LIBELLECATEGORIE]);

	}
	public function add($add){
		#Connexion à la BDD
		DBFactory::start();
		# integration de l'article dans la BDD article
		if (!empty($_POST)) {
		$article = ORM::for_table('article')->create();
		$article->DATECREATIONARTICLE;

		$article->CONTENUARTICLE= $_POST['CONTENUARTICLE'];

		$article->save();
		#integration de l'auteur dans la BDD auteur
		$auteurs = ORM::for_table('auteur')->create();
		$auteurs->NOMAUTEUR= $_POST['NOMAUTEUR'];
		$auteurs->PRENOMAUTEUR= $_POST['PRENOMAUTEUR'];
		$auteurs->EMAILAUTEUR= $_POST['EMAILAUTEUR'];
		$auteurs->save();

		#integration de categorie dans la BDD categorie
		$categories = ORM::for_table('categorie')->create();
		$categories->LIBELLECATEGORIE= $_POST['LIBELLECATEGORIE'];

		$categories->save();

		$auteur= ORM::for_table('auteur')->find_many();
		$categorie=ORM::for_table('categorie')->find_many();
		 # Transmettre � la Vue
		$this->show('default/add',[ 'article'=>$article, 'auteur'=>$auteur, 'auteurs'=>$auteurs , 'categorie'=>$categorie, 'categories'=$categories]);

 }


	}
}

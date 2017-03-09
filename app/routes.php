<?php

	$w_routes = array(
	    # Accueil
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/accueil.html', 'Default#home', 'default_accueil'],

	    # Route pour Afficher les Articles d'une Cat�gorie
		['GET', '/news/[:categorie]', 'Default#categorie', 'default_categorie'],

	    # Route pour Afficher un Article
		['GET', '/article/[i:id]-[:slug].html', 'Default#article', 'default_article'],
		# route pour ajouter un article
		['POST', '/article/add', 'Default#add', 'default_add'],
		['GET', '/article/edit', 'Default#edit', 'default_edit']
	);

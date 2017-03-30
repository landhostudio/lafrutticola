<?php

function cptui_register_my_cpts_prodotto() {

	/**
	 * Post Type: Prodotti.
	 */

	$labels = array(
		"name" => __( 'Prodotti', '' ),
		"singular_name" => __( 'Prodotto', '' ),
		"menu_name" => __( 'Prodotti', '' ),
		"all_items" => __( 'Tutti i prodotti', '' ),
		"add_new" => __( 'Aggiungi nuovo', '' ),
		"add_new_item" => __( 'Aggiungi nuovo prodotto', '' ),
		"edit_item" => __( 'Modifica prodotto', '' ),
		"new_item" => __( 'Nuovo prodotto', '' ),
		"view_item" => __( 'Visualizza prodotto', '' ),
		"view_items" => __( 'Vedi prodotto', '' ),
		"search_items" => __( 'Cerca prodotto', '' ),
		"not_found" => __( 'Nessun prodotto trovato', '' ),
		"not_found_in_trash" => __( 'Nessun prodotto trovato nel cestino', '' ),
		"parent_item_colon" => __( 'Prodotto genitore', '' ),
		"featured_image" => __( 'L’immagine in evidenza per questo prodotto', '' ),
		"set_featured_image" => __( 'Imposta l’immagine in evidenza per questo prodotto', '' ),
		"remove_featured_image" => __( 'Rimuovi l’immagine in evidenza per questo prodotto', '' ),
		"use_featured_image" => __( 'Utilizza come immagine personalizzata per questo prodotto', '' ),
		"archives" => __( 'Archivio prodotti', '' ),
		"insert_into_item" => __( 'Inserisci nel prodotto', '' ),
		"uploaded_to_this_item" => __( 'Caricato in questo prodotto', '' ),
		"filter_items_list" => __( 'Filtra elenco prodotti', '' ),
		"items_list_navigation" => __( 'Lista di navigazione per prodotto', '' ),
		"items_list" => __( 'Elenco prodotti', '' ),
		"attributes" => __( 'Attribuiti dei prodotti', '' ),
		"parent_item_colon" => __( 'Prodotto genitore', '' ),
	);

	$args = array(
		"label" => __( 'Prodotti', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "prodotto", "with_front" => false ),
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-cart",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "prodotto", $args );
}

add_action( 'init', 'cptui_register_my_cpts_prodotto' );

function cptui_register_my_taxes_tipologia() {

	/**
	 * Taxonomy: Tipologia.
	 */

	$labels = array(
		"name" => __( 'Tipologia', '' ),
		"singular_name" => __( 'Tipologia', '' ),
	);

	$args = array(
		"label" => __( 'Tipologia', '' ),
		"labels" => $labels,
		"public" => false,
		"hierarchical" => false,
		"label" => "Tipologia",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"query_var" => true,
		"rewrite" => false,
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "tipologia", array( "prodotto" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_tipologia' );

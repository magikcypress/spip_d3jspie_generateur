<?php

/**
 * Base pour d3jspie_generateur
 *
 * @plugin     d3jspie_generateur
 * @copyright  2015
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\d3jspie_generateur\base
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Interfaces des tables d3jspie_generateur pour le compilateur
 *
 * @param array $interfaces
 * @return array
 */
function d3jspie_generateur_declarer_tables_interfaces($interfaces) {
	$interfaces['table_des_tables']['d3jspie_generateur'] = 'd3jspie_generateur';
	$interfaces['table_des_tables']['d3jspie_generateur_documents']='d3jspie_generateur_documents';
	
	return $interfaces;
}

function d3jspie_generateur_declarer_tables_objets_sql($tables){

	$tables['spip_d3jspie_generateur'] = array(
		'texte_retour' 		=> 'icone_retour',
		'texte_objets' 		=> 'd3jspie_generateur:d3jspie_generateur',
		'texte_objet' 		=> 'd3jspie_generateur:d3jspie_generateur',
		'texte_modifier' 	=> 'd3jspie_generateur:icone_modifier_d3jspie',
		'texte_creer' 		=> 'd3jspie_generateur:icone_nouveau_d3jspie',
		'principale' 		=> 'oui',
		'field'=> array(
			"id_d3jspie_generateur" 	=> "bigint(21) unsigned NOT NULL AUTO_INCREMENT",
			"statut" 					=> "varchar(255) NOT NULL default 'oui'",
			"titre" 					=> "varchar(255) NOT NULL default 'oui'",
			"texte" 					=> "text default '' NOT NULL",
			"header_title_fontSize" 	=> "varchar(255) NOT NULL default ''",
			"header_title_font" 		=> "varchar(255) NOT NULL default ''",
			"header_title_color" 		=> "varchar(255)  NOT NULL default ''",
			"header_subtitle_text" 		=> "varchar(255) NOT NULL",
			"header_subtitle_color" 	=> "varchar(255) NOT NULL default ''",
			"header_subtitle_fontSize" 	=> "varchar(255) NOT NULL default ''",
			"header_subtitle_font" 		=> "varchar(255) NOT NULL default ''",
			"footer_text" 				=> "varchar(255) NOT NULL default ''",
			"footer_color" 				=> "varchar(255) NOT NULL default ''",
			"footer_fontSize"			=> "varchar(255) NOT NULL default ''",
			"footer_font" 				=> "varchar(255) NOT NULL default ''",
			"footer_location" 			=> "varchar(255) NOT NULL default ''",
			"size_canvasWidth" 			=> "varchar(255) NOT NULL default ''",
			"size_canvasHeight" 		=> "varchar(255) NOT NULL default ''",
			"size_canvasTop" 			=> "varchar(255) NOT NULL default ''",
			"size_canvasBottom" 		=> "varchar(255) NOT NULL default ''",
			"size_canvasRight" 			=> "varchar(255) NOT NULL default ''",
			"size_canvasLeft" 			=> "varchar(255) NOT NULL default ''",
			"rotation_yaxis" 			=> "varchar(255) NOT NULL default ''",
			"titre_yaxis" 				=> "varchar(255) NOT NULL default ''",
			"labels_outer_pieDistance" 	=> "varchar(255) NOT NULL default ''",
			"labels_inner_hideWhenLessThanPercentage" => "varchar(255) NOT NULL default ''",
			"labels_mainLabel_color" 	=> "varchar(255) NOT NULL default ''",
			"labels_mainLabel_fontSize" => "varchar(255) NOT NULL default ''",
			"labels_percentage_color" 	=> "varchar(255) NOT NULL default ''",
			"labels_percentage_decimalPlaces" => "varchar(255) NOT NULL default ''",
			"labels_value_fontSize" 	=> "varchar(255) NOT NULL default ''",
			"labels_value_color" 		=> "varchar(255) NOT NULL default ''",
			"labels_lines_enabled" 		=> "varchar(255) NOT NULL default ''",
			"bulle_background" 			=> "varchar(255) NOT NULL default ''",
			"bulle_border" 				=> "varchar(255) NOT NULL default ''",
			"bulle_color" 				=> "varchar(255) NOT NULL default ''",
			"bulle_z_index" 			=> "varchar(255) NOT NULL default ''",
			"effects_pullOutSegmentOnClick_effect" => "varchar(255) NOT NULL default ''",
			"effects_pullOutSegmentOnClick_speed" => "varchar(255) NOT NULL default ''",
			"effects_pullOutSegmentOnClick_size" => "varchar(255) NOT NULL default ''",
			"misc_gradient_enabled" 	=> "varchar(255) NOT NULL default ''",
			"misc_gradient_percentage" 	=> "varchar(255) NOT NULL default ''",
			"type"						=> "varchar(255) NOT NULL",
			"date_modif" 				=> "datetime NOT NULL default '0000-00-00 00:00:00'",
			"maj"						=> "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY" => "id_d3jspie_generateur"
		)
	);

	$tables_principales['spip_d3jspie_generateur_documents']	=
		array('field' => &$spip_d3jspie_generateur_documents, 'key' => &$spip_d3jspie_generateur_documents_key);

	return $tables;
}


?>
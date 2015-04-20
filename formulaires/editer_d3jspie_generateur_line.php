<?php
/**
 * Utilisations de pipelines par d3jspie_generateur
 *
 * @plugin     d3jspie_generateur
 * @copyright  2015
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\forumlaire\d3jspie_generateur
 */

/**
 * Gestion du formulaire de d3jspie_generateur des sites 
 *
 * @package SPIP\Formulaires
**/
if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Chargement du formulaire de configuration des d3jspie_generateur_bar
 *
 * @return array
 *     Environnement du formulaire
**/
function formulaires_editer_d3jspie_generateur_line_charger_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){

	$valeurs = array();
	$d3jspie_generateur = sql_allfetsel('*', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));


	if($d3jspie_generateur) {
		foreach ($d3jspie_generateur as $valeur) {
			foreach ($valeur as $cle => $valeur) {
				$valeurs["form_$cle"] = $valeur;
			}
		}
		spip_log($valeurs,'test.' . _LOG_ERREUR);
	} else {
		$champs = array(
			'form_titre',
			'form_header_title_text',
			'form_header_title_fontSize',
			'form_header_title_font',
			'form_header_title_color',
			'form_header_subtitle_text',
			'form_header_subtitle_color',
			'form_header_subtitle_fontSize',
			'form_header_subtitle_font',
			'form_footer_text',
			'form_footer_color',
			'form_footer_fontSize',
			'form_footer_font',
			'form_footer_location',
			'form_size_canvasWidth',
			'form_size_canvasHeight',
			'form_data_content_label',
			'form_data_content_value',
			'form_data_content_color',
			'form_labels_outer_pieDistance',
			'form_labels_inner_hideWhenLessThanPercentage',
			'form_labels_mainLabel_color',
			'form_labels_mainLabel_fontSize',
			'form_labels_percentage_color',
			'form_labels_percentage_decimalPlaces',
			'form_labels_value_fontSize',
			'form_labels_value_color',
			'form_labels_lines_enabled',
			'form_effects_pullOutSegmentOnClick_effect',
			'form_effects_pullOutSegmentOnClick_speed',
			'form_effects_pullOutSegmentOnClick_size',
			'form_misc_gradient_enabled',
			'form_misc_gradient_percentage',
			'dimension_canvasTop',
			'dimension_canvasBottom',
			'dimension_canvasRight',
			'dimension_canvasLeft',
			'rotation_yaxis',
			'bulle_background',
			'bulle_border',
			'bulle_color',
			'bulle_corner_border',
			'bulle_z_index'
		);

		foreach ($champs as $cle => $valeur) {
			$valeurs["$valeur"] = _request($valeur);
		}
		spip_log($valeurs,'test.' . _LOG_ERREUR);
	}

	// $valeurs['_etapes'] = 8;
	return $valeurs;
	
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur_bar
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_line_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();

	return $erreurs;
}

/**
 * Traitement du formulaire de configuration des d3jspie_generateur_bar
 *
 * @return array
 *     Retours du traitement
**/
function formulaires_editer_d3jspie_generateur_traiter_line_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){

	$set = array();
	$id_d3jspie_generateur = sql_getfetsel('id_d3jspie_generateur', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));

	$set['id_d3jspie_generateur'] = $id_d3jspie_generateur;
	$set['titre'] = _request('form_titre');
	$set['date_modif'] = date('Y-m-d H:i:s');
	$set['type'] = "bar";

	if($id_d3jspie_generateur) {
		sql_updateq('spip_d3jspie_generateur', $set, 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));
	} else {
		sql_insertq('spip_d3jspie_generateur', $set);
	}

	return array('editable' => true, 'message_ok'=>_T('config_info_enregistree'));
}

?>

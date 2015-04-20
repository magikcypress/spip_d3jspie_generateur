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
 * Chargement du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Environnement du formulaire
**/
function formulaires_editer_d3jspie_generateur_charger_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){

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
			'form_misc_gradient_percentage'
		);

		foreach ($champs as $cle => $valeur) {
			$valeurs["$valeur"] = _request($valeur);
		}
		spip_log($valeurs,'test.' . _LOG_ERREUR);
	}
	$valeurs['_etapes'] = 8;
	spip_log($valeurs,'test.' . _LOG_ERREUR);

	return $valeurs;
	
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_1_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();

	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_2_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
			
	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_3_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
			
	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_4_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
			
	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_5_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
			
	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_6_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
			
	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_7_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
			
	return $erreurs;
}

/**
 * Vérifications du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Tableau des erreurs
**/
function formulaires_editer_d3jspie_generateur_verifier_8_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();
	spip_log(_request('form_labels_lines_enabled'),'test.' . _LOG_ERREUR);
	return $erreurs;
}

/**
 * Traitement du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Retours du traitement
**/
function formulaires_editer_d3jspie_generateur_traiter_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
spip_log(_request('form_labels_lines_enabled'),'test.' . _LOG_ERREUR);
	$set = array();
	$id_d3jspie_generateur = sql_getfetsel('id_d3jspie_generateur', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));

	$set['id_d3jspie_generateur'] = $id_d3jspie_generateur;
	$set['titre'] = _request('form_titre');
	$set['header_title_text'] = _request('form_header_title_text');
	$set['header_title_fontSize'] = _request('form_header_title_fontSize');
	$set['header_title_font'] = _request('form_header_title_font');
	$set['header_subtitle_text'] = _request('form_header_subtitle_text');
	$set['header_subtitle_color'] = _request('form_header_subtitle_color');
	$set['header_subtitle_fontSize'] = _request('form_header_subtitle_fontSize');
	$set['header_subtitle_font'] = _request('form_header_subtitle_font');
	$set['footer_text'] = _request('form_footer_text');
	$set['footer_color'] = _request('form_footer_color');
	$set['footer_fontSize'] = _request('form_footer_fontSize');
	$set['footer_font'] = _request('form_footer_font');
	$set['footer_location'] = _request('form_footer_location');
	$set['size_canvasWidth'] = _request('form_size_canvasWidth');
	$set['data_content_label'] = _request('form_data_content_label');
	$set['data_content_value'] = _request('form_data_content_value');
	$set['data_content_color'] = _request('form_data_content_color');
	$set['labels_outer_pieDistance'] = _request('form_labels_outer_pieDistance');
	$set['labels_inner_hideWhenLessThanPercentage'] = _request('form_labels_inner_hideWhenLessThanPercentage');
	$set['labels_mainLabel_color'] = _request('form_labels_mainLabel_color');
	$set['labels_mainLabel_fontSize'] = _request('form_labels_mainLabel_fontSize');
	$set['labels_percentage_color'] = _request('form_labels_percentage_color');
	$set['labels_percentage_decimalPlaces'] = _request('form_labels_percentage_decimalPlaces');
	$set['labels_value_fontSize'] = _request('form_labels_value_fontSize');
	$set['labels_value_color'] = _request('form_labels_value_color');
	$set['labels_lines_enabled'] = _request('form_labels_lines_enabled');
	$set['effects_pullOutSegmentOnClick_effect'] = _request('form_effects_pullOutSegmentOnClick_effect');
	$set['effects_pullOutSegmentOnClick_speed'] = _request('form_effects_pullOutSegmentOnClick_speed');
	$set['effects_pullOutSegmentOnClick_size'] = _request('form_effects_pullOutSegmentOnClick_size');
	$set['misc_gradient_enabled'] = _request('form_misc_gradient_enabled');
	$set['misc_gradient_percentage'] = _request('form_misc_gradient_percentage');
	$set['date_modif'] = date('Y-m-d H:i:s');
	$set['type'] = "pie";

	if($id_d3jspie_generateur) {
		sql_updateq('spip_d3jspie_generateur', $set, 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));
	} else {
		sql_insertq('spip_d3jspie_generateur', $set);
	}

	return array('editable' => true, 'message_ok'=>_T('config_info_enregistree'));
}

?>
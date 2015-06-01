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
	$d3jspie_generateur = sql_fetsel('*', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));
	$id_document = sql_getfetsel('id_document', 'spip_documents_liens', 'id_objet=' . intval($id_d3jspie_generateur), '', 'id_document DESC', '1');

	if($d3jspie_generateur && $id_document) {
		foreach ($d3jspie_generateur as $cle => $valeur) {
				$valeurs["form_$cle"] = $valeur;
		}
		if(_request('fichier')) 
			$valeurs["form_donnees"] = _request('fichier');
		else
			$valeurs["id_document"] = $id_document;

	} else {
		$champs = array(
			'form_titre',
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
			'fichier'
		);

		foreach ($champs as $cle => $valeur) {
			$valeurs["$valeur"] = _request($valeur);
		}
	}
	$valeurs['_etapes'] = 8;

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

	if(_request('_etape') == 5) {
		include_spip('inc/joindre_document');
		include_spip('inc/flock');

		$erreurs = array();

		$d3jspie_generateur = sql_fetsel('*', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));
		$id_document = sql_getfetsel('id_document', 'spip_documents_liens', 'id_objet=' . intval($id_d3jspie_generateur), '', 'id_document DESC', '1');

		if($id_document) {
			// TODO: Faire mieux
			return;

		} else {

			// on joint un document deja dans le site
			$files = joindre_trouver_fichier_envoye();

			if (is_string($files))
				$erreurs['form_donnees'] = $files;
			elseif(is_array($files)){
				// erreur si on a pas trouve de fichier
				if (!count($files))
					$erreurs['form_donnees'] = _T('medias:erreur_aucun_fichier');
				else{
					// regarder si on a eu une erreur sur l'upload d'un fichier
					foreach($files as $file){
						if (isset($file['error'])
							AND $test = joindre_upload_error($file['error'])){
								if (is_string($test))
									$erreurs['form_donnees'] = $test;
								else
									$erreurs['form_donnees'] = _T('medias:erreur_aucun_fichier');
						}
					}
				}
			}

			if(!isset($erreurs['form_donnees'])) {
				$tmp_dir = sous_repertoire(_DIR_TMP, 'd3jspie_generateur');
				if($tmp_dir) {
					$move_file = move_uploaded_file($files[0]['tmp_name'], $tmp_dir . "/" . $files[0]['name']);
					if($move_file) 
						set_request('fichier', $tmp_dir . $files[0]['name']);
					else
						$erreurs['form_donnees'] = _T('medias:probleme_creation_fichier');
				} else {
					$erreurs['form_donnees'] = _T('medias:aucun_repertoire');
				}
			}

		}
	}

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
	
	return $erreurs;
}

/**
 * Traitement du formulaire de configuration des d3jspie_generateur
 *
 * @return array
 *     Retours du traitement
**/
function formulaires_editer_d3jspie_generateur_traiter_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){

	$set = array();
	$id_d3jspie_generateur = sql_getfetsel('id_d3jspie_generateur', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));

	$set['id_d3jspie_generateur'] = $id_d3jspie_generateur;
	$set['titre'] = _request('form_titre');
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

	if($id_d3jspie_generateur)
		sql_updateq('spip_d3jspie_generateur', $set, 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));
	else
		$id_d3jspie_generateur = sql_insertq('spip_d3jspie_generateur', $set);

	if($fichier = _request('fichier')) {
		$ajouter_documents = charger_fonction('ajouter_documents', 'action');
		$nouveaux_doc = $ajouter_documents($id_document,array(array('tmp_name'=> $fichier, 'name' => basename($fichier))),'d3jspie_generateur',$id_d3jspie_generateur,'document');
	}

	return array('editable' => true, 'message_ok'=>_T('config_info_enregistree'));
}

?>

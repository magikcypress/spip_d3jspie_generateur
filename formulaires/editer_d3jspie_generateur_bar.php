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
function formulaires_editer_d3jspie_generateur_bar_charger_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){

	$valeurs = array();
	$d3jspie_generateur = sql_allfetsel('*', 'spip_d3jspie_generateur', 'id_d3jspie_generateur=' . intval($id_d3jspie_generateur));

	foreach ($d3jspie_generateur as $value) {
		foreach ($value as $key => $value) {
			$valeurs["form_$key"] = $value;
		}
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
function formulaires_editer_d3jspie_generateur_verifier_bar_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){
	$erreurs = array();

	return $erreurs;
}

/**
 * Traitement du formulaire de configuration des d3jspie_generateur_bar
 *
 * @return array
 *     Retours du traitement
**/
function formulaires_editer_d3jspie_generateur_traiter_bar_dist($id_d3jspie_generateur='new', $objet='', $id_objet='', $retour='', $ajaxload='oui', $options=''){

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

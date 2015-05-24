<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/autoriser');

/**
 * Supprimer définitivement un graph
 * 
 * @param int $id_d3jspie_generateur identifiant numérique du graph
 * @return int|false 0 si réussite, false dans le cas ou le graph n'existe pas
 */
function d3jspie_generateur_supprimer($id_gis){
	$valide = sql_getfetsel('id_d3jspie_generateur','spip_d3jspie_generateur','id_d3jspie_generateur='.intval($id_d3jspie_generateur));
	if($valide && autoriser('supprimer','d3jspie_generateur',$valide)){
		sql_delete("spip_d3jspie_generateur", "id_d3jspie_generateur=".intval($id_d3jspie_generateur));
		sql_delete("spip_d3jspie_generateur", "id_d3jspie_generateur=".intval($id_d3jspie_generateur));
		$id_d3jspie_generateur = 0;
		include_spip('inc/invalideur');
		suivre_invalideur("id='id_d3jspie_generateur/$id_d3jspie_generateur'");
		return $id_d3jspie_generateur;
	}
	return false;
}

?>
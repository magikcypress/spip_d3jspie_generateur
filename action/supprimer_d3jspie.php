<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2014                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined("_ECRIRE_INC_VERSION")) return;

// http://doc.spip.org/@supprimer_document
function action_supprimer_d3jspie_generateur_dist($id_d3jspie_generateur=0) {

	// pipeline('post_edition',
	// 	array(
	// 		'args' => array(
	// 			'operation' => 'supprimer_d3jspie_generateur', // compat v<=2
	// 			'action' => 'supprimer_d3jspie_generateur',
	// 			'table' => 'spip_d3jspie_generateur',
	// 			'id_objet' => $id_d3jspie_generateur
	// 		),
	// 		'data' => null
	// 	)
	// );
	return true;
}

?>

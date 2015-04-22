<?php
/**
 * Utilisations de pipelines par d3jspie_generateur
 *
 * @plugin     d3jspie_generateur
 * @copyright  2015
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\d3jspie_generateur\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Afficher d3jspie_generateur milieu page site
 * @param array $flux
 * @return array
 */
// function d3jspie_generateur_affiche_milieu($flux){


// 	if (trouver_objet_exec($flux['args']['exec'] == "d3jspie_generateur")){

// 		$texte = recuperer_fond(
// 				'prive/squelettes/contenu/d3jspie_generateur'
// 		);
// 		if ($p=strpos($flux['data'],"<!--affiche_milieu-->"))
// 			$flux['data'] = substr_replace($flux['data'],$texte,$p,0);
// 		else
// 			$flux['data'] .= $texte;
// 	}

// 	if (trouver_objet_exec($flux['args']['exec'] == "d3jspie_generateur_edit")){

// 		$texte = recuperer_fond(
// 				'prive/objets/editer/d3jspie_generateur',
// 				array(
// 					'type'=>$type
// 				)
// 		);
// 		$texte = recuperer_fond(
// 				'prive/squelettes/contenu/d3jspie_generateur',
// 				array(
// 					'type'=>$type,
// 					'id_d3jspie_generateur'=>$id_d3jspie_generateur
// 				)
// 		);
// 		if ($p=strpos($flux['data'],"<!--affiche_milieu-->"))
// 			$flux['data'] = substr_replace($flux['data'],$texte,$p,0);
// 		else
// 			$flux['data'] .= $texte;
// 	}

// 	return $flux;
// }


/**
 * Ajoute les css pour d3jspie_generateur chargées dans le privé
 * 
 * @param string $flux Contenu du head HTML concernant les CSS
 * @return string       Contenu du head HTML concernant les CSS
 */
function d3jspie_generateur_header_prive_css($flux) {

	$css = find_in_path('css/d3js_generateur.css');
	$flux .= "<link rel='stylesheet' type='text/css' media='all' href='".direction_css($css)."' />\n";

	return $flux;
}

/**
 * Ajoute les css pour d3jspie_generateur chargées dans le public
 * 
 * @param string $flux Contenu du head HTML concernant les CSS
 * @return string       Contenu du head HTML concernant les CSS
**/
function d3jspie_generateur_insert_head_css($flux) {
	$css = find_in_path('css/d3js_generateur.css');
	$flux .= '<link rel="stylesheet" href="'.direction_css($css).'" type="text/css" media="all" />';

	return $flux;
}

?>
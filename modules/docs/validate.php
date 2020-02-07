<?php
	

	/**
	* @category   Validate
	* @package    default.validate
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/
	
	$validate = new Atom();
	$package = new Import();

	# default value setted
	$defaultRoute = 'comece-com-o-atomo';

	if( $validate->uri(2) ){

		switch( $validate->uri(2) ){

			case "comece-com-o-atomo":
				$dependency["title"] = "Desenvolva com Atomo" . $validate->getConfig('version');
				$dependency["view"] = "getting-started";
				$dependency["page_title"] = "Desenvolva com Atomo" . $validate->getConfig('version');
				
				$css = new Import();
				$dependency["css"] = $css->baseCSS()->build();
				$js = new Import();
				$dependency["js"] = $js->basejS()->build();
			break;

			case "arquitetura":
				$dependency["title"] = "Arquitetura - " . $validate->getConfig('project') . " " .$validate->getConfig('version');
				$dependency["view"] = "sitemap";
				$dependency["page_title"] = "Arquitetura - " . $validate->getConfig('version');
				
				$css = new Import();
				$dependency["css"] = $css->baseCSS()->build();
				$js = new Import();
				$dependency["js"] = $js->basejS()->build();
			break;

			default:
				# redirect to default route
				$validate->location($defaultRoute);
			break;
		}

		# globals data for page
		$GLOBALS["page"] = $dependency;

	}else{
		# redirect to default route
		$validate->location($defaultRoute);
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Script-Type" content="text/javascript" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="{$site_meta_desc}" />
<meta name="keywords" content="{$site_meta_key}" />
<meta name="author" content="{$site_author}" />
<meta name="language" content="Indonesia" />
<meta name="revisit-after" content="7" />
<meta name="webcrawlers" content="all" />
<meta name="rating" content="general" />
<meta name="spiders" content="all" />

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>{$site_title}</title>
<link rel="shortcut icon" type="image/x-icon" href="{$THEME_DIR}image/favicon.ico" />

<!-- jQuery -->
<script type="text/javascript" src="{$THEME_DIR}js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="{$THEME_DIR}js/jquery-migrate-1.2.1.js"></script>

<!-- Form Validation Engine Start -->
<link rel="stylesheet" type="text/css" href="{$THEME_DIR}js/formValidator/css/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="{$THEME_DIR}js/formValidator/css/template.css" />
<script type="text/javascript" src="{$THEME_DIR}js/formValidator/js/languages/jquery.validationEngine-id.js"></script>
<script type="text/javascript" src="{$THEME_DIR}js/formValidator/js/jquery.validationEngine.js"></script>

{literal}
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#formValidation").validationEngine();
    });            
</script>
{/literal}

<!-- Form Validation Engine End -->

<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="{$THEME_DIR}css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="{$THEME_DIR}css/slideshow.css" media="screen" />
<link rel="stylesheet" type="text/css" href="{$THEME_DIR}css/carousel.css" media="screen" />
<link rel="stylesheet" type="text/css" href="{$THEME_DIR}js/colorbox/colorbox.css" media="screen" />
<!-- CSS Part End-->
</head>
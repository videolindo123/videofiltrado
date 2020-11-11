<?php
session_start();
header('Cache-control: private'); // IE 6 FIX

// Si ya existe una variable HTTP del lenguaje
if(isSet($_GET['lang']))
{
	// La Obtiene y sigue adelante
	$lang = $_GET['lang'];

	// Registrar la session.
	$_SESSION['lang'] = $lang;

}
// En caso contrario
else
{
	// Creo los arreglos de los paises que tienen el lenguaje X como oficial
	$langEs = array("Mexico", "Spain", "Colombia", "Argentina", "Peru", "Venezuela", "Chile", "Ecuador", "Guatemala", "Cuba", "Bolivia", "Dominican Republic", "Honduras", "Paraguay", "El Salvador", "Nicaragua", "Costa Rica", "Puerto Rico", "Panama", "Uruguay", "Equatorial Guinea");
	$langDe = array("Germany", "Austria", "Switzerland", "Luxembourg", "Liechtenstein");
	$langFr = array("France", "Monaco", "Benin", "Burkina Faso", "Congo The Democratic Republic of The", "Congo", "Gabon", "Guinea", "Mali", "Niger", "Reunion", "Togo", "Martinique", "Saint Martin", "French Polynesia", "New Caledonia", "Wallis and Futuna", "French Guiana");
	$langIt = array("Italy", "San Marino", "Holy See (VATICAN City State)");
	$langPt = array("Brazil", "Mozambique", "Angola", "Portugal", "Guinea-Bissau", "Timor-leste", "Macau", "Cape Verde", "Sao Tome and Principe");
	$langGa = array("Ireland");
	$langNl = array("Netherlands", "Belgium", "Suriname");
	$langPl = array("Poland");
	$langTh = array("Thailand");
	$langRu = array("Russian Federation", "Kazakhstan", "Belarus", "Kyrgyzstan", "Tajikistan");
	$langSv = array("Sweden", "Finland");
	$langEl = array("Greece", "Cyprus");
	$langAr = array("Qatar");
	
	
	// Busco el pais de origen con la IP
	include("geoiploc.php");
	$ip = $_SERVER["REMOTE_ADDR"];
	$pais = getCountryFromIP($ip, "NamE");
	
	// Comparo el pais con los arreglos
	if (in_array($pais, $langEs)) 
	{
		// Si es encontrado establece la variable de lenguaje
		$lang = 'es';
	}
	elseif (in_array($pais, $langDe)) {
		$lang = 'de';
	}
	elseif (in_array($pais, $langAr)) {
		$lang = 'ar';
	}
	elseif (in_array($pais, $langFr)) {
		$lang = 'fr';
	}
	elseif (in_array($pais, $langIt)) {
		$lang = 'it';
	}
	elseif (in_array($pais, $langPt)) {
		$lang = 'pt';
	}
	elseif (in_array($pais, $langGa)) {
		$lang = 'ga';
	}
	elseif (in_array($pais, $langNl)) {
		$lang = 'nl';
	}
	elseif (in_array($pais, $langPl)) {
		$lang = 'pl';
	}
	elseif (in_array($pais, $langTh)) {
		$lang = 'th';
	}
	elseif (in_array($pais, $langRu)) {
		$lang = 'ru';
	}
	elseif (in_array($pais, $langSv)) {
		$lang = 'sv';
	}
	elseif (in_array($pais, $langEl)) {
		$lang = 'el';
	}
	else{
		// En caso de no encontrar ninguna utiliza el idioma por defecto
		$lang = 'en';
	}

	// Si existe la variable HTTP key
	if(isSet($_GET['key'])) 
	{
		// La Obtiene y sigue adelante
		$key = $_GET['key'];
	}
	// en caso contrario
	else 
	{
		// Creo un Key
		$longitud = '200';
		$key = '';
		$keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$max = strlen($keys) - 1;
		for($i=0; $i < $longitud; $i++)
		{
			// echo $key;
			$key .= $keys{mt_rand(0,$max)};
		}
		
	}

	// Redirecciono a la  misma pagina con el lenguaje correcto y un key
	header('Location: '. $URL . '?lang=' . $lang . '&key=' . $key);
}

// Asigno el lenguaje previamente selecionado
switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;

  case 'de':
  $lang_file = 'lang.de.php';
  break;
  
   case 'ar':
  $lang_file = 'lang.ar.php';
  break;

  case 'es':
  $lang_file = 'lang.es.php';
  break;

  case 'fr':
  $lang_file = 'lang.fr.php';
  break;

  case 'it':
  $lang_file = 'lang.it.php';
  break;

  case 'pt':
  $lang_file = 'lang.pt.php';
  break;

  case 'sv':
  $lang_file = 'lang.sv.php';
  break;

  case 'th':
  $lang_file = 'lang.th.php';
  break;

  case 'el':
  $lang_file = 'lang.el.php';
  break;

  case 'ga':
  $lang_file = 'lang.ga.php';
  break;

  case 'nl':
  $lang_file = 'lang.nl.php';
  break;

  case 'pl':
  $lang_file = 'lang.pl.php';
  break;

  case 'ru':
  $lang_file = 'lang.ru.php';
  break;

  default:
  $lang_file = 'lang.en.php';
}

include_once 'lib/lang/'.$lang_file;
?>
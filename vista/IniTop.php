<?php 
/*

   else
   {$url = "http://".$SERVER_NAME.$PHP_SELF;}
   $hoy = date("F j, Y, g:i a");
   mail("admin@proyectonst.cl", "Se ha detectado un bot de Google en http://$SERVER_NAME",
   "$hoy - Google ha indexado la página $url.\n");
} 

//YAHOO
if(eregi("slurp",$_SERVER['HTTP_USER_AGENT']))
{
   if ($QUERY_STRING != "")
   {$url = "http://".$SERVER_NAME.$PHP_SELF.'?'.$QUERY_STRING;}
   else
   {$url = "http://".$SERVER_NAME.$PHP_SELF;}
   $hoy = date("F j, Y, g:i a");
   mail("admin@proyectonst.cl", "Se ha detectado un bot de YAHOO en http://$SERVER_NAME",
   "$hoy - YAHOO ha indexado la página $url.\n");
} 

//ALTAVISTA
if(eregi("scooter",$_SERVER['HTTP_USER_AGENT']))
{
   if ($QUERY_STRING != "")
   {$url = "http://".$SERVER_NAME.$PHP_SELF.'?'.$QUERY_STRING;}
   else
   {$url = "http://".$SERVER_NAME.$PHP_SELF;}
   $hoy = date("F j, Y, g:i a");
   mail("admin@proyectonst.cl", "Se ha detectado un bot de ALTAVISTA en http://$SERVER_NAME",
   "$hoy - ALTAVISTA ha indexado la página $url.\n");
} 

*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<base href="http://localhost/pnst/" />


<title>Bienvenid@ al Proyecto Educativo NST: Medición de la Comprensión Lectora </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="CLP, C.L.P., software medición comprensión lectora, comprensión, comprensión lectora, programación neuro linguistica, comprensión linguistica progresiva, medir comprensión lectora, lectora, medición comprensión lectora, gnu/gpl, software libre">
<meta name="description" content="Proyecto Educativo NST es casi con seguridad la mejor aplicación para medir de forma rápida y fácil la comprensión lectora en alumnos de 1° a 4° año básico. Es una aplicación de fácil uso y entendimiento. Entrega gráficos claros mostrando los resultados de forma certera y veraz.">

<!--  CSS -->
<link type="text/css" rel="stylesheet" href="css/general.css" />
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />

<script type="text/javascript">
<!--
var NavegadorDetect = {
	init: function () {
		this.Navegador = this.searchString(this.dataNavegador) || "Navegador Desconocido";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "Versión desconocida";
		this.OS = this.searchString(this.dataOS) || "OS desconocido";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataNavegador: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
NavegadorDetect.init();

// -->
</script>
</head>
<body>

<div id="head-container"> <div id="header"> <h1>Proyecto Educativo NST</h1> </div> </div>

<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">

<?php
class ExportacionControlador extends ControladorBase
{
    function index(){
	    $this->view->show('login.php');
    }

    public function expDoc(){
    if(isset($_POST['Exportar']) && !empty($_POST['Exportar'])){
    header("Content-type: application/vnd.ms-excel; name='excel'");
    header("Content-Disposition: filename=InformePuntajesWord.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    $documento = $_POST['EXportar'];
    $documento = utf8_decode($documento);
    echo $documento;
    }

    }


    public function exportar(){
    
    include("clases/html_to_doc.inc.php");
	$htmltodoc= new HTML_TO_DOC();
	//$htmltodoc->createDoc("reference1.html","test");
	$htmltodoc->createDocFromURL('http://www.proyectonst.cl/nst/?controlador=Admin&accion=Sistema',"test",true);
    
    
    }
}		

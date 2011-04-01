<?php
class graficar {
    
    function librerias(){
   //Libreria que se requieren
    require_once ('jpgraph/jpgraph.php');
    require_once ('jpgraph/jpgraph_line.php');
    require_once ('jpgraph/jpgraph_bar.php');
    require_once ('jpgraph/jpgraph_pie.php');
    require_once ('jpgraph/jpgraph_pie3d.php');
    require_once ('jpgraph/jpgraph_date.php');
    require_once ('jpgraph/jpgraph_utils.inc.php');



}

function graficar_puntajeZ($puntaje_z){
    $this->librerias();

    while($datos = $puntaje_z->fetch()){    $ydata[] = $datos['0'];	}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Informe Visual Puntaje Z");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot =new LinePlot($ydata);
    $lineplot->SetFillColor('blue@0.5');
         
    $graph->Add($lineplot);
    return $graph->Stroke();
}

function graficar_puntajeP($puntaje_p){
    $this->librerias();

    while($datos = $puntaje_p->fetch()){    $ydata[] = $datos['0'];	}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Informe Visual Percentil");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $barplot =new BarPlot($ydata);
             
    $graph->Add($barplot);
    $graph->Stroke();
}

function graficar_puntajeT($puntaje_t){
    $this->librerias();

    while($datos = $puntaje_t->fetch()){    $ydata[] = $datos['0'];	}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Informe Visual Puntaje T");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T  )');
    
    $lineplot = new LinePlot($ydata);
    $lineplot->SetFillColor('orange@0.5');
             
    $graph->Add($lineplot);
    $graph->Stroke();
    }

/*
 *	    GRAFICOS DE TORTA !!!!!!!!!!!!!!!!!!!!
 *	    Líneas = 77 - 1852
  */ 
function grafico_1A10($puntaje_1A10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4) Niño...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1A11($puntaje_1A11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("8) Sol...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A12($puntaje_1A12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1) Ala...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A13($puntaje_1A13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6) Auto...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A14($puntaje_1A14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';
 
    while($datos = $puntaje_1A14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0) Mamá...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_1A15($puntaje_1A15){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A15->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4) Niño...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A16($puntaje_1A16){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A16->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5) Pato...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A17($puntaje_1A17){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1A17->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6) Auto...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Mamá","2)Ala","3)Casa","4)Oso", "5)Niño", "6)Pato", "7)Auto", "8)Sol");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A20($puntaje_1A20){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A20->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Este es el hueso de Rayo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A21($puntaje_1A21){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A21->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Rayo mira un pescado.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A22($puntaje_1A22){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A22->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. El collar de Rayo es chico.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A23($puntaje_1A23){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A23->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Rayo arranca de otro perro.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A24($puntaje_1A24){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A24->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Rayo está debajo de un árbol.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A25($puntaje_1A25){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A25->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Rayo tiene una pelota.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A26($puntaje_1A26){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A26->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Rayo está en la casucha.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A27($puntaje_1A27){
    $this->librerias();

    $cont9 = '0';
    $cont10 = '0';
    $cont11 = '0';
    $cont12 = '0';
    $cont13 = '0';
    $cont14 = '0';
    $cont15 = '0';
    $cont16 = '0';

    while($datos = $puntaje_1A27->fetch()){    
	
	if($datos['0'] == '9') $cont9++;
	if($datos['0'] == '10') $cont10++;
	if($datos['0'] == '11') $cont11++;
	if($datos['0'] == '12') $cont12++;
	if($datos['0'] == '13') $cont13++;
	if($datos['0'] == '14') $cont14++;
	if($datos['0'] == '15') $cont15++;
	if($datos['0'] == '16') $cont16++;
    }
    $datos[] = $cont9;
    $datos[] = $cont10;
    $datos[] = $cont11;
    $datos[] = $cont12;
    $datos[] = $cont13;
    $datos[] = $cont14;
    $datos[] = $cont15;
    $datos[] = $cont16;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. El pajarito come en el plato de Rayo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A30($puntaje_1A30){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A30->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Están volando muy alto.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A31($puntaje_1A31){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A31->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Caminan con ruedas.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_1A32($puntaje_1A32){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A32->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Todos saltan juntos.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A33($puntaje_1A33){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A33->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Cose con mucho afán.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A34($puntaje_1A34){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A34->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Rema muy feliz.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A35($puntaje_1A35){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A35->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Caminan muy apurados.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A36($puntaje_1A36){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A36->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Está barriendo con cuidado.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A37($puntaje_1A37){
    $this->librerias();

    $cont17 = '0';
    $cont18 = '0';
    $cont19 = '0';
    $cont20 = '0';
    $cont21 = '0';
    $cont22 = '0';
    $cont23 = '0';
    $cont24 = '0';

    while($datos = $puntaje_1A37->fetch()){    
	
	if($datos['0'] == '17') $cont17++;
	if($datos['0'] == '18') $cont18++;
	if($datos['0'] == '19') $cont19++;
	if($datos['0'] == '20') $cont20++;
	if($datos['0'] == '21') $cont21++;
	if($datos['0'] == '22') $cont22++;
	if($datos['0'] == '23') $cont23++;
	if($datos['0'] == '24') $cont24++;
    }
    $datos[] = $cont17;
    $datos[] = $cont18;
    $datos[] = $cont19;
    $datos[] = $cont20;
    $datos[] = $cont21;
    $datos[] = $cont22;
    $datos[] = $cont23;
    $datos[] = $cont24;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Escriben con empeño.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A40($puntaje_1A40){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A40->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Hay tres ovillos en el canasto.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A41($puntaje_1A41){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A41->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Luisa está cosiendo a máquina.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A42($puntaje_1A42){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A42->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Pascual está jugando con lana. ");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A43($puntaje_1A43){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A43->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set(" 3. Luisa está tejiendo. ");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A44($puntaje_1A44){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A44->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Luisa está llorando.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A45($puntaje_1A45){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A45->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Luisa tiene trenzas. ");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A46($puntaje_1A46){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A46->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Pascual está cazando ratones.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1A47($puntaje_1A47){
    $this->librerias();

    $contSi = '0';
    $contNo = '0';
    $cont19 = '0';
       
    while($datos = $puntaje_1A47->fetch()){    
	
	if($datos['0'] == '1') $contSi++;
	if($datos['0'] == '2') $contNo++;
    }
    $datos[] = $contSi;
    $datos[] = $contNo;
    
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Luisa está de manga corta. ");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

/* 
 *	    FIN GRAFICOS DE TORTA 1A
 *	    Líneas = 77 - 1852
 *
 */ 

function grafico_1B10($puntaje_1B10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4) Gallina...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B11($puntaje_1B11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0) Velador...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B12($puntaje_1B12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5) Caracol...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B13($puntaje_1B13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1) Bombero...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B14($puntaje_1B14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';
 
    while($datos = $puntaje_1B14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7) Picaflor...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_1B15($puntaje_1B15){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B15->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2) Bandera...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B16($puntaje_1B16){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B16->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6) Coliflor...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B17($puntaje_1B17){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B17->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3) Galleta...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0)Velador","1)Bombero","2)Bandera","3)Galleta", "4)Gallina", "5)Caracol", "6)Coliflor", "7)Picaflor");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B20($puntaje_1B20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Los niños juegan con una pelota.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B21($puntaje_1B21){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0) Velador...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B22($puntaje_1B22){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5) Caracol...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B23($puntaje_1B23){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1) Bombero...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B24($puntaje_1B24){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';
 
    while($datos = $puntaje_1B24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7) Picaflor...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_1B25($puntaje_1B25){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B25->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2) Bandera...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B26($puntaje_1B26){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B26->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6) Coliflor...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B27($puntaje_1B27){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_1B27->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3) Galleta...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_1B30($puntaje_1B30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B30->fetch()){    
	
	if($datos['0'] == '0') $cont1++;
	if($datos['0'] == '1') $cont2++;
	if($datos['0'] == '2') $cont3++;
	if($datos['0'] == '3') $cont4++;
	if($datos['0'] == '4') $cont5++;
	if($datos['0'] == '5') $cont6++;
	if($datos['0'] == '6') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Otro caballo y Moro están arando.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B31($puntaje_1B31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B31->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. A Moro lo amarraron a un poste.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B32($puntaje_1B32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Moro come pasto.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B33($puntaje_1B33){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. A Moro le pusieron montura.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B34($puntaje_1B34){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B34->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Moro tiro una carreta.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B35($puntaje_1B35){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B35->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Un niño está montando a Moro.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B36($puntaje_1B36){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B36->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Moro galopa con otro caballo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B40($puntaje_1B40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B40->fetch()){    
	
	if($datos['0'] == '0') $cont1++;
	if($datos['0'] == '1') $cont2++;
	if($datos['0'] == '2') $cont3++;
	if($datos['0'] == '3') $cont4++;
	if($datos['0'] == '4') $cont5++;
	if($datos['0'] == '5') $cont6++;
	if($datos['0'] == '6') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. A Luisa le gusta comer.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B41($puntaje_1B41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Luisa está revolviendo algo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B42($puntaje_1B42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Luisa se está bañando.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B43($puntaje_1B43){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Luisa duerme mucho.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B44($puntaje_1B44){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Luisa salta con sus amigas.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B45($puntaje_1B45){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B45->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Luisa riega todos los días.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_1B46($puntaje_1B46){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    
    while($datos = $puntaje_1B46->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Están vistiendo a Luisa.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)", "5)", "6)", "7)", "8)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function graficoZ0($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z 1A - 1B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 1A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 1B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoZ1($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z 1B - 2A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 1B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 2A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoZ2($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z 2A - 2B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 2A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 2B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoZ3($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z 2B - 3A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 2B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 3A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoZ4($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z 3A - 3B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 3A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 3B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoZ5($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z 3B - 4A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 3B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 4A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoZ6($datos2, $datos1){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje Z  4A - 4B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje Z )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje Z - 4A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('orange@0.5');
    $lineplot2->SetLegend("Puntaje Z - 4B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    
    return $graph->Stroke();
}

function graficoT0($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 1A - 1B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('brown@0.5');
    $lineplot->SetLegend("Puntaje T  - 1A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Puntaje T - 1B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoT1($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 1B - 2A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('blue@0.5');
    $lineplot->SetLegend("Puntaje T  - 1B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.3');
    $lineplot2->SetLegend("Puntaje T - 2A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoT2($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 2A - 2B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('blue@0.5');
    $lineplot->SetLegend("Puntaje T  - 2A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.3');
    $lineplot2->SetLegend("Puntaje T - 2B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}


function graficoT3($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 2B - 3A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('blue@0.5');
    $lineplot->SetLegend("Puntaje T  - 2B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.3');
    $lineplot2->SetLegend("Puntaje T - 3A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoT4($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 3A - 3B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('blue@0.5');
    $lineplot->SetLegend("Puntaje T  - 3A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.3');
    $lineplot2->SetLegend("Puntaje T - 3B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoT5($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 3B - 4A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('blue@0.5');
    $lineplot->SetLegend("Puntaje T  - 3B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.3');
    $lineplot2->SetLegend("Puntaje T - 4A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoT6($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje T 4A - 4B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje T )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('blue@0.5');
    $lineplot->SetLegend("Puntaje T  - 4A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.3');
    $lineplot2->SetLegend("Puntaje T - 4B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}



function graficoP0($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 1A - 1B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 1A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 1B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoP1($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 1B - 2A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 1B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 2A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoP2($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 2A - 2B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 2A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 2B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}


function graficoP3($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 2B - 3A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 2B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 3A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoP4($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 3A - 3B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 3A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 3B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoP5($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 3B - 4A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 3B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 4A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoP6($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Percentil 4A - 4B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Percentil )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Percentil - 4A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('blue@0.5');
    $lineplot2->SetLegend("Percentil - 4B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}


function graficoPT0($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  1A - 1B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje - 1A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 1B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoPT1($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  1B - 2A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje  - 1B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 2A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoPT2($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  2A - 2B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje  - 2A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 2B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoPT3($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  2B - 3A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje  - 2B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 3A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoPT4($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  3A - 3B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje  - 3A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 3B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoPT5($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  3B - 4A");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje  - 3B");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 4A");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}

function graficoPT6($datos1, $datos2){
    $this->librerias();

    while($datos = $datos1->fetch()){    $datay[] = $datos['0'];}
    while($datos = $datos2->fetch()){    $datay2[] = $datos['0'];}

    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Variación Visual Puntaje  4A - 4B");
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Puntaje  - 4A");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Puntaje - 4B");

         
    $graph->Add($lineplot);
    $graph->Add($lineplot2);    
    return $graph->Stroke();
}




    /****************************************************************************
     *										*
     *			    = GRAFICOS 2A =					*  
     *										* 
    *****************************************************************************/

function grafico_2A10($puntaje_2A10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2A10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. El equipo Verde");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_2A11($puntaje_2A11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2A11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. El equipo Celeste");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A12($puntaje_2A12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2A12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. El equipo Azul");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A13($puntaje_2A13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_2A13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. El equipo Amarillo");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A14($puntaje_2A14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
 
    while($datos = $puntaje_2A14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. El equipo Blanco");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_2A15($puntaje_2A15){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2A15->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. El equipo Lila");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A16($puntaje_2A16){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2A16->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. El equipo Naranja");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A17($puntaje_2A17){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2A17->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. El equipo Rojo");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)Ganaron","2)Perdieron","3)Empataron","4)No Jugaron");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A20($puntaje_2A20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. A mi mamá le gusta mucho ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A21($puntaje_2A21){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Hoy día estamos jugando ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A22($puntaje_2A22){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. A mi hermana le gusta tocar la ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A23($puntaje_2A23){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. El jardinero trabaja con una ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A24($puntaje_2A24){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Mi papá lee siempre los ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A25($puntaje_2A25){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A25->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Es lindo jugar con un...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A26($puntaje_2A26){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A26->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. A la comida le ponemos...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}
function grafico_2A27($puntaje_2A27){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A27->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Hay barcos que navegan con...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2A30($puntaje_2A30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A30->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.Usamos los lápices para...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A31($puntaje_2A31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A231->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.Los bomberos apagan...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2A32($puntaje_2A32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.Los doctores sanan a los...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A33($puntaje_2A33){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.Las vacas nos dan...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A34($puntaje_2A34){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A34->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4.Los trenes sirven para...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A35($puntaje_2A35){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A35->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5.Sacamos muchas frutas de los...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A36($puntaje_2A36){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A36->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6.Les ponemos candados a las...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A37($puntaje_2A37){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_2A37->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7.Los payasos trabajan en los...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A40($puntaje_2A40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A40->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Por ahí saltó el gato...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A41($puntaje_2A41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Algunas aparecieron en el cielo...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2A42($puntaje_2A42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Empezaron a cantar...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A43($puntaje_2A43){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Estaba algo obscura...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A44($puntaje_2A44){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Mandó a sus hijos a la cama...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A45($puntaje_2A45){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A45->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Empezó a soplar con suavidad...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A46($puntaje_2A46){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A46->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Saltó al patio por la ventana...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2A47($puntaje_2A47){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2A47->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Ya había llegado...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

    /****************************************************************************
     *										*
     *			    = GRAFICOS 2B =					*  
     *										* 
    *****************************************************************************/

function grafico_2B10($puntaje_2B10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2B10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Salieron a pasear.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_2B11($puntaje_2B11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2B11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Llevó las cosas de cocina.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B12($puntaje_2B12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2B12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Trajo ropa de abrigo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B13($puntaje_2B13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_2B13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Hizo de cocinero.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B14($puntaje_2B14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
 
    while($datos = $puntaje_2B14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Llevaban mochila.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_2B15($puntaje_2B15){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2B15->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Se ocuparon del fuego.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B16($puntaje_2B16){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_2B16->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Lavaron los platos.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2B20($puntaje_2B20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Los botes tienen ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B21($puntaje_2B21){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Las escobas sirven para...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B22($puntaje_2B22){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. En los ríos hay mucha ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B23($puntaje_2B23){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. En la cabeza tenemos dos ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B24($puntaje_2B24){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Ese niño fue abrir la ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B25($puntaje_2B25){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B25->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Las bicicletas tienen dos ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B26($puntaje_2B26){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B26->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. En mi mano tengo cinco ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}
function grafico_2B27($puntaje_2B27){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B27->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Hay flores en los ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2B30($puntaje_2B30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B30->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("Yo sé que los árboles tienen...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B31($puntaje_2B31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B31->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Las casas tienen ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2B32($puntaje_2B32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Algunas armas de los indios eran ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B33($puntaje_2B33){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Los carpinteros usan...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B34($puntaje_2B34){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B34->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Para comer usamos...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B35($puntaje_2B35){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B35->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Los alimentos se pueden cocinar en...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B36($puntaje_2B36){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B36->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Para coser un género se necesitan ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B37($puntaje_2B37){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B37->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Para limpiar una casa se usan ...");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B40($puntaje_2B40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B40->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Casa.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B41($puntaje_2B41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Colchón.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_2B42($puntaje_2B42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Elefantes.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B43($puntaje_2B43){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Niño.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B44($puntaje_2B44){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Persianas.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B45($puntaje_2B45){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B45->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Ventana.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B46($puntaje_2B46){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B46->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Vidrios.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_2B47($puntaje_2B47){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_2B47->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Colmillos.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}
    
    /****************************************************************************
     *										*
     *			    = GRAFICOS 3A =					*  
     *										* 
    *****************************************************************************/

function grafico_3A10($puntaje_3A10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3A10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Salieron a pasear.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_3A11($puntaje_3A11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3A11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Llevó las cosas de cocina.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A12($puntaje_3A12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3A12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Trajo ropa de abrigo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A13($puntaje_3A13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_3A13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Hizo de cocinero.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A14($puntaje_3A14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
 
    while($datos = $puntaje_3A14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Llevaban mochila.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_3A15($puntaje_3A15){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3A15->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Se ocuparon del fuego.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A16($puntaje_3A16){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3A16->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Lavaron los platos.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_3A20($puntaje_3A20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';


    while($datos = $puntaje_3A20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Los niños fueron solos a la playa");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A21($puntaje_3A21){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3A21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. A la playa fue una sola familia.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A22($puntaje_3A22){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3A22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Daban ganas de bañarse.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A23($puntaje_3A23){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3A23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Los papás descansaron y jugaron.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A24($puntaje_3A24){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3A24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Las mamás estuvieron muy calladas.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A25($puntaje_3A25){
    $this->librerias();

  $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3A25->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. A algunos el paseo no les gustó.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("SI","NO");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_3A30($puntaje_3A30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_3A30->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- La tía no cesaba de hacerle preguntas a Tom.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A31($puntaje_3A31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_3A31->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- La tía no estaba satisfecha con lo que veía.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_3A32($puntaje_3A32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_3A32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("-Tom aprovecha cualquiera oportunidad para escaparse.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A33($puntaje_3A33){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_3A33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- La tía trataba a cada rato de sorprender a Tom.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A40($puntaje_3A40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A40->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. casa");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A41($puntaje_3A41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Colchón.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_3A42($puntaje_3A42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Elefantes.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A43($puntaje_3A43){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Niño.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A44($puntaje_3A44){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Persianas.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A45($puntaje_3A45){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A45->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. Ventana.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A46($puntaje_3A46){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A46->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Vidrios.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3A47($puntaje_3A47){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3A47->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. Colmillos.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}
    
    /****************************************************************************
     *										*
     *			    = GRAFICOS 3B =					*  
     *										* 
    *****************************************************************************/

function grafico_3B10($puntaje_3B10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3B10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. El equipo Verde.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_3B11($puntaje_3B11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3B11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. El equipo Celeste");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B12($puntaje_3B12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3B12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. El equipo Azul");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B13($puntaje_3B13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_3B13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. El equipo Amarillo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B14($puntaje_3B14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
 
    while($datos = $puntaje_3B14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. El equipo Blanco");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}

function grafico_3B15($puntaje_3B15){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3B15->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. El equipo Lila.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B16($puntaje_3B16){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3B16->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. El equipo Naranja.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B17($puntaje_3B17){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_3B17->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7. El equipo Rojo.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B20($puntaje_3B20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';


    while($datos = $puntaje_3B20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.Leña seca (solución para el problema del humo)");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B21($puntaje_3B21){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3B21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1. Leña verde.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B22($puntaje_3B22){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3B22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. Olor a comida.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B23($puntaje_3B23){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3B23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Ollas sin tapa.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B24($puntaje_3B24){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';

    while($datos = $puntaje_3B24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Tapas para las ollas.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B30($puntaje_3B30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_3B30->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- La tía no estaba satisfecha con lo que veía.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B31($puntaje_3B31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_3B31->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- La tía trataba a cada rato de sorprender a Tom.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_3B32($puntaje_3B32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_3B32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- La tía no cesaba de hacerle preguntas a Tom.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B33($puntaje_3B33){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_3B33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("- Sid, el hermanastro de Tom, jamás alteraba los nervios de la tía.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B40($puntaje_3B40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B40->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0. Las estrellas");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B41($puntaje_3B41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("(1. El gato");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_3B42($puntaje_3B42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2. La noche");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B43($puntaje_3B43){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;



    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3. Los grillos");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B44($puntaje_3B44){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. La pieza.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B45($puntaje_3B45){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B45->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5. La mamá.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B46($puntaje_3B46){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B46->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6. Por la ventana.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_3B47($puntaje_3B47){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';


    while($datos = $puntaje_3B47->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
	if($datos['0'] == '5') $cont5++;
	if($datos['0'] == '6') $cont6++;
	if($datos['0'] == '7') $cont7++;
	if($datos['0'] == '8') $cont8++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;
    $datos[] = $cont5;
    $datos[] = $cont6;
    $datos[] = $cont7;
    $datos[] = $cont8;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7.  El viento.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("0.","1.","2.","3.", "4.", "5.", "6.", "7.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}
    
    /****************************************************************************
     *										*
     *			    = GRAFICOS 4A =					*  
     *										* 
    *****************************************************************************/

function grafico_4A10($puntaje_4A10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.El pinito quería transformarse en:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_4A11($puntaje_4A11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.El pinito está descontento porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A12($puntaje_4A12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.Al pinito terminaron por no gustarle las hojas de boldo porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A13($puntaje_4A13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_4A13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.El pinito se dio cuenta que no era bueno para él tener hojas de vidrio porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A14($puntaje_4A14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
 
    while($datos = $puntaje_4A14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4.El que se porta como si fuera una persona humana es el:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}


function grafico_4A20($puntaje_4A20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;


    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.De acuerdo con la lectura, la siguiente era la opinión de uno de los hermanos:)");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A21($puntaje_4A21){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.De acuerdo a lo que dice Pablo, las estrellas son cuerpos espaciales.");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A22($puntaje_4A22){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.Pablo dice que los gases que hay en las estrellas se caracterizan por ser:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A23($puntaje_4A23){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4.Según Pablo, las estrellas les proporcionan a otros astros:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A24($puntaje_4A24){
    $this->librerias();
  
    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5.Los planetas se diferencian de las estrellas porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4A25($puntaje_4A25){
    $this->librerias();
  
    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A25->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6.Un planeta es un cuerpo que:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4A26($puntaje_4A26){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4A26->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7.Como resultado de la conversación con su hermano, Rodrigo de­cidió que cuando fuera grande se iría a vivir a:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4A30($puntaje_4A30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_4A30->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.La primera vez que el vigía vio la ballena, el bote estaba:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A31($puntaje_4A31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4A31->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.La ballena del relato tenía:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4A32($puntaje_4A32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4A32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.Los hechos que se cuentan en 'La Ballena y el Vigía' pasaron:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A33($puntaje_4A33){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_4A33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.El viaje realizado por los tripulantes del barco ballenero fue:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A40($puntaje_4A40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_4A40->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.Ancla");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A41($puntaje_4A41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4A41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
 
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.Arpón");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4A42($puntaje_4A42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4A42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.Arponero");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A43($puntaje_4A43){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4A43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.Megáfono");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4A44($puntaje_4A44){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4A44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Popa");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

    /****************************************************************************
     *										*
     *			    = GRAFICOS 4B =					*  
     *										* 
    *****************************************************************************/

function grafico_4B10($puntaje_4B10){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B10->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.El pinito quería transformarse en:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    return $graph->Stroke();     
}

function grafico_4B11($puntaje_4B11){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B11->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.El pinito está descontento porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B12($puntaje_4B12){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B12->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }

    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.Al pinito terminaron por no gustarle las hojas de boldo porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B13($puntaje_4B13){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
    $cont5 = '0';
    $cont6 = '0';
    $cont7 = '0';
    $cont8 = '0';

    while($datos = $puntaje_4B13->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.El pinito se dio cuenta que no era bueno para él tener hojas de vidrio porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B14($puntaje_4B14){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';
 
    while($datos = $puntaje_4B14->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4.El que se porta como si fuera una persona humana es el:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)","2)","3)","4)");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();  
   
}


function grafico_4B20($puntaje_4B20){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B20->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;


    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.De acuerdo con la lectura, la siguiente era la opinión de uno de los hermanos:)");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B21($puntaje_4B21){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B21->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.La madre del hipopótamo joven le enseña a caminar detrás de ella golpeándolo con su:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B22($puntaje_4B22){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B22->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.La madre hace caminar al pequeño hipopótamo detrás de ella para:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B23($puntaje_4B23){
    $this->librerias();


    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B23->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.Los seres que aprenden gracias a las enseñanzas de sus madres son todos los:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B24($puntaje_4B24){
    $this->librerias();
  
    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B24->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4.Los mamíferos son animales que se diferencian de los otros porque sus crías:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4B25($puntaje_4B25){
    $this->librerias();
  
    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B25->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("5.Una de las cosas importantes que los mamíferos tienen que aprender de sus madres es:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4B26($puntaje_4B26){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B26->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("6.Los mamíferos recién nacidos están listos para empezar a aprender cuando:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4B27($puntaje_4B27){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';
    $cont4 = '0';

    while($datos = $puntaje_4B27->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
	if($datos['0'] == '4') $cont4++;


    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
    $datos[] = $cont4;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("7.El modo de aprender de las crías de los mamíferos es:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1)p","2)c", "3)s");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}



function grafico_4B30($puntaje_4B30){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_4B30->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;


    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.La primera vez que el vigía vio la ballena, el bote estaba:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B31($puntaje_4B31){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4B31->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.Los hechos que cuentan en 'La Ballena y el Vigía' pasaron:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4B32($puntaje_4B32){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4B32->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.El viaje realizado por los tripulantes del barco ballenero fue:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B33($puntaje_4B33){
    $this->librerias();

   $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_4B33->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.La segunda vez, la ballena escapó porque:");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1.","2.","3.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B40($puntaje_4B40){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';


    while($datos = $puntaje_4B40->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;

    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("0.Ancla");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B41($puntaje_4B41){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4B41->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;
 
    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("1.Proa");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function grafico_4B42($puntaje_4B42){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4B42->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("2.Remeros");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B43($puntaje_4B43){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4B43->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("3.Remos");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}

function grafico_4B44($puntaje_4B44){
    $this->librerias();

    $cont1 = '0';
    $cont2 = '0';
    $cont3 = '0';

    while($datos = $puntaje_4B44->fetch()){    
	
	if($datos['0'] == '1') $cont1++;
	if($datos['0'] == '2') $cont2++;
	if($datos['0'] == '3') $cont3++;
    }
    $datos[] = $cont1;
    $datos[] = $cont2;
    $datos[] = $cont3;

    $graph = new PieGraph(450,400,"auto");
    $graph->img->SetAntiAliasing();
    $graph->SetMarginColor('gray');
    //$graph->SetShadow();

    // Setup margin and titles
    $graph->title->Set("4. Timonel");

    $p1 = new PiePlot3D($datos);
    $p1->SetSize(0.5);
    $p1->SetCenter(0.5);

    // Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);

    $nombres=array("1) A.","2) B.","3) C.");
    $p1->SetLegends($nombres);

    // Explode all slices
    $p1->ExplodeAll();

    $graph->Add($p1);
    $graph->Stroke();     
}


function sucesoFgrnal($datos1){
    $this->librerias();
    
    $contaddAl  = 1;
    $contdelAl  = 1;
    $conteditAl = 1;

    while($datos = $datos1->fetch()){    
	$nombre   = $datos['0'];
	$apellido = $datos['1'] ;
	if($datos['4'] != $fecha){
	    
	if($datos['3'] == 'AddAlumno')$datay[] = $contaddAl; $contaddAl++;
	if($datos['3'] == 'DelAlumno')$datay2[] = $contdelAl; $contdelAl++;
	if($datos['3'] == 'EditAlumno')$datay3[] = $conteditAl; $conteditAl++;
	
	$fecha = $datos['4'];
	}
   
    }
    


    $graph = new Graph(750, 450, "auto");   
    $graph->SetScale("textlin");
    
    $graph->img->SetMargin(50, 40, 40, 40);
    $graph->title->Set("Reporte de Sucesos: ".$nombre . ' '. $apellido);
    $graph->xaxis->title->Set('( Alumnos )');
    $graph->yaxis->title->Set('( # Puntaje )');
    
    $lineplot = new LinePlot($datay);
    $lineplot->SetFillColor('green@0.5');
    $lineplot->SetLegend("Alumno Agregado");

    $lineplot2 = new LinePlot($datay2);
    $lineplot2->SetFillColor('yellow@0.5');
    $lineplot2->SetLegend("Alumno Eliminado");

    $lineplot3 = new LinePlot($datay3);
    $lineplot3->SetFillColor('red@0.5');
    $lineplot3->SetLegend("Alumno Editado");
        
    $graph->Add($lineplot);
    $graph->Add($lineplot2);
    $graph->Add($lineplot3);
    return $graph->Stroke();
}



}
?>

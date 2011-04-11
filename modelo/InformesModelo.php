<?php
/* ************************* */
//@Author: Ignacio Peña
//@website: www.proyectonst.cl
//@email: ignacio.pena@proyectonst.cl
//@license: 
//      This program is free software; you can redistribute it and/or modify
//      it under the terms of the GNU General Public License as published by
//      the Free Software Foundation; either version 2 of the License, or
//      (at your option) any later version.
//      
//      This program is distributed in the hope that it will be useful,
//      but WITHOUT ANY WARRANTY; without even the implied warranty of
//      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//      GNU General Public License for more details.
//      
//      You should have received a copy of the GNU General Public License
//      along with this program; if not, write to the Free Software
//      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//      MA 02110-1301, USA.
//
//
/* ************************* */
class InformesModelo extends ModeloBase
{
	public function val_datos($id_prueba){
    $consulta = $this->db->prepare("SELECT id_resultados FROM resultados  WHERE id_prueba = '$id_prueba'");
    $consulta->execute();
				
    return $consulta;
	}


	public function grafico_informe($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba
									FROM resultados A, prueba B, alumno C, curso D
									WHERE A.id_prueba 	=	'$id_prueba'
									AND   A.id_prueba 	= 	B.id_prueba
									AND   B.id_curso	= 	C.id_curso
									AND   A.id_alumno	= 	C.id_alumno
									AND   D.id_curso	= 	C.id_curso
									AND   D.id_curso	=  	B.id_curso
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe1a($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.1a1_0, E.1a1_1, E.1a1_2, E.1a1_3, E.1a1_4, E.1a1_5,E.1a1_6, E.1a1_7, F.1a2_0, F.1a2_1, F.1a2_2, F.1a2_3, F.1a2_4, F.1a2_5, F.1a2_6, F.1a2_7, G.1a3_0, G.1a3_1, G.1a3_2, G.1a3_3, G.1a3_4, G.1a3_5, G.1a3_6, G.1a3_7, H.1a4_0, H.1a4_1, H.1a4_2, H.1a4_3, H.1a4_4, H.1a4_5, H.1a4_6, H.1a4_7
									FROM resultados A, prueba B, alumno C, curso D, resultados_1a1 E, resultados_1a2 F, resultados_1a3 G, resultados_1a4 H
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe1b($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.1b1_0, E.1b1_1, E.1b1_2, E.1b1_3, E.1b1_4, E.1b1_5,E.1b1_6, E.1b1_7, F.1b2_0, F.1b2_1, F.1b2_2, F.1b2_3, F.1b2_4, F.1b2_5, F.1b2_6, F.1b2_7, G.1b3_0, G.1b3_1, G.1b3_2, G.1b3_3, G.1b3_4, G.1b3_5, G.1b3_6, H.1b4_0, H.1b4_1, H.1b4_2, H.1b4_3, H.1b4_4, H.1b4_5, H.1b4_6, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_1b1 E, resultados_1b2 F, resultados_1b3 G, resultados_1b4 H, resultados I, variacion J
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=  A.id_alumno
									AND   J.id_prueba       =   '$id_prueba'
									AND   C.id_alumno       =  J.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe2a($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.2a1_0, E.2a1_1, E.2a1_2, E.2a1_3, E.2a1_4, E.2a1_5,E.2a1_6, E.2a1_7, F.2a2_0, F.2a2_1, F.2a2_2, F.2a2_3, F.2a2_4, F.2a2_5, F.2a2_6, F.2a2_7, G.2a3_0, G.2a3_1, G.2a3_2, G.2a3_3, G.2a3_4, G.2a3_5, G.2a3_6, G.2a3_7, H.2a4_0, H.2a4_1, H.2a4_2, H.2a4_3, H.2a4_4, H.2a4_5, H.2a4_6, H.2a4_7, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt, K.difz, K.dift, K.difp, K.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_2a1 E, resultados_2a2 F, resultados_2a3 G, resultados_2a4 H, resultados I, variacion J, variacion K
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=  A.id_alumno
									AND   J.id_prueba       =   '$id_prueba'
									AND   C.id_alumno       =  J.id_alumno
									AND   K.id_prueba       =   '$id_pruebaA'
									AND   C.id_alumno       =  K.id_alumno
									
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe2b($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.2b1_0, E.2b1_1, E.2b1_2, E.2b1_3, E.2b1_4, E.2b1_5,E.2b1_6, F.2b2_0, F.2b2_1, F.2b2_2, F.2b2_3, F.2b2_4, F.2b2_5, F.2b2_6, F.2b2_7, G.2b3_0, G.2b3_1, G.2b3_2, G.2b3_3, G.2b3_4, G.2b3_5, G.2b3_6, G.2b3_7, H.2b4_0, H.2b4_1, H.2b4_2, H.2b4_3, H.2b4_4, H.2b4_5, H.2b4_6, H.2b4_7, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt, K.difz, K.dift, K.difp, K.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_2b1 E, resultados_2b2 F, resultados_2b3 G, resultados_2b4 H, resultados I, variacion J, variacion K
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=  A.id_alumno
									AND   J.id_prueba       =   '$id_prueba'
									AND   C.id_alumno       =  J.id_alumno
									AND   K.id_prueba       =   '$id_pruebaA'
									AND   C.id_alumno       =  K.id_alumno
									
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe3a($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.3a1_0, E.3a1_1, E.3a1_2, E.3a1_3, E.3a1_4, E.3a1_5,E.3a1_6, F.3a2_0, F.3a2_1, F.3a2_2, F.3a2_3, F.3a2_4, F.3a2_5, G.3a3_0, G.3a3_1, G.3a3_2, G.3a3_3, H.3a4_0, H.3a4_1, H.3a4_2, H.3a4_3, H.3a4_4, H.3a4_5, H.3a4_6, H.3a4_7, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt, K.difz, K.dift, K.difp, K.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_3a1 E, resultados_3a2 F, resultados_3a3 G, resultados_3a4 H, resultados I, variacion J, variacion K
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=  A.id_alumno
									AND   J.id_prueba       =   '$id_prueba'
									AND   C.id_alumno       =  J.id_alumno
									AND   K.id_prueba       =   '$id_pruebaA'
									AND   C.id_alumno       =  K.id_alumno
									
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe3b($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.3b1_0, E.3b1_1, E.3b1_2, E.3b1_3, E.3b1_4, E.3b1_5,E.3b1_6, E.3b1_7, F.3b2_0, F.3b2_1, F.3b2_2, F.3b2_3, F.3b2_4,G.3b3_0, G.3b3_1, G.3b3_2, G.3b3_3, H.3b4_0, H.3b4_1, H.3b4_2, H.3b4_3, H.3b4_4, H.3b4_5, H.3b4_6, H.3b4_7, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt, K.difz, K.dift, K.difp, K.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_3b1 E, resultados_3b2 F, resultados_3b3 G, resultados_3b4 H, resultados I, variacion J, variacion K
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=  A.id_alumno
									AND   J.id_prueba       =   '$id_prueba'
									AND   C.id_alumno       =  J.id_alumno
									AND   K.id_prueba       =   '$id_pruebaA'
									AND   C.id_alumno       =  K.id_alumno
									
									ORDER BY C.apellido1_alumn ASC");
									    
    $consulta->execute();
    return $consulta;
	}

	public function grafico_informe4a($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.4a1_0, E.4a1_1, E.4a1_2, E.4a1_3, E.4a1_4, F.4a2_0, F.4a2_1, F.4a2_2, F.4a2_3, F.4a2_4, F.4a2_5, F.4a2_6,G.4a3_0, G.4a3_1, G.4a3_2, G.4a3_3, H.4a4_0, H.4a4_1, H.4a4_2, H.4a4_3, H.4a4_4, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt, K.difz, K.dift, K.difp, K.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_4a1 E, resultados_4a2 F, resultados_4a3 G, resultados_4a4 H, resultados I, variacion J, variacion K
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=  A.id_alumno
									AND   J.id_prueba       =   '$id_prueba'
									AND   C.id_alumno       =  J.id_alumno
									AND   K.id_prueba       =   '$id_pruebaA'
									AND   C.id_alumno       =  K.id_alumno
									
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}


	public function grafico_informe4b($id_prueba, $id_pruebaA){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z, A.percentil, A.puntaje_T, C.nombre1_alumn, C.apellido1_alumn, A.puntaje, D.nivel_curso, D.letra_curso, B.formato_prba, B.fecha_prba, E.4b1_0, E.4b1_1, E.4b1_2, E.4b1_3, E.4b1_4, F.4b2_0, F.4b2_1, F.4b2_2, F.4b2_3, F.4b2_4, F.4b2_5, F.4b2_6, F.4b2_7, G.4b3_0, G.4b3_1, G.4b3_2, G.4b3_3, H.4b4_0, H.4b4_1, H.4b4_2, H.4b4_3, H.4b4_4, I.puntaje_Z, I.percentil, I.puntaje_T, I.puntaje, J.difz, J.dift, J.difp, J.difpt, K.difz, K.dift, K.difp, K.difpt
									FROM resultados A, prueba B, alumno C, curso D, resultados_4b1 E, resultados_4b2 F, resultados_4b3 G, resultados_4b4 H, resultados I, variacion J, variacion K
									WHERE A.id_prueba	=   '$id_prueba'
									AND   A.id_prueba	=   B.id_prueba
									AND   B.id_curso	=   C.id_curso
									AND   A.id_alumno	=   C.id_alumno
									AND   D.id_curso	=   C.id_curso
									AND   D.id_curso	=   B.id_curso
									AND   A.id_alumno 	=   E.id_alumno
									AND   B.id_prueba	=   E.id_prueba
									AND   A.id_alumno 	=   F.id_alumno
									AND   B.id_prueba	=   F.id_prueba
									AND   A.id_alumno 	=   G.id_alumno
									AND   B.id_prueba	=   G.id_prueba
									AND   A.id_alumno 	=   H.id_alumno
									AND   B.id_prueba	=   H.id_prueba
									AND   I.id_prueba 	=   '$id_pruebaA'
									AND   I.id_alumno	=	A.id_alumno
									AND   J.id_prueba	=   '$id_prueba'
									AND   C.id_alumno	=  	J.id_alumno
									AND   K.id_prueba  	=   '$id_pruebaA'
									AND   C.id_alumno  	=	K.id_alumno
									
									ORDER BY C.apellido1_alumn ASC");
    
    $consulta->execute();
    return $consulta;
	}


     /************************************************************************
     *									    *
     *				=[  Graficos	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 


	public function grafico_z($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}

	public function graficoZ0($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje_Z
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_p($id_prueba){
    $consulta = $this->db->prepare("SELECT A.percentil
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}

	public function graficoP0($id_prueba){
    $consulta = $this->db->prepare("SELECT A.percentil
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_t($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje_T
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}

	public function graficoT0($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje_T
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}


	public function grafico_ptje($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}

	public function graficoPT0($id_prueba){
    $consulta = $this->db->prepare("SELECT A.puntaje
									FROM resultados A, prueba B, alumno C
									WHERE A.id_prueba = '$id_prueba'
									AND   A.id_prueba = B.id_prueba
									AND   B.id_curso = C.id_curso
									AND   A.id_alumno = C.id_alumno
									ORDER BY C.apellido1_alumn ASC");
    $consulta->execute();
    return $consulta;
	}



	public function nivelFormato($id_prueba){
    $consulta = $this->db->prepare("SELECT A.nivel, A.formato_prba 
								    FROM prueba A 
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}


	public function tabla_informes($id_profesor){
    $consulta = $this->db->prepare("SELECT A.id_prueba, A.fecha_prba, B.nivel_curso, B.letra_curso, A.formato_prba
									FROM prueba A, curso B
									WHERE A.estado_prba = 'Cerrado'
									AND  A.id_profesor = '$id_profesor' 
									AND A.id_profesor = B.id_profesor 
									AND A.id_curso = B.id_curso
									ORDER BY A.fecha_prba DESC");
    $consulta->execute();
    return $consulta;
	}

	public function tabla_informesDir($id_dir,$fecha){
    $consulta = $this->db->prepare("SELECT A.id_prueba, A.fecha_prba, B.nivel_curso, B.letra_curso, A.formato_prba
									FROM prueba A, curso B, director C, profesor D
									WHERE A.estado_prba = 'Cerrado'
									AND A.id_profesor = D.id_profesor
							   		AND D.rbd  = C.rbd
									AND C.rbd = B.rbd
									AND  B.id_curso = A.id_curso
									AND B.id_profesor = D.id_profesor
									AND C.id_DIR = '$id_dir'
									AND YEAR(A.fecha_prba) = YEAR('$fecha')
									ORDER BY A.fecha_prba DESC");
    $consulta->execute();
    return $consulta;
	}

/*
 *  INFORMACIÓN DE GRÁFICOS TORTA
 *
 */
	public function grafico_1a10($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_0
									FROM resultados_1a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}
	public function grafico_1a11($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_1
									FROM resultados_1a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();

    return $consulta;
	}

	public function grafico_1a12($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_2
									FROM resultados_1a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_1a13($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_3
									FROM resultados_1a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_1a14($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_4
								    FROM resultados_1a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_1a15($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_5
								    FROM resultados_1a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_1a16($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_6
								    FROM resultados_1a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_1a17($id_prueba){
    $consulta = $this->db->prepare("SELECT A.1a1_7
								    FROM resultados_1a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
    return $consulta;
	}

	public function grafico_1a20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_0
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_1
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_2
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_3
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_4
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_5
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_6
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a2_7
								    FROM resultados_1a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_0
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_1
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_2
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_3
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_4
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_5
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_6
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a37($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a3_7
								    FROM resultados_1a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_0
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_1
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_2
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_3
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_4
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_5
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_6
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1a47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1a4_7
								    FROM resultados_1a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

     /************************************************************************
     *									    *
     *				=[  Graficos 1b	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 
	public function grafico_1b10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_0
									FROM resultados_1b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_1
									FROM resultados_1b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_2
									FROM resultados_1b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_3
									FROM resultados_1b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_4
								    FROM resultados_1b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_5
								    FROM resultados_1b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_6
								    FROM resultados_1b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b1_7
								    FROM resultados_1b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_0
									FROM resultados_1b2 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}
	
	public function grafico_1b21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_1
									FROM resultados_1b2 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_2
									FROM resultados_1b2 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_3
									FROM resultados_1b2 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_4
								    FROM resultados_1b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_5
								    FROM resultados_1b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_6
								    FROM resultados_1b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_1b27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b2_7
								    FROM resultados_1b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_0
									FROM resultados_1b3 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1b31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_1
									FROM resultados_1b3 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_2
									FROM resultados_1b3 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_3
									FROM resultados_1b3 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_4
								    FROM resultados_1b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_5
								    FROM resultados_1b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b3_6
								    FROM resultados_1b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_0
									FROM resultados_1b4 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_1b41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_1
									FROM resultados_1b4 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_2
									FROM resultados_1b4 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_3
									FROM resultados_1b4 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_4
								    FROM resultados_1b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_5
								    FROM resultados_1b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_1b46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.1b4_6
								    FROM resultados_1b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

     /************************************************************************
     *									    *
     *				=[  Graficos 2a	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

public function grafico_2a10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_0
									FROM resultados_2a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}
public function grafico_2a11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_1
									FROM resultados_2a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_2
									FROM resultados_2a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_3
									FROM resultados_2a1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_4
								    FROM resultados_2a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_5
								    FROM resultados_2a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_6
								    FROM resultados_2a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a1_7
								    FROM resultados_2a1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_0
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_1
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_2
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_3
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_4
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_5
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_6
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a2_7
								    FROM resultados_2a2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_0
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_1
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_2
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_3
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_4
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_5
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_6
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a37($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a3_7
								    FROM resultados_2a3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_0
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_1
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_2
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

public function grafico_2a43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_3
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2a44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_4
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2a45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_5
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2a46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_6
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2a47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2a4_7
								    FROM resultados_2a4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

     /************************************************************************
     *									    *
     *				=[  Graficos 2b	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

	public function grafico_2b10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_0
									FROM resultados_2b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_1
									FROM resultados_2b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_2
									FROM resultados_2b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_3
									FROM resultados_2b1 A
									WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_4
								    FROM resultados_2b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_5
								    FROM resultados_2b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b1_6
								    FROM resultados_2b1 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_0
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_1
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_2
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_3
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_4
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_5
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_6
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b2_7
								    FROM resultados_2b2 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_0
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_1
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_2
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_3
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b34($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_4
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b35($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_5
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b36($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_6
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b37($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b3_7
								    FROM resultados_2b3 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_0
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_1
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_2
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_3
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_4
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_5
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_6
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_2b47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.2b4_7
								    FROM resultados_2b4 A
								    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

     /************************************************************************
     *									    *
     *				=[  Graficos 3a	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

	public function grafico_3a10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_0
	FROM resultados_3a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}
	
	public function grafico_3a11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_1
	FROM resultados_3a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_2
	FROM resultados_3a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_3
	FROM resultados_3a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_4
				    FROM resultados_3a1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_5
				    FROM resultados_3a1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_6
				    FROM resultados_3a1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a1_7
				    FROM resultados_3a1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a2_0
				    FROM resultados_3a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a2_1
				    FROM resultados_3a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a2_2
				    FROM resultados_3a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a2_3
				    FROM resultados_3a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a2_4
				    FROM resultados_3a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a2_5
				    FROM resultados_3a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	public function grafico_3a30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a3_0
				    FROM resultados_3a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a3_1
				    FROM resultados_3a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a3_2
				    FROM resultados_3a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a3_3
				    FROM resultados_3a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_0
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_1
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_2
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_3
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_4
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_5
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_6
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3a47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3a4_7
				    FROM resultados_3a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

     /************************************************************************
     *									    *
     *				=[  Graficos 3b	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

	public function grafico_3b10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_0
	FROM resultados_3b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}
	
	public function grafico_3b11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_1
	FROM resultados_3b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_2
	FROM resultados_3b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_3
	FROM resultados_3b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_4
				    FROM resultados_3b1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b15($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_5
				    FROM resultados_3b1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b16($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_6
				    FROM resultados_3b1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b17($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b1_7
				    FROM resultados_3b1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	public function grafico_3b20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b2_0
				    FROM resultados_3b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b2_1
				    FROM resultados_3b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b2_2
				    FROM resultados_3b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b2_3
				    FROM resultados_3b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b2_4
				    FROM resultados_3b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b2_5
				    FROM resultados_3b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	public function grafico_3b30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b3_0
				    FROM resultados_3b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
}

	public function grafico_3b31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b3_1
				    FROM resultados_3b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b3_2
				    FROM resultados_3b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b3_3
				    FROM resultados_3b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_0
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_1
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_2
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_3
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_4
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b45($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_5
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b46($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_6
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_3b47($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.3b4_7
				    FROM resultados_3b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


     /************************************************************************
     *									    *
     *				=[  Graficos 4a	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

	public function grafico_4a10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a1_0
	FROM resultados_4a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}
	
	public function grafico_4a11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a1_1
	FROM resultados_4a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a1_2
	FROM resultados_4a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a1_3
	FROM resultados_4a1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a1_4
				    FROM resultados_4a1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_0
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_1
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_2
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_3
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_4
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_5
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;

	}

	public function grafico_4a26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a2_6
				    FROM resultados_4a2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	public function grafico_4a30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a3_0
				    FROM resultados_4a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a3_1
				    FROM resultados_4a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a3_2
				    FROM resultados_4a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a3_3
				    FROM resultados_4a3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a4_0
				    FROM resultados_4a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a4_1
				    FROM resultados_4a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a4_2
				    FROM resultados_4a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a4_3
				    FROM resultados_4a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4a44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4a4_4
				    FROM resultados_4a4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

     /************************************************************************
     *									    *
     *				=[  Graficos 4b	]=			    *
     *									    *
     ************************************************************************
     ************************************************************************/ 

	public function grafico_4b10($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b1_0
	FROM resultados_4b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}
	public function grafico_4b11($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b1_1
	FROM resultados_4b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b12($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b1_2
	FROM resultados_4b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b13($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b1_3
	FROM resultados_4b1 A
	WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b14($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b1_4
				    FROM resultados_4b1 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	public function grafico_4b20($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_0
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b21($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_1
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b22($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_2
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b23($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_3
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b24($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_4
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b25($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_5
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;

	}

	public function grafico_4b26($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_6
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b27($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b2_7
				    FROM resultados_4b2 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	public function grafico_4b30($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b3_0
				    FROM resultados_4b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b31($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b3_1
				    FROM resultados_4b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b32($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b3_2
				    FROM resultados_4b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b33($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b3_3
				    FROM resultados_4b3 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b40($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b4_0
				    FROM resultados_4b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b41($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b4_1
				    FROM resultados_4b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b42($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b4_2
				    FROM resultados_4b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b43($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b4_3
				    FROM resultados_4b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function grafico_4b44($id_prueba){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT A.4b4_4
				    FROM resultados_4b4 A
				    WHERE A.id_prueba = '$id_prueba'");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function ident_prof($id_dir, $rbd){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT B.nombre_prof, B.apellido_prof, B.email_prof,A.reporte_referencia, A.reporte_fecha, A.reporte_hora, A.reporte_detalle, B.id_profesor 
				FROM reporte_dir A, profesor B
				WHERE A.rbd = '$rbd'
				AND A.rbd = B.rbd
				AND B.id_profesor = A.id_profesor
				ORDER BY B.nombre_prof ASC, A.reporte_fecha ASC, A.reporte_hora ASC");
    $consulta->execute();
				
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}


	/***************************************************************************************************************
 	* ******************************** = SUCESOS profesor = *******************************************************
 	* ************************************************************************************************************/

	public function sucesoprof($id_prof){
    //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT B.nombre_prof, B.apellido_prof, B.email_prof, A.reporte_referencia, A.reporte_fecha, A.reporte_hora, A.reporte_detalle, B.id_profesor
				    FROM reporte_dir A, profesor B
				    WHERE A.id_profesor = '$id_prof'
				    AND A.rbd = B.rbd
				    AND B.id_profesor = A.id_profesor
				    ORDER BY B.nombre_prof ASC , A.reporte_fecha ASC , A.reporte_hora ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}

	public function sucesoFgrnal($id_prof){
 //realizamos la consulta de los items
    $consulta = $this->db->prepare("SELECT B.nombre_prof, B.apellido_prof,  A.reporte_fecha, A.reporte_referencia, A.reporte_hora
				    FROM reporte_dir A, profesor B
				    WHERE A.id_profesor = '$id_prof'
				    AND A.rbd = B.rbd
				    AND B.id_profesor = A.id_profesor
				    ORDER BY A.reporte_fecha ASC");
    
    $consulta->execute();
	
    //devolvemos la coleccion para que la vista la presente.
    return $consulta;
	}
}

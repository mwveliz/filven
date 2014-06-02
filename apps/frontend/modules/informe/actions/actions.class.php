<?php

/**
 * informe actions.
 *
 * @package    filven
 * @subpackage informe
 * @author     Your name here
 */
class informeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Informes = InformeQuery::create()->orderByFechaInforme('desc')->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Informe = InformePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Informe);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InformeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InformeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Informe = InformeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Informe, sprintf('Object Informe does not exist (%s).', $request->getParameter('id')));
    $this->form = new InformeForm($Informe);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Informe = InformeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Informe, sprintf('Object Informe does not exist (%s).', $request->getParameter('id')));
    $this->form = new InformeForm($Informe);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Informe = InformeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Informe, sprintf('Object Informe does not exist (%s).', $request->getParameter('id')));
    $Informe->delete();

    $this->redirect('informe/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Informe = $form->save();

      $this->redirect('informe/index');
    }
  }
  
  public function executeEncuestas(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }
    
    $this->Encuestas = EncuestaQuery::create()->orderByFechaElaboracion('desc')->paginate($page,20);
  }  
  
   public function executeEstadisticas(sfWebRequest $request)
  {
    $this->Encuesta = EncuestaQuery::create()->filterById($request->getParameter('id'));
  } 
  
  
  public function executeConsolidado(sfWebRequest $request)
  {
    $id_encuesta=$request->getParameter('id');
      //$Encuesta = EncuestaQuery::create()->filterById($id_encuesta);
    $E=  EncuestaQuery::create()->findOneById($id_encuesta);
    $tipo_encuesta=$E->getTipoEncuesta();
    $tipo_encuesta=  strtoupper($tipo_encuesta);

    
    /*GENERAR ARCHIVO CSV*/
    /*buscar las cabeceras
     */
    
    $Items=  ItemQuery::create()->filterByIdEncuesta($id_encuesta)->orderById('asc')->find();
    
    $fp = fopen('consolidado.csv', 'w');
    $fila=array();
    array_push($fila,'Nro');        
    foreach ($Items as $Item) {
        $texto=$Item->getTexto();
        $ORS=  OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
        if (count($ORS)>0 && ($Item->getTipoItem()=='D' || $Item->getTipoItem()=='E' || $Item->getTipoItem()=='F' || $Item->getTipoItem()=='G'|| $Item->getTipoItem()=='H' )){
            foreach ($ORS as $OR){
                $texto=$OR->getOpcion();
                array_push($fila,$texto);        
            }
        }else{
       array_push($fila,$texto);        
        }
    }
    array_push($fila,'Observaciones');        
    fputcsv($fp, $fila);
    $fila=array();
    
/***LLenar la matriz***///
    
    $RES= RespuestaEncuestaQuery::create()->orderByNumeroEncuesta('asc')->filterByIdEncuesta($id_encuesta)->find();
    foreach ($RES as $RE){
       $id_respuesta_encuesta= $RE->getId();
        $nro=$RE->getNumeroEncuesta() ;
        array_push($fila,$nro);        
        $sexo='NS/NR';
        $nivel_educativo='NS/NR';
        switch ($tipo_encuesta){
            case 'VISITANTE':
                //aqui debo hacer un join porque iterando no aguanta la memoria
                /******************************SEXO**********************************/
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(21)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $sexo=$OR->getOpcion();
                array_push($fila,$sexo);        
                /******************************SEXO**********************************/
                
                /******************************EDAD**********************************/
                $RI=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(22)
                    ->findOne();//busco todas las respuestas
                if (count($RI)>0) $edad=$RI->getValor();
                array_push($fila,$edad);        
                /******************************EDAD**********************************/
                
                /******************************NIVEL EDUCATIVO**********************************/
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(23)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $nivel_educativo=$OR->getOpcion();
                array_push($fila,$nivel_educativo);     
                
                /***************************MISIONES*************************************/
                $misiones=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(24)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($misiones,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=45;$i<=49;$i++){
                    if(in_array($i,$misiones)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                /***************************PROFESION*************************************/
                $profesiones=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(25)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($profesiones,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=50;$i<=56;$i++){
                    if(in_array($i,$profesiones)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                 
                /***************************LOCALIZACION*************************************/
                $localizacion=array();
                $RIS=RespuestaItemQuery::create()
                            ->orderById('asc')
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(26)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($fila,$RI->getValor() );        
                    
                }
                
                /*************************************************************************/
                
                
                
                /***************************GENEROS*************************************/
                $generos=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(30)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($generos,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=66;$i<=71;$i++){
                    if(in_array($i,$generos)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                /***************************CRITERIOS*************************************/
                $criterios=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(31)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($criterios,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=72;$i<=79;$i++){
                    if(in_array($i,$criterios)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                /***************************RED DE REVISTA *************************************/
                $revistas=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(32)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($revistas,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=80;$i<=89;$i++){
                    if(in_array($i,$revistas)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                  /******************************TE GUSTA LEER**********************************/
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(33)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $te_gusta_leer=$OR->getOpcion();
                array_push($fila,$te_gusta_leer);        
                /******************************TE GUSTA LEER**********************************/
                
                
                /***************************qu te gusta leer PERIODICO REVISTA*************************************/
                $quelees=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(34)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($quelees,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=92;$i<=94;$i++){
                    if(in_array($i,$quelees)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                /***************************Que lee ud*************************************
                $revistas=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(35)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($revistas,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=95;$i<=97;$i++){
                    if(in_array($i,$revistas)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************
                
                /***************************Como Obtiene los Libros que lee*************************************
                $revistas=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(36)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($revistas,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=97;$i<=102;$i++){
                    if(in_array($i,$revistas)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************
                
                /***************************QUE ES LEER PARA ud*************************************
                $queesleer=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(37)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($queesleer,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=103;$i<=107;$i++){
                    if(in_array($i,$queesleer)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************
               
                /***************************TEMATICA*************************************
                $tematica=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(38)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($tematica,($RI->getOpcionRespuesta()->getId()));        
                    
                }
                for($i=108;$i<=123;$i++){
                    if(in_array($i,$tematica)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                /******************************ACCESO A LA LECTURA**********************************
                $accesol='NS/NR';
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(39)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $accesol=$OR->getOpcion();
                array_push($fila,$accesol);        
                /******************************ACCESO A LA LESCTURA**********************************
                
                /******************************COMPRO**********************************
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(40)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $compro=$OR->getOpcion();
                array_push($fila,$compro);        
                /******************************COMPRO**********************************
                
                /******************************CONOCE LAS LIBRERIAS DEL SUR**********************************
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(41)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $libreriasur=$OR->getOpcion();
                array_push($fila,$libreriasur);        
                /******************************CONOCE LAS LIBRERIAS DEL SUR**********************************
                
                /******************************PRECIOS DE LOS LIBROS**********************************
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(42)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $precios=$OR->getOpcion();
                array_push($fila,$precios);        
                /******************************PRECIOS DE LOS LIBROS**********************************
                
                /******************************OFERTA EDITORIAL**********************************
                $OR= OpcionRespuestaQuery::create()
                    ->filterByIdItem(43)                    
                       ->useRespuestaItemQuery()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                       ->endUse()
                    ->findOne();//busco todas las respuestas
                if (count($OR)>0) $oferta=$OR->getOpcion();
                array_push($fila,$oferta);        
                /******************************OFERTA EDITORIAL**********************************/
                
                
                
                 /***************************VALORACION*************************************
                $valoracion=array();
                $RIS=RespuestaItemQuery::create()
                            ->filterByIdRespuestaEncuesta($id_respuesta_encuesta)
                            ->filterByIdItem(44)
                    ->find();//busco todas las respuestas
                foreach($RIS as $RI){
                    array_push($valoracion,$RI->getValor());        
                    
                }
                for($i=137;$i<=143;$i++){
                    if(in_array($i,$valoracion)){
                    array_push($fila,1);
                    }else{
                    array_push($fila,0);            
                    }
                }
                /*************************************************************************/
                
                
                
                
                
                
                
                
                
                
                
                break;
            
         
                
                
                die();
                break;
            
            
            
        }
        
        
        $obs=$RE->getObservacion();
        array_push($fila,$obs);        
         fputcsv($fp, $fila);
         $fila=array();
         
    }
    
       // $RE= RespuestaEncuestaQuery::create()->filterByIdRespuestaEncuesta($id_respuesta_encuesta)->find();
        
    
    

    
    
    
    fclose($fp);




ob_end_clean();//required here or large files will not work
$this->getResponse()->clearHttpheaders();
$this->getResponse()->setHttpHeader('Content-Description','File Transfer');
$this->getResponse()->setHttpHeader('Cache-Control', 'public, must-revalidate, max-age=0');
$this->getResponse()->setHttpHeader('Pragma: public',true);
$this->getResponse()->setHttpHeader('Content-Transfer-Encoding', 'binary'); 
$this->getResponse()->setHttpHeader('Content-length',filesize('consolidado.csv')); //send the size of the file
$this->getResponse()->setHttpHeader('Content-Type','some_mime_type'); // e.g. application/pdf, image/png etc.
$this->getResponse()->setHttpHeader('Content-Disposition','attachment; filename="consolidado.csv"'); //some filename
$this->getResponse()->sendHttpHeaders(); //edited to add the missed sendHttpHeaders
$this->getResponse()->setContent(readfile('consolidado.csv'));

$this->getResponse()->sendContent();

return sfView::NONE;

/*
//aqui envio el archivo a descarga
  

  $this->getResponse()->clearHttpHeaders();
  $this->getResponse()->setHttpHeader('Content-Description','File Transfer');
  $this->getResponse()->setHttpHeader('Content-Type', 'application/csv');
  $this->getResponse()->setHttpHeader('Content-Disposition','attachment;filename="consolidado.csv" '); 
  $this->getResponse()->setHttpHeader('Pragma', '');
  $this->getResponse()->setHttpHeader('Cache-Control', '');
  $this->getResponse()->sendHttpHeaders(); 
  $this->renderText(fopen('php://output',$fp));    
   */
  } 
}

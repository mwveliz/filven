<?php

/**
 * item actions.
 *
 * @package    filven
 * @subpackage item
 * @author     Your name here
 */
class itemActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Items = ItemQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Item = ItemPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Item);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ItemForm();
  }

  
    public function executeAgregarvarios(sfWebRequest $request)
  {
    $this->form = new ItemForm();
    $this->id_encuesta=$request->getParameter('id_encuesta');
    
    
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Item = ItemQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Item, sprintf('Object Item does not exist (%s).', $request->getParameter('id')));
    $this->form = new ItemForm($Item);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Item = ItemQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Item, sprintf('Object Item does not exist (%s).', $request->getParameter('id')));
    $this->form = new ItemForm($Item);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Item = ItemQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Item, sprintf('Object Item does not exist (%s).', $request->getParameter('id')));
    $Item->delete();

    $this->redirect('item/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Item = $form->save();

      $this->redirect('item/edit?id='.$Item->getId());
    }
  }

  
  public function executeCreatevarios(sfWebRequest $request){
    $numeracion=$request->getParameter('numeracion');
    $id_encuesta=$request->getParameter('id_encuesta');
    
    $texto=$request->getParameter('texto');
    $tipo_item=$request->getParameter('tipo_item');
    $opcion=$request->getParameter('opcion');
    //$valores= explode('","',$opcion);
    $valores=json_decode($opcion);
   
    
    
    $Item=new Item();
    $Item->setIdEncuesta($id_encuesta);
    $Item->setNumeracion($numeracion);
    $Item->setTexto($texto);
    $Item->setTipoItem($tipo_item);
    $Item->save();
    $id_item=$Item->getId();
    
    
    
    
    foreach ($valores as $valor){
     $valor=trim($valor,'"');
     $valor=trim($valor,'"');
     $OpcionRespuesta= new OpcionRespuesta();
     $OpcionRespuesta->setIdItem($id_item);
     $OpcionRespuesta->setOpcion($valor);
     $OpcionRespuesta->save();
    }
    
    return $this->renderText('ok');
  }

  
  
}

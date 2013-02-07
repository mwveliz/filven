<?php

/**
 * encuesta actions.
 *
 * @package    filven
 * @subpackage encuesta
 * @author     Your name here
 */
class encuestaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Encuestas = EncuestaQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Encuesta = EncuestaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Encuesta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EncuestaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $form = new EncuestaForm();

//    $this->processForm($request, $this->form);
     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Encuesta = $form->save();

      $this->redirect('item/agregarvarios?id_encuesta='.$Encuesta->getId());
    }
    
    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Encuesta = EncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Encuesta, sprintf('Object Encuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncuestaForm($Encuesta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Encuesta = EncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Encuesta, sprintf('Object Encuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncuestaForm($Encuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Encuesta = EncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Encuesta, sprintf('Object Encuesta does not exist (%s).', $request->getParameter('id')));
    $Encuesta->delete();

    $this->redirect('encuesta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Encuesta = $form->save();

      $this->redirect('encuesta/edit?id='.$Encuesta->getId());
    }
  }
}

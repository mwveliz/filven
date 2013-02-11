<?php

/**
 * respuesta_encuesta actions.
 *
 * @package    filven
 * @subpackage respuesta_encuesta
 * @author     Your name here
 */
class respuesta_encuestaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->RespuestaEncuestas = RespuestaEncuestaQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->RespuestaEncuesta = RespuestaEncuestaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->RespuestaEncuesta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RespuestaEncuestaForm();
  }

  
  public function executeCargarencuesta(sfWebRequest $request)
  {
      
    $id_encuesta=$request->getParameter('id_encuesta');
    $this->Items= ItemQuery::create()->filterByIdEncuesta($id_encuesta);
  }

  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RespuestaEncuestaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $RespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuesta, sprintf('Object RespuestaEncuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaForm($RespuestaEncuesta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $RespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuesta, sprintf('Object RespuestaEncuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaForm($RespuestaEncuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $RespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuesta, sprintf('Object RespuestaEncuesta does not exist (%s).', $request->getParameter('id')));
    $RespuestaEncuesta->delete();

    $this->redirect('respuesta_encuesta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $RespuestaEncuesta = $form->save();

      $this->redirect('respuesta_encuesta/edit?id='.$RespuestaEncuesta->getId());
    }
  }
}

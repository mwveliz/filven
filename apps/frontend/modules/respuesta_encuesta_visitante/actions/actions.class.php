<?php

/**
 * respuesta_encuesta_visitante actions.
 *
 * @package    filven
 * @subpackage respuesta_encuesta_visitante
 * @author     Your name here
 */
class respuesta_encuesta_visitanteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->RespuestaEncuestaVisitantes = RespuestaEncuestaVisitanteQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->RespuestaEncuestaVisitante = RespuestaEncuestaVisitantePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->RespuestaEncuestaVisitante);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RespuestaEncuestaVisitanteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RespuestaEncuestaVisitanteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $RespuestaEncuestaVisitante = RespuestaEncuestaVisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuestaVisitante, sprintf('Object RespuestaEncuestaVisitante does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaVisitanteForm($RespuestaEncuestaVisitante);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $RespuestaEncuestaVisitante = RespuestaEncuestaVisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuestaVisitante, sprintf('Object RespuestaEncuestaVisitante does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaVisitanteForm($RespuestaEncuestaVisitante);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $RespuestaEncuestaVisitante = RespuestaEncuestaVisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuestaVisitante, sprintf('Object RespuestaEncuestaVisitante does not exist (%s).', $request->getParameter('id')));
    $RespuestaEncuestaVisitante->delete();

    $this->redirect('respuesta_encuesta_visitante/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $RespuestaEncuestaVisitante = $form->save();

      $this->redirect('respuesta_encuesta_visitante/edit?id='.$RespuestaEncuestaVisitante->getId());
    }
  }
}

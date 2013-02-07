<?php

/**
 * respuesta_encuesta_expositor actions.
 *
 * @package    filven
 * @subpackage respuesta_encuesta_expositor
 * @author     Your name here
 */
class respuesta_encuesta_expositorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->RespuestaEncuestaExpositors = RespuestaEncuestaExpositorQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->RespuestaEncuestaExpositor = RespuestaEncuestaExpositorPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->RespuestaEncuestaExpositor);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RespuestaEncuestaExpositorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RespuestaEncuestaExpositorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $RespuestaEncuestaExpositor = RespuestaEncuestaExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuestaExpositor, sprintf('Object RespuestaEncuestaExpositor does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaExpositorForm($RespuestaEncuestaExpositor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $RespuestaEncuestaExpositor = RespuestaEncuestaExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuestaExpositor, sprintf('Object RespuestaEncuestaExpositor does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaEncuestaExpositorForm($RespuestaEncuestaExpositor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $RespuestaEncuestaExpositor = RespuestaEncuestaExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaEncuestaExpositor, sprintf('Object RespuestaEncuestaExpositor does not exist (%s).', $request->getParameter('id')));
    $RespuestaEncuestaExpositor->delete();

    $this->redirect('respuesta_encuesta_expositor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $RespuestaEncuestaExpositor = $form->save();

      $this->redirect('respuesta_encuesta_expositor/edit?id='.$RespuestaEncuestaExpositor->getId());
    }
  }
}

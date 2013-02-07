<?php

/**
 * opcion_respuesta actions.
 *
 * @package    filven
 * @subpackage opcion_respuesta
 * @author     Your name here
 */
class opcion_respuestaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->OpcionRespuestas = OpcionRespuestaQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->OpcionRespuesta = OpcionRespuestaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->OpcionRespuesta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OpcionRespuestaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new OpcionRespuestaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $OpcionRespuesta = OpcionRespuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($OpcionRespuesta, sprintf('Object OpcionRespuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new OpcionRespuestaForm($OpcionRespuesta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $OpcionRespuesta = OpcionRespuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($OpcionRespuesta, sprintf('Object OpcionRespuesta does not exist (%s).', $request->getParameter('id')));
    $this->form = new OpcionRespuestaForm($OpcionRespuesta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $OpcionRespuesta = OpcionRespuestaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($OpcionRespuesta, sprintf('Object OpcionRespuesta does not exist (%s).', $request->getParameter('id')));
    $OpcionRespuesta->delete();

    $this->redirect('opcion_respuesta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $OpcionRespuesta = $form->save();

      $this->redirect('opcion_respuesta/edit?id='.$OpcionRespuesta->getId());
    }
  }
}

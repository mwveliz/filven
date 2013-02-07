<?php

/**
 * valor_opcion actions.
 *
 * @package    filven
 * @subpackage valor_opcion
 * @author     Your name here
 */
class valor_opcionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ValorOpcions = ValorOpcionQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ValorOpcion = ValorOpcionPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->ValorOpcion);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ValorOpcionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ValorOpcionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $ValorOpcion = ValorOpcionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ValorOpcion, sprintf('Object ValorOpcion does not exist (%s).', $request->getParameter('id')));
    $this->form = new ValorOpcionForm($ValorOpcion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $ValorOpcion = ValorOpcionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ValorOpcion, sprintf('Object ValorOpcion does not exist (%s).', $request->getParameter('id')));
    $this->form = new ValorOpcionForm($ValorOpcion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $ValorOpcion = ValorOpcionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ValorOpcion, sprintf('Object ValorOpcion does not exist (%s).', $request->getParameter('id')));
    $ValorOpcion->delete();

    $this->redirect('valor_opcion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ValorOpcion = $form->save();

      $this->redirect('valor_opcion/edit?id='.$ValorOpcion->getId());
    }
  }
}

<?php

/**
 * usuario actions.
 *
 * @package    filven
 * @subpackage usuario
 * @author     Your name here
 */
class usuarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Usuarios = UsuarioQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Usuario = UsuarioPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Usuario);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsuarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UsuarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Usuario = UsuarioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Usuario, sprintf('Object Usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($Usuario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Usuario = UsuarioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Usuario, sprintf('Object Usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($Usuario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Usuario = UsuarioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Usuario, sprintf('Object Usuario does not exist (%s).', $request->getParameter('id')));
    $Usuario->delete();

    $this->redirect('usuario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Usuario = $form->save();

      $this->redirect('usuario/index');
    }
  }
}

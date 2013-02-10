<?php

/**
 * respuesta_item actions.
 *
 * @package    filven
 * @subpackage respuesta_item
 * @author     Your name here
 */
class respuesta_itemActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->RespuestaItems = RespuestaItemQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->RespuestaItem = RespuestaItemPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->RespuestaItem);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RespuestaItemForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RespuestaItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $RespuestaItem = RespuestaItemQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaItem, sprintf('Object RespuestaItem does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaItemForm($RespuestaItem);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $RespuestaItem = RespuestaItemQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaItem, sprintf('Object RespuestaItem does not exist (%s).', $request->getParameter('id')));
    $this->form = new RespuestaItemForm($RespuestaItem);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $RespuestaItem = RespuestaItemQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($RespuestaItem, sprintf('Object RespuestaItem does not exist (%s).', $request->getParameter('id')));
    $RespuestaItem->delete();

    $this->redirect('respuesta_item/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $RespuestaItem = $form->save();

      $this->redirect('respuesta_item/edit?id='.$RespuestaItem->getId());
    }
  }
}

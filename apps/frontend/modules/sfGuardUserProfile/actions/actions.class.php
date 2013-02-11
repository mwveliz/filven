<?php

/**
 * sfGuardUserProfile actions.
 *
 * @package    filven
 * @subpackage sfGuardUserProfile
 * @author     Your name here
 */
class sfGuardUserProfileActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $page = 1;
    if ($request->getParameter('page')) {
          $page = $request->getParameter('page');
    }  
    
    $this->sfGuardUserProfiles = sfGuardUserProfileQuery::create()->paginate($page,20);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sfGuardUserProfile = sfGuardUserProfilePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->sfGuardUserProfile);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new sfGuardUserProfileForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new sfGuardUserProfileForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $sfGuardUserProfile = sfGuardUserProfileQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($sfGuardUserProfile, sprintf('Object sfGuardUserProfile does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserProfileForm($sfGuardUserProfile);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $sfGuardUserProfile = sfGuardUserProfileQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($sfGuardUserProfile, sprintf('Object sfGuardUserProfile does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserProfileForm($sfGuardUserProfile);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $sfGuardUserProfile = sfGuardUserProfileQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($sfGuardUserProfile, sprintf('Object sfGuardUserProfile does not exist (%s).', $request->getParameter('id')));
    $sfGuardUserProfile->delete();

    $this->redirect('sfGuardUserProfile/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sfGuardUserProfile = $form->save();

      $this->redirect('sfGuardUserProfile/index');
    }
  }
}

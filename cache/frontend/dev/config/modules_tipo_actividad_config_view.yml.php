<?php
// auto-generated by sfViewConfigHandler
// date: 2013/02/03 01:15:26
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('superfish.css', '', array ());
  $response->addStylesheet('superfish-navbar.css', '', array ());
  $response->addStylesheet('ui-darkness/jquery-ui-1.10.0.custom.css', '', array ());
  $response->addJavascript('jquery-1.9.0.min.js', '', array ());
  $response->addJavascript('jquery-ui-1.10.0.custom.min.js', '', array ());



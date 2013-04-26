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

    $usuario = $_POST["usuario"]['usuario'];
    $nombre = $_POST["usuario"]['nombre'];
    $apellido = $_POST["usuario"]['apellido'];
    $password = $_POST["usuario"]['password'];
    $email = $_POST["usuario"]['email'];
    $telefono = $_POST["usuario"]['telefono'];
    $sexo = $_POST["usuario"]['sexo'];
    $activo = $_POST["usuario"]['activo'];
    $id_sf_guard_group = intval($_POST['id_sf_guard_group']);
    
    
    $sfusuario=  new  SfGuardUser();
    $sfusuario->setUsername($usuario);
    $sfusuario->setPassword($password);
    $sfusuario->save();    
    
    $SfGuard = SfGuardUserQuery::create()->orderById('desc')->findOne();
    $id = $SfGuard->getId();
    
    $sfgroup=  new  SfGuardUserGroup();
    $sfgroup->setUserId($id);
    $sfgroup->setGroupId($id_sf_guard_group);
    $sfgroup->save();    
    
    $Usuario = new Usuario();
    $Usuario->setUsuario($usuario); 
    $Usuario->setNombre($nombre); 
    $Usuario->setApellido($apellido); 
    $Usuario->setPassword(md5($password)); 
    $Usuario->setEmail($email); 
    $Usuario->setTelefono($telefono); 
    $Usuario->setSexo($sexo); 
    $Usuario->setActivo($activo); 
    $Usuario->setIdSfGuardGroup($id_sf_guard_group); 
    $Usuario->save();
    
    $this->redirect('usuario/index');
    
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

    $usuario = $_POST["usuario"]['usuario'];
    $nombre = $_POST["usuario"]['nombre'];
    $apellido = $_POST["usuario"]['apellido'];
    $password = $_POST["usuario"]['password'];
    $email = $_POST["usuario"]['email'];
    $telefono = $_POST["usuario"]['telefono'];
    $sexo = $_POST["usuario"]['sexo'];
    $activo = $_POST["usuario"]['activo'];
    $id_sf_guard_group = intval($_POST['id_sf_guard_group']);   
    
    $UsuarioInicial = UsuarioQuery::create()->filterById($request->getParameter('id'))->findOne();
    $SfGuard = SfGuardUserQuery::create()->filterByUsername($UsuarioInicial->getUsuario())->findOne();
    $id = $SfGuard->getId();
 
    $SfGuard->setUsername($usuario);
    $SfGuard->setPassword($password);
    $SfGuard->save();    
    
    $SfGuardGroup =  SfGuardUserGroupQuery::create()->filterByUserId($id)->findOne();
    $SfGuardGroup->delete();
    
    $sfgroup=  new  SfGuardUserGroup();
    $sfgroup->setUserId($id);
    $sfgroup->setGroupId($id_sf_guard_group);
    $sfgroup->save();    
    
    $Usuario->setUsuario($usuario); 
    $Usuario->setNombre($nombre); 
    $Usuario->setApellido($apellido); 
    $Usuario->setPassword(md5($password)); 
    $Usuario->setEmail($email); 
    $Usuario->setTelefono($telefono); 
    $Usuario->setSexo($sexo); 
    $Usuario->setActivo($activo); 
    $Usuario->setIdSfGuardGroup($id_sf_guard_group); 
    $Usuario->save();
    
    $this->redirect('usuario/index');
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
  
  
   public function executeBuscarusuario(sfWebRequest $request)
  {
    $letra = $request->getParameter('letra');
    $ver_usuarios_eliminados = $request->getParameter('ver_usuarios_eliminados');
    $letra_minuscula = strtolower($letra);


    if ($letra != "0" && $letra != "Todos") {

        if ($ver_usuarios_eliminados == "false" ) {
            $Usuarios = UsuarioQuery::create()
                     ->condition('cond1', 'Usuario.Apellido LIKE ?', $letra.'%')
                     ->condition('cond2', 'Usuario.Activo=true')
                     ->where(array('cond1', 'cond2'), 'and')
                     ->orderByApellido('asc')
                     ->find();

                    // $arreglo['busqueda'] = 1;
        }

        if ($ver_usuarios_eliminados == "true" ) {
            $Usuarios = UsuarioQuery::create()
                     ->condition('cond1', 'Usuario.Apellido LIKE ?', $letra.'%')
                     ->condition('cond2', 'Usuario.Activo=false')
                     ->where(array('cond1', 'cond2'), 'and')
                     ->orderByApellido('asc')
                     ->find();
        }

    } else {

        if ($ver_usuarios_eliminados == "false" ) {
            $Usuarios = UsuarioQuery::create()
                     ->filterByActivo(true)
                     ->orderByApellido('asc')
                     ->find();
                  //    $arreglo['busqueda'] = 5;
        }

        if ($ver_usuarios_eliminados == "true" ) {
            $Usuarios = UsuarioQuery::create()
                     ->filterByActivo(false)
                     ->orderByApellido('asc')
                     ->find();
                 //     $arreglo['busqueda'] = 8;

        }
    }

    $i = 0;
    $j = 0;
    $to  = array();

    foreach ($Usuarios as $Usuario) {
        $id = $Usuario->getId();
        $isactive = $Usuario->getActivo();
        if ($isactive) {
            $isactive = "Si";
        } else {
            $isactive = "No";
        }
        $to[$j]['usuario'] = $Usuario->getUsuario();
        $to[$j]['nombre'] = $Usuario->getNombre();
        $to[$j]['apellido'] = $Usuario->getApellido();
        if ($Usuario->getSexo() > 0) {
                 $to[$j]['sexo'] = 'Masculino';
        } else {
            $to[$j]['sexo'] = 'Femenino';
        }
        $to[$j]['activo'] = $isactive;
        $to[$j]['id'] = $id;
        if (strlen($Usuario->getEmail()) > 0) {
            $to[$j]['email'] = $Usuario->getEmail();
        } else {
            $to[$j]['email'] = '-';
        }
        $j++;
    }


      if (count($Usuarios) > 0) {
            $to2 = json_encode($to);
            //$arreglo['busqueda'] = $letra;
            return $this->renderText($to2);
            //return $this->renderText(json_encode($arreglo));
      } else {
        //  $arreglo = array();
          $arreglo['busqueda'] = "La búsqueda realizada no produjo resultados";
          //$arreglo['busqueda'] = $letra;
          return $this->renderText(json_encode($arreglo));
      }


  }  
}

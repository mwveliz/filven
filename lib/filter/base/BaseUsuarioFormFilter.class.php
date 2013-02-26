<?php

/**
 * Usuario filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'            => new sfWidgetFormFilterInput(),
      'apellido'          => new sfWidgetFormFilterInput(),
      'usuario'           => new sfWidgetFormFilterInput(),
      'password'          => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'telefono'          => new sfWidgetFormFilterInput(),
      'sexo'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_sf_guard_group' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'apellido'          => new sfValidatorPass(array('required' => false)),
      'usuario'           => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'telefono'          => new sfValidatorPass(array('required' => false)),
      'sexo'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_sf_guard_group' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nombre'            => 'Text',
      'apellido'          => 'Text',
      'usuario'           => 'Text',
      'password'          => 'Text',
      'email'             => 'Text',
      'telefono'          => 'Text',
      'sexo'              => 'Boolean',
      'activo'            => 'Boolean',
      'id_sf_guard_group' => 'Number',
    );
  }
}

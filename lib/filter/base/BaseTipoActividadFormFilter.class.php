<?php

/**
 * TipoActividad filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTipoActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_tipo'      => new sfWidgetFormFilterInput(),
      'descripcion_tipo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_tipo'      => new sfValidatorPass(array('required' => false)),
      'descripcion_tipo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoActividad';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre_tipo'      => 'Text',
      'descripcion_tipo' => 'Text',
    );
  }
}

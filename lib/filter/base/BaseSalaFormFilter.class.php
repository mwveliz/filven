<?php

/**
 * Sala filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSalaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_sala'      => new sfWidgetFormFilterInput(),
      'descripcion_sala' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_sala'      => new sfValidatorPass(array('required' => false)),
      'descripcion_sala' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sala_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sala';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre_sala'      => 'Text',
      'descripcion_sala' => 'Text',
    );
  }
}

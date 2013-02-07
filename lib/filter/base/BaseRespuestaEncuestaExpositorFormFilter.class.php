<?php

/**
 * RespuestaEncuestaExpositor filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRespuestaEncuestaExpositorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_item'   => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'respuesta' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_item'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Item', 'column' => 'id')),
      'respuesta' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('respuesta_encuesta_expositor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaEncuestaExpositor';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'id_item'   => 'ForeignKey',
      'respuesta' => 'Text',
    );
  }
}

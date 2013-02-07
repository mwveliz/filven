<?php

/**
 * OpcionRespuesta filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseOpcionRespuestaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_item'          => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'respuesta'        => new sfWidgetFormFilterInput(),
      'seleccion_simple' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_item'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Item', 'column' => 'id')),
      'respuesta'        => new sfValidatorPass(array('required' => false)),
      'seleccion_simple' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('opcion_respuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'OpcionRespuesta';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'id_item'          => 'ForeignKey',
      'respuesta'        => 'Text',
      'seleccion_simple' => 'Boolean',
    );
  }
}

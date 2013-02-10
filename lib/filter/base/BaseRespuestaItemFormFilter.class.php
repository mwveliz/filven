<?php

/**
 * RespuestaItem filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRespuestaItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_respuesta_encuesta' => new sfWidgetFormPropelChoice(array('model' => 'RespuestaEncuesta', 'add_empty' => true)),
      'valor'                 => new sfWidgetFormFilterInput(),
      'id_item'               => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'tipo_item'             => new sfWidgetFormFilterInput(),
      'id_opcion'             => new sfWidgetFormPropelChoice(array('model' => 'OpcionRespuesta', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_respuesta_encuesta' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RespuestaEncuesta', 'column' => 'id')),
      'valor'                 => new sfValidatorPass(array('required' => false)),
      'id_item'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Item', 'column' => 'id')),
      'tipo_item'             => new sfValidatorPass(array('required' => false)),
      'id_opcion'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'OpcionRespuesta', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('respuesta_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaItem';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'id_respuesta_encuesta' => 'ForeignKey',
      'valor'                 => 'Text',
      'id_item'               => 'ForeignKey',
      'tipo_item'             => 'Text',
      'id_opcion'             => 'ForeignKey',
    );
  }
}

<?php

/**
 * Item filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'numeracion'  => new sfWidgetFormFilterInput(),
      'texto'       => new sfWidgetFormFilterInput(),
      'tipo_item'   => new sfWidgetFormFilterInput(),
      'maximo'      => new sfWidgetFormFilterInput(),
      'id_encuesta' => new sfWidgetFormPropelChoice(array('model' => 'Encuesta', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'numeracion'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'texto'       => new sfValidatorPass(array('required' => false)),
      'tipo_item'   => new sfValidatorPass(array('required' => false)),
      'maximo'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_encuesta' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Encuesta', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'numeracion'  => 'Number',
      'texto'       => 'Text',
      'tipo_item'   => 'Text',
      'maximo'      => 'Number',
      'id_encuesta' => 'ForeignKey',
    );
  }
}

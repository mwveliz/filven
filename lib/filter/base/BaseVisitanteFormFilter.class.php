<?php

/**
 * Visitante filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseVisitanteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'numero'   => new sfWidgetFormFilterInput(),
      'id_feria' => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fecha'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'numero'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_feria' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('visitante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visitante';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'fecha'    => 'Date',
      'numero'   => 'Number',
      'id_feria' => 'ForeignKey',
    );
  }
}

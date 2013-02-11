<?php

/**
 * Encuesta form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class EncuestaForm extends BaseEncuestaForm
{
  public function configure()
  {
      $choices= array('Expositor'=>'Expositor' , 'Visitante'=> 'Visitante' );
      $this->widgetSchema['tipo_encuesta']= new sfWidgetFormChoice(array('choices' => $choices));
      
      $this->widgetSchema['descripcion_encuesta'] = new sfWidgetFormTextarea(array(), array('cols' => 40, 'rows' => 8));
          $this->widgetSchema['fecha_elaboracion']=  new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png', 'culture' => 'es', 
      'date_widget' => new sfWidgetFormDate(array('format' => '%day% / %month% / %year% ')),
      
        ));
      $this->validatorSchema['fecha_elaboracion'] = new sfValidatorPass();
      
      /*
      $this->widgetSchema['hora'] = new sfWidgetFormTime(array(
      'with_seconds' => true,'can_be_empty'=> false, 
      'format'       => '%hour% : %minute%',
      'default' => date('HH:mm')
    ));
*/
 $this->validatorSchema['_csrf_token'] = new sfValidatorPass();  
  }
}

<?php

/**
 * Place filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePlaceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'place_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maximum_capacity' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'place_name'       => new sfValidatorPass(array('required' => false)),
      'maximum_capacity' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('place_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Place';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'place_name'       => 'Text',
      'maximum_capacity' => 'Number',
    );
  }
}

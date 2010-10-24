<?php

/**
 * Coach filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCoachFormFilter extends AbstractPersonFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['classes_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'AbstractClass'));
    $this->validatorSchema['classes_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'AbstractClass', 'required' => false));

    $this->widgetSchema->setNameFormat('coach_filters[%s]');
  }

  public function addClassesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ClassPerCoach ClassPerCoach')
      ->andWhereIn('ClassPerCoach.abstract_class_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Coach';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'classes_list' => 'ManyKey',
    ));
  }
}

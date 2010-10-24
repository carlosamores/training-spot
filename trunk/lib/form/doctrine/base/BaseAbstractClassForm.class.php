<?php

/**
 * AbstractClass form base class.
 *
 * @method AbstractClass getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAbstractClassForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'place_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Place'), 'add_empty' => true)),
      'class_type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClassType'), 'add_empty' => true)),
      'day_of_the_week' => new sfWidgetFormChoice(array('choices' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6))),
      'start_hour'      => new sfWidgetFormChoice(array('choices' => array(7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24))),
      'end_hour'        => new sfWidgetFormChoice(array('choices' => array(7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24))),
      'start_min'       => new sfWidgetFormChoice(array('choices' => array(0 => 0, 5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55))),
      'end_min'         => new sfWidgetFormChoice(array('choices' => array(0 => 0, 5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55))),
      'clients_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Client')),
      'coaches_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Coach')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'place_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Place'), 'required' => false)),
      'class_type_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ClassType'), 'required' => false)),
      'day_of_the_week' => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6), 'required' => false)),
      'start_hour'      => new sfValidatorChoice(array('choices' => array(0 => 7, 1 => 8, 2 => 9, 3 => 10, 4 => 11, 5 => 12, 6 => 13, 7 => 14, 8 => 15, 9 => 16, 10 => 17, 11 => 18, 12 => 19, 13 => 20, 14 => 21, 15 => 22, 16 => 23, 17 => 24), 'required' => false)),
      'end_hour'        => new sfValidatorChoice(array('choices' => array(0 => 7, 1 => 8, 2 => 9, 3 => 10, 4 => 11, 5 => 12, 6 => 13, 7 => 14, 8 => 15, 9 => 16, 10 => 17, 11 => 18, 12 => 19, 13 => 20, 14 => 21, 15 => 22, 16 => 23, 17 => 24), 'required' => false)),
      'start_min'       => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 5, 2 => 10, 3 => 15, 4 => 20, 5 => 25, 6 => 30, 7 => 35, 8 => 40, 9 => 45, 10 => 50, 11 => 55), 'required' => false)),
      'end_min'         => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 5, 2 => 10, 3 => 15, 4 => 20, 5 => 25, 6 => 30, 7 => 35, 8 => 40, 9 => 45, 10 => 50, 11 => 55), 'required' => false)),
      'clients_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Client', 'required' => false)),
      'coaches_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Coach', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('abstract_class[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AbstractClass';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['clients_list']))
    {
      $this->setDefault('clients_list', $this->object->Clients->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['coaches_list']))
    {
      $this->setDefault('coaches_list', $this->object->Coaches->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveClientsList($con);
    $this->saveCoachesList($con);

    parent::doSave($con);
  }

  public function saveClientsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['clients_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Clients->getPrimaryKeys();
    $values = $this->getValue('clients_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Clients', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Clients', array_values($link));
    }
  }

  public function saveCoachesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['coaches_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Coaches->getPrimaryKeys();
    $values = $this->getValue('coaches_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Coaches', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Coaches', array_values($link));
    }
  }

}

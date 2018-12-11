<?php

/**
 * NewsList form base class.
 *
 * @method NewsList getObject() Returns the current form's model object
 *
 * @package    newslist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNewsListForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'newsdate'    => new sfWidgetFormDate(array('format'=> '%day%-%month%-%year%')),
      'newspicture' => new sfWidgetFormInputText()
     ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'newsdate'    => new sfValidatorDateTime(),
      'newspicture' => new sfValidatorPass(array('required' => false))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'NewsList', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('news_list[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsList';
  }

}

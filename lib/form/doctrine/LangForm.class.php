<?php

/**
 * Lang form.
 *
 * @package    newslist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LangForm extends BaseLangForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
         'shortname'=> 'Короткое название',
         'fullname' => 'Полное название'
    ));

  }
}

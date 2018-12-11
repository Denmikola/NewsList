<?php

/**
 * LangS actions.
 *
 * @package    newslist
 * @subpackage LangS
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LangSActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->langs = Doctrine_Core::getTable('lang')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->lang = Doctrine_Core::getTable('lang')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->lang);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new langForm();
   }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new langForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    Doctrine_Core::getTable('lang')->SetupDef($request->getParameter('lid'));
    $this->redirect('NewsL/'.$request->getParameter('pos')
                     .'?lid='.$request->getParameter('lid')
                     .'&id='.$request->getParameter('id')
                     .'&nid='.$request->getParameter('nid'));
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($lang = Doctrine_Core::getTable('lang')->find(array($request->getParameter('id'))), sprintf('Object lang does not exist (%s).', $request->getParameter('id')));
    $this->form = new langForm($lang);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($lang = Doctrine_Core::getTable('lang')->find(array($request->getParameter('id'))), sprintf('Object lang does not exist (%s).', $request->getParameter('id')));
    $lang->delete();

    $this->redirect('LangS/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $lang = $form->save();

      $this->redirect('NewsL/index');
    }
  }
}

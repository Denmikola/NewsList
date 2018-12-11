<?php

/**
 * NewsL actions.
 *
 * @package    newslist
 * @subpackage NewsL
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsLActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
    $this->langs = Doctrine_Core::getTable('lang')->getLangs();
    $this->newslists = Doctrine_Core::getTable('newslist')->getNewsList();  

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->langs = Doctrine_Core::getTable('lang')->getLangs();
    $this->newslist = Doctrine_Core::getTable('newslist')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->newslist);
    $this->new = Doctrine_Core::getTable('news')->getNew($request->getParameter('id'),$request->getParameter('lid'));
     ///Doctrine_Core::getTable('news')->find(array($request->getParameter('nid')));
    $this->forward404Unless($this->new);
   }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new newslistForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new newslistForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($newslist = Doctrine_Core::getTable('newslist')->find(array($request->getParameter('id'))), sprintf('Object newslist does not exist (%s).', $request->getParameter('id')));
    $this->form = new newslistForm($newslist);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($newslist = Doctrine_Core::getTable('newslist')->find(array($request->getParameter('id'))), sprintf('Object newslist does not exist (%s).', $request->getParameter('id')));
    $this->form = new newslistForm($newslist);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($newslist = Doctrine_Core::getTable('newslist')->find(array($request->getParameter('id'))), sprintf('Object newslist does not exist (%s).', $request->getParameter('id')));
    $newslist->delete();

    $this->redirect('NewsL/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $newslist = $form->save();

      $this->redirect('news/new?lnum=0&nid='.$newslist->getId());
    }
  }
}

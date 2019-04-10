<?php
require_once ('Views/view.php');
class HomeController
{
    private $_articleManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            throw new Exception('Page introuvable');
        }else{
            $this->indexAction();
        }

    }

    private function indexAction()
    {
        $this->_articleManager = new ArticleManager();
        $articles = $this->_articleManager->getArticles();

        $this->_view = new View('Home');
        $this->_view->generate(array('articles' => $articles));
    }
}
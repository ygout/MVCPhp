<?php

class HomeController
{
    private $_articleManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url)>1)
        {
            throw new Exception('Page introuvable');
        }

    }

    public function Artilces()
    {
        $this->_articleManager = new ArticleManager();
        $articles = $this->_articleManager->getArticles();

        require_once('views/homeView.php');
    }
}
<?php

    class mainController
    {
        public $request;
        public $view;
        public $layout;
        public $debug;

        public function __construct()
        {
            $this->request = new Request();
            $this->view = new View();
            $this->layout = new Layout();
            $this->debug = new Debug();

            if (!isset($_SESSION['login']) && ( ( $this->request->getParam('action') !== 'login' ) && ( $this->request->getParam('action') !== 'register' ) ) ) {
                header ("Location:" . Url::getUrl('login', 'login'));
            }
        }
    }


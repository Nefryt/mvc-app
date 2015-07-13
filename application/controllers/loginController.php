<?php

    class loginController extends mainController {

        public function loginAction() {
            $Login = new Login();

            $login = $this->request->getPost('login');
            $password = md5( $this->request->getPost('password') );

            if ($login == NULL || $password == NULL)   {

            }

            else {

                if (!($Login->getPass($login, $password))) {
                    header('location:' . Url::getUrl('login', 'login', array ('status' => 2) ));
                }
                else {
                    header('location:' . Url::getUrl('car', 'index', array ('status' => 1) ));
                }
            }
            $this->view->display( 'login' );
        }

        public function logoutAction() {
            if (session_destroy())  {
                header('location:' . Url::getUrl('login', 'login', array ('status' => 3) ));
            }
        }
    }
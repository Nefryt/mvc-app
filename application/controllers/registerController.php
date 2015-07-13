<?php

    class registerController extends mainController {

        public function registerAction() {
            $user = new Register();

            $email = $this->request->getPost('email');
            $login = $this->request->getPost('login');
            $password = md5($this->request->getPost('password'));

            if ($email == NULL && $login == NULL && $password == NULL)  {

            }

            else if($email == NULL || $login == NULL || $password == NULL) {

            }

            else {
                if ( $user->saveUser($email, $login, $password) ) {
                    header('location=' . Url::getUrl('login', 'login', array ('status' => 4) ));
                }
                else
                    header('location=' . Url::getUrl('register', 'register', array ('status' => 5) ));
            }
            $this->view->display( 'register_form' );
        }

    }
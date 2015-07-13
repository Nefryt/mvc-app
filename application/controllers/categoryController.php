<?php

    class categoryController extends mainController {

        public function listAction() {
            $Categories = new Category();
            $this->view->data = $Categories->getCategory();
            $this->view->display( 'list_cat' );
        }

        public function addAction() {
            $Category = new Category();
            $this->view->data = $Category->getCategory();

            $marka = $this->request->getPost('category');

            if ( $marka == NULL )   {
                $this->view->display( 'add_cat' );
            }
            else {
                $Category->saveCategory($marka);
                header('location: ' . Url::getUrl('category', 'list', array('status' => 9) ));
            }
        }

        public function deleteAction() {
            $request = new Request();
            $id = $request->getParam('id');

            $Category = new Category();
            $Category->deleteCategory($id);

            header('location: ' . Url::getUrl('category', 'list', array('status' => 10) ));
        }

    }
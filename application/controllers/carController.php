<?php

    class carController extends mainController {

        public function indexAction() {
            if ( isset($_SESSION['login']) )
                $this->view->display('index');
        }

        public function listAction()
        {
            $model = new Cars();
            $page = $this->request->getParam( 'page', 1 );
            $limit = 3;
            $from = ( $page - 1 ) * $limit;

            $this->view->pagerConfig = array
            (
                'url' => Url::getUrl( 'car', 'list', array
                (
                    'page' => 'key_page'
                )),
                'count' => $model->carCount(),
                'pack' => $limit,
                'page' => $page
            );

            $this->view->data = $model->getCarsWithLimit( $from, $limit );

            $this->view->display( 'list' );
        }

        public function addAction() {
            $config = Config::getInstance();
            $config = $config->getConfig();

            $Cars = new Cars();
            $this->view->data = $Cars->getCategory();

            $model = $this->request->getPost('model');
            $marka = $this->request->getPost('marka_id');
            $opis = $this->request->getPost('opis');
            $zdjecie = $this->request->getFiles('zdjecie');

            if ( $model == NULL && $marka == NULL && $opis == NULL && $zdjecie == NULL )  {
                $this->view->display ( 'add' );
            }
            else if ( $model == NULL || $marka == NULL || $opis == NULL || $zdjecie == NULL ){
                echo "Uzupelnij wszystkie pola";
            }
            else {
                $podpis = date("Y-m-d G:i:s", time());
                $zdjecie = WideImage::loadFromUpload('zdjecie');
                $zdjecie->saveToFile( $config['DOC_ROOT'] . $config['CUSTOM_IMG_DIR'] . $podpis . '.png' );

                $Car = new Cars();
                $Car->saveCar($model, $marka, $opis, $podpis);

                header('location: ' . Url::getUrl('car', 'list', array('status' => 8) ));
            }
        }

        public function deleteAction() {
            $id = $this->request->getParam('id');

            $Cars = new Cars();
            $Cars->deleteCar($id);

            header('location: ' . Url::getUrl('car', 'list', array('status' => 7) ));
        }

        public function editAction() {
            $Car = new Cars();
            $this->view->data = $Car->getCategory();

            $new_model = $this->request->getPost('model');
            $new_marka = $this->request->getPost('marka_id');
            $new_opis = $this->request->getPost('opis');
            $id = $this->request->getPost('id');
            $is_photo = $this->request->getFiles('zdjecie');

            if ( $new_model == NULL && $new_marka == NULL && $new_opis == NULL && $is_photo == NULL )  {
                $this->view->display ( 'edit' );
            }
            else {
                $Car->updateCar($new_model, $new_marka, $new_opis, $is_photo, $id);
                header('location:' . Url::getUrl('car', 'list', array('status' => 6) ));
            }
        }
    }
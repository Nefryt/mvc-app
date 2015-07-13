<?php

    class Cars extends Model
    {
        public function getCars()
        {
            $sth = $this->db->prepare('SELECT samochody_id, marka_id, model, opis, nazwa, podpis FROM kategorie JOIN samochody ON kategorie.id = samochody.marka_id ');
            $sth->execute();
            return $sth->fetchAll();
        }

        public function getCarsWithLimit($from, $limit)
        {
            $sth = $this->db->prepare('SELECT samochody_id, marka_id, model, opis, nazwa, podpis FROM kategorie JOIN samochody ON kategorie.id = samochody.marka_id ORDER BY samochody.samochody_id DESC LIMIT '.$from.', '.$limit.'' );
            $sth->execute();
            return $sth->fetchAll();
        }

        public function getCategory() {
            $sth = $this->db->prepare('SELECT * FROM kategorie');
            $sth->execute();
            return $sth->fetchAll();
        }

        public function saveCar($model, $marka, $opis, $podpis) {
            $stmt = $this->db->prepare("INSERT INTO `samochody`(`marka_id`, `model`, `opis`, `podpis`)
            VALUES (:marka_id, :model, :opis, :podpis)");

            $stmt->bindParam( ':marka_id', $marka );
            $stmt->bindParam( ':model', $model );
            $stmt->bindParam( ':opis', $opis );
            $stmt->bindParam( ':podpis', $podpis );

            $stmt->execute();
        }

        public function deleteCar($id) {
            $query = "DELETE FROM samochody WHERE samochody_id = :id";
            $sth = $this->db->prepare($query);
            $sth->bindParam(':id', $id);
            $sth->execute();

            return ;
        }

        public function updateCar($new_model, $new_marka, $new_opis, $is_photo, $id)
        {
            $query = "SELECT * FROM samochody WHERE samochody_id=:id";
            $sth = $this->db->prepare($query);
            $sth->bindParam(':id', $id);
            $sth->execute();
            $car = $sth->fetch();

            if ( empty($new_model) ) {
                $model = $car['model'];
            }
            else
                $model = $new_model;

            if ( empty($new_marka) ) {
                $marka = $car['marka_id'];
            }
            else
                $marka = $new_marka;

            if ( empty($new_opis) ) {
                $opis = $car['opis'];
            }
            else
                $opis = $new_opis;

            if ( $is_photo['error'] == 4 )  {
                $podpis = $car['podpis'];
            }
            else {
                $zdjecie = WideImage::loadFromUpload('zdjecie');

                $config = Config::getInstance();
                $config = $config->getConfig();

                $old_podpis  = $config['IMG_DIR'] . $car[ 'podpis' ] . '.png';
                unlink($old_podpis);
                $podpis = date("Y-m-d G:i:s", time());
                $zdjecie->saveToFile( $config['DOC_ROOT'] . $config['CUSTOM_IMG_DIR'] . $podpis . '.png' );
            }

            $update_query = "UPDATE samochody SET marka_id=:marka, model=:model, opis=:opis, podpis=:podpis WHERE samochody_id=:id" ;
            $up = $this->db->prepare($update_query);
            $up->bindParam(':marka', $marka );
            $up->bindParam(':model', $model );
            $up->bindParam(':opis', $opis );
            $up->bindParam(':podpis', $podpis );
            $up->bindParam(':id', $id);
            $up->execute();

        }

        public function carCount() {
            $sth = $this->db->prepare('SELECT COUNT(*) AS count FROM samochody');
            $sth->execute();
            $result = $sth->fetch();

            return $result['count'];
        }
    }
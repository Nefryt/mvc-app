<?php

    class Category extends Model {

        public function getCategory() {
            $sth = $this->db->prepare('SELECT * FROM kategorie');
            $sth->execute();

            return $sth->fetchAll();
        }

        public function saveCategory($category) {
            $sth = $this->db->prepare("INSERT INTO `kategorie`(`nazwa`)
            VALUES (:category)");

            $sth->bindParam( ':category', $category );
            $sth->execute();

            return ;
        }

        public function deleteCategory($id) {
            $sth = $this->db->prepare("DELETE FROM kategorie WHERE id=" . $id);
            $sth->execute();

            return ;
        }

    }
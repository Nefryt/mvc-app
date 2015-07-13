<?php

    class Register extends Model {

        public function saveUser($email, $login, $password) {
            $query = "INSERT INTO users (email, login, password)
            VALUES (:email, :login, :password)";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $password);

            if ( $stmt->execute() ) {
                return true;
            }
            else
                return false;
        }

    }
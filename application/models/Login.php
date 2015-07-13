<?php

    class Login extends Model {

        public function getPass($login, $password) {
            $query = "SELECT * FROM users WHERE login=:login AND password=:password";
            $sth = $this->db->prepare($query);

            $sth->bindParam(':login', $login);
            $sth->bindParam(':password', $password);
            $sth->execute();

            $result = $sth->fetch();

            if ( $result['login'] != $login || $result['password'] != $password ) {
                return false;
            }
            else {
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;

                return true;
            }

        }

    }
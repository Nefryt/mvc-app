<?php

    class Debug {

        public static function p($var, $die = false)
        {
            echo '<pre>';

            if( !$var ) {
                var_dump( $var );
            } else {
                print_r( $var );
            }

            echo '</pre>';

            if($die) {
                die;
            }
        }

    }
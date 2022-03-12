<?php
    class Validacion {
        // Funcion para validar el nombre completo. Uso como CALLBACK en FILTER_VAR
        // Formaro fullname: apellido, nombre
        public static function validateFullName( $fullName ) {
            if ( strpos( $fullName, ',' ) === false ) return false;
            $dataList = explode( ',', $fullName );
            if ( count( $dataList ) !== 2 ) return false;
            list( $lastName, $firstName ) = $dataList;
            $vacio = empty(trim($lastName)) || empty(trim($firstName));
            $nostring = !is_string($lastName) || !is_string($firstName);

            return ( $vacio || $nostring ) ? false : $fullName;
        }

        // Funcion para validar el nombre completo. Uso como CALLBACK en FILTER_VAR
        // Formaro fullname: apellido, nombre. No permite digitos
        public static function validateAllName ( $fullName ) {
            if ( preg_match( '/^[A-Za-z]+, [A-Za-z]+$/', $fullName ) ) return $fullName;
            else return false;
        }

        // Validar un campo en base a otros campos y/o valores
        public static function validatePareja($casado = null) {
            return function ($value) use ($casado) {
                if ( empty($casado) ) return true; // Omite validación 
                if ( $casado === 'NO' ) return true; // Omite validación
                if ( $casado === 'SI' ) {
                    if ( preg_match( '/^[A-Za-z]+, [A-Za-z]+$/', $value ) ) return $value;
                }

                return false;
            };
        }
    }
?>
<?php

class Conexion{
    static public function conectar(){
        $sdk = new Aws\Sdk([
            'endpoint'   => 'http://localhost:8000',
            'region'   => 'us-east-1',
            'version'  => 'latest'
        ]);
        return $sdk;
    } 
}
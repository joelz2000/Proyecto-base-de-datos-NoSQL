<?php

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;
use Phpml\Regression\LeastSquares;
require_once "conexion.php";

class PrediccionModel{

    /**
     * 
     * Creacion de tabla
     * 
     */
    static public function mdlCrearTablaPrediccion($tableName){
        $sdk = Conexion::conectar();
        $dynamodb = $sdk->createDynamoDb();
        $params = [
            'TableName' => $tableName,
            'KeySchema' => [
                [
                    'AttributeName' => 'id',
                    'KeyType' => 'HASH'  //Partition key
                ]
            ],
            'AttributeDefinitions' => [
                [
                    'AttributeName' => 'id',
                    'AttributeType' => 'N'
                ]
        
            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits' => 80,
                'WriteCapacityUnits' => 80
            ]
        ];


       /* $params = [
            'TableName' => $tableName,
            'KeySchema' => [
                [
                    'AttributeName' => 'samples',
                    'KeyType' => 'HASH'  //Partition key
                ]
            ],
            'AttributeDefinitions' => [
                [
                    'AttributeName' => 'samples',
                    'AttributeType' => 'N'
                ]
        
            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits' => 10,
                'WriteCapacityUnits' => 10
            ]
        ];
        */
        try {
            $result = $dynamodb->createTable($params);
            echo 'Tabla Creada.  Estado: ' . 
                $result['TableDescription']['TableStatus'] ."\n";
        
        } catch (DynamoDbException $e) {
            echo "Unable to create table:\n";
            echo $e->getMessage() . "\n";
        }
    }
    
    /**
     * 
     * Model cargar datos a BD
     * 
    */
    static public function mdlCargarDatosPrediccion($tableName, $datos){


        $sdk = Conexion::conectar();
        $dynamodb = $sdk->createDynamoDb();
        $marshaler = new Marshaler();   
        foreach ($datos as $dato) {
            
            $id = $dato['id'];
            $Nombre = $dato['Nombre'];
            $Precio = $dato['Precio'];
            $CantidadVentas = $dato['CantidadVentas'];
            $Categoria = $dato['Categoria'];
            $Marca = $dato['Marca'];
            $Descripcion = $dato['Descripcion'];
            $Distribuidor = $dato['Distribuidor'];
            $Medida = $dato['Medida'];
            $Colores = $dato['Colores'];
            $Target = $dato['Target'];
            
          /*  $id = $dato['id'];
            $Descripcion = $dato['Descripcion'];
            $Marca = $dato['Marca'];
            $precio = $dato['Precio'];
            $color = $dato['Color'];
            $pantalla = $dato['Pantalla'];
            $consolas = $dato['Consolas'];
            $videojuegos = $dato['VideoJuegos'];
            $muebles = $dato['Muebles'];
            $pantalones = $dato['Pantalones'];
            $camisas = $dato['Camisas'];
            $celulares = $dato['Celulares'];
            $telefonia = $dato['Telefonia'];
            $laptiops = $dato['laptops'];
            $desktops = $dato['desktops'];
            $target = $dato['target'];
           */
            $json = json_encode([
                "id" => $id,
                "Nombre" =>  $Nombre,
                "Precio" => $Precio,
                "CantidadVentas" => $CantidadVentas,
                "Categoria" => $Categoria,
                "Marca" => $Marca,
                "Descripcion" => $Descripcion,
                "Distribuidor" => $Distribuidor,
                "Medida" => $Medida,
                "Colores" => $Colores,
                "Target" => $Target
            ]);

            $params = [
                'TableName' => $tableName,
                'Item' => $marshaler->marshalJson($json)
            ];

            /*
            $samples = $dato['samples']; 
            $targets = $dato['targets'];
        
            $json = json_encode([
                'samples' => $samples,
                'targets' => $targets
            ]);

            $params = [
                'TableName' => $tableName,
                'Item' => $marshaler->marshalJson($json)
            ];
            */
            try {
                $result = $dynamodb->putItem($params);
                echo "Carga de datos de id: " . $dato['id'] . "<br>";
            } catch (DynamoDbException $e) {
                
                echo $e->getMessage() . "<br>";
                break;
            }

            
        }

    }

    /**
     * 
     * Mostar datos prediccion ejemplo
     * 
     */

    static public function mdlMostrarDatosPrediccion($tableName){
        $sdk = Conexion::conectar();
        $dynamodb = $sdk->createDynamoDb();
        $marshaler = new Marshaler(); 

        $params = [
            'TableName' => $tableName,
            //datos que se quiere mostrar
            'ProjectionExpression' => 
                '#id, 
                Nombre,
                Precio,
                CantidadVentas,
                Categoria,
                Marca,
                Descripcion,
                Distribuidor,
                Medida,
                Colores,
                Target
                
            ', 
        /*$params = [
            'TableName' => $tableName,
            //datos que se quiere mostrar
            'ProjectionExpression' => 
                '#id, 
                Descripcion,
                Marca,
                Precio,
                Color,
                Pantalla,
                Consolas,
                VideoJuegos,
                Muebles,
                Pantalones,
                Camisas,
                Celulares,
                Telefonia,
                laptops,
                desktops,
                target
                
            ', */
            /*'FilterExpression' => '#yr between :start_yr and :end_yr',*/
            'ExpressionAttributeNames'=> [ '#id' => 'id' ],
            /*'ExpressionAttributeValues'=> $eav*/
        ];

       /* $params = [
            'TableName' => $tableName,
            'ProjectionExpression' => '#samples, targets', //datos que se quiere mostrar
            /*'FilterExpression' => '#yr between :start_yr and :end_yr',*/
            //'ExpressionAttributeNames'=> [ '#samples' => 'samples' ],
            /*'ExpressionAttributeValues'=> $eav*/
        //];
        


        //echo "Scanning prediccion table.</br>";
        
        $result = $dynamodb->scan($params);
        return $result;

       /* try {
            while (true) {
                $result = $dynamodb->scan($params);
        
                foreach ($result['Items'] as $i) {
                    $prediccion = $marshaler->unmarshalItem($i);
                    echo $prediccion['samples'] . ': ' . $prediccion['targets'] . '<br>';
                }
        
                if (isset($result['LastEvaluatedKey'])) {
                    $params['ExclusiveStartKey'] = $result['LastEvaluatedKey'];
                } else {
                    break;
                }
            }
        
        } catch (DynamoDbException $e) {
            echo "Unable to scan:<br>";
            echo $e->getMessage() . "<br>";
        }  */
    }
}
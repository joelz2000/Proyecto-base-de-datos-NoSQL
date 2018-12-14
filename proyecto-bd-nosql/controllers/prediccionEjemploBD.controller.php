<?php
declare(strict_types=1);
include 'libs/ML/vendor/autoload.php';
use Phpml\Regression\LeastSquares;
use Aws\DynamoDb\Marshaler;



class ControllerPrediccionEjemplo{


     /**
     * 
     * Crear tabla
     * 
     */

    static function ctrCrearTablaPrediccionEjemplo(){
        $tableName = 'TiendaProyectoNoSQL';
        $respuesta = PrediccionEjemploModel::mdlCrearTablaPrediccionEjemplo($tableName);
        return $respuesta;
    }

    /**
     * 
     * Carga de datos
     */
    static function ctrCargarDatosPrediccionEjemplo(){

        $tableName = 'TiendaProyectoNoSQL';
        $datos = json_decode(file_get_contents('DatosProyecto.json'), true);
        $respuesta = PrediccionEjemploModel::mdlCargarDatosPrediccionEjemplo($tableName,$datos );
        return $respuesta;
    }

    /**
     * 
     * Mostrar datos predicicon ejemplo
     * 
     */

    static public function ctrMostrarDatosPrediccionEjemplo(){
        $marshaler = new Marshaler();  
        $tableName = 'TiendaProyectoNoSQL';
        $respuesta = PrediccionEjemploModel::mdlMostrarDatosPrediccionEjemplo($tableName);
        
        foreach ($respuesta['Items'] as $i) {
            $prediccion = $marshaler->unmarshalItem($i);
          
            echo '
            <tr>
                <td>'.$prediccion['id'].'</td>
                <td>'.$prediccion['Descripcion'].'</td>
                <td>'.$prediccion['Marca'].'</td>
                <td>'.$prediccion['Precio'].'</td>
                <td>'.$prediccion['Color'].'</td>
                <td>'.$prediccion['Pantalla'].'</td>
                <td>'.$prediccion['Consolas'].'</td>
                <td>'.$prediccion['VideoJuegos'].'</td>
                <td>'.$prediccion['Muebles'].'</td>
                <td>'.$prediccion['Pantalones'].'</td>
                <td>'.$prediccion['Camisas'].'</td>
                <td>'.$prediccion['Celulares'].'</td>
                <td>'.$prediccion['Telefonia'].'</td>
                <td>'.$prediccion['laptops'].'</td>
                <td>'.$prediccion['desktops'].'</td>
                <td>'.$prediccion['target'].'</td>

            </tr>
            ';
            //echo "Sample = " . $prediccion['samples']. ", Target = ". $prediccion['targets']. "<br>"; 
        }
    }


    /**
     * 
     * Mostrar prediccion de los datos de la BD 
     * 
     */
   
    static public function ctrMostrarPrediccionEjemplo(){
        $marshaler = new Marshaler();  
        $regression = new LeastSquares(); 
        $tableName = 'Ejemplo';
        $datos = PrediccionEjemploModel::mdlMostrarDatosPrediccionEjemplo($tableName);
        
        foreach ($datos['Items'] as $i) {
            $prediccion = $marshaler->unmarshalItem($i);
            $samples = $prediccion['samples'];
            $targets = $prediccion['targets'];

            $s[] = array($samples);
            $t[] = array($targets);
        }
        //echo is_array($s) ? 'Array' : 'No es un array';

     
        $regression->train($s, $t);
        $result = $regression->predict([64]);
        echo "Prediccion = " .round($result,2);
    }


}
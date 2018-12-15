<?php
declare(strict_types=1);
include 'libs/ML/vendor/autoload.php';
use Phpml\Regression\LeastSquares;
use Aws\DynamoDb\Marshaler;



class ControllerPrediccion{


     /**
     * 
     * Crear tabla
     * 
     */

    static function ctrCrearTablaPrediccion(){
        $tableName = 'TiendaProyectoNoSQL';
        $respuesta = PrediccionModel::mdlCrearTablaPrediccion($tableName);
        return $respuesta;
    }

    /**
     * 
     * Carga de datos
     */
    static function ctrCargarDatosPrediccion(){

        $tableName = 'TiendaProyectoNoSQL';
        $datos = json_decode(file_get_contents('datosProductos.json'), true);
        $respuesta = PrediccionModel::mdlCargarDatosPrediccion($tableName,$datos );
        return $respuesta;
    }

    /**
     * 
     * Mostrar datos predicicon 
     * 
     */

    static public function ctrMostrarDatosPrediccion(){
        $marshaler = new Marshaler();  
        $tableName = 'TiendaProyectoNoSQL';
        $respuesta = PrediccionModel::mdlMostrarDatosPrediccion($tableName);
        
        foreach ($respuesta['Items'] as $i) {
            $prediccion = $marshaler->unmarshalItem($i);
           
            echo '
            <tr>
                <td>'.$prediccion['id'].'</td>
                <td>'.$prediccion['Nombre'].'</td>
                <td>'.$prediccion['Precio'].'</td>
                <td>'.$prediccion['CantidadVentas'].'</td>
                <td>'.$prediccion['Categoria'].'</td>
                <td>'.$prediccion['Marca'].'</td>
                <td>'.$prediccion['Descripcion'].'</td>
                <td>'.$prediccion['Distribuidor'].'</td>
                <td>'; 
                    for ($m=0; $m < count($prediccion['Medida']) ; $m++) { 
                        echo $prediccion['Medida'][$m];
                        if($m == 0){
                            echo ', ';
                        }
                    }
                echo '
                </td>
                <td>';
                    for ($c=0; $c < count($prediccion['Colores']) ; $c++) { 
                        echo $prediccion['Colores'][$c];
                        if($c == 0){
                            echo ', ';
                        }
                    }
                echo'
                </td>
                <td>'.$prediccion['Target'].'</td>

            </tr>
            ';

           /* echo '
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
            ';*/
            //echo "Sample = " . $prediccion['samples']. ", Target = ". $prediccion['targets']. "<br>"; 
        }
    }


    /**
     * 
     * Mostrar prediccion de los datos de la BD 
     * 
     */
   
    static public function ctrMostrarPrediccion(){
        $marshaler = new Marshaler();  
        $regression = new LeastSquares(); 
        $tableName = 'TiendaProyectoNoSQL';
        $datos = PrediccionModel::mdlMostrarDatosPrediccion($tableName);
        
        foreach ($datos['Items'] as $i) {
            $prediccion = $marshaler->unmarshalItem($i);
            $samples = $prediccion['id'];
            $targets = $prediccion['CantidadVentas'];

            $s[] = array($samples);
            $t[] = array($targets);
        }
        //echo is_array($s) ? 'Array' : 'No es un array';

     
        $regression->train($s, $t);
        $result = $regression->predict([2]);
        echo "Prediccion = " .round($result,2);
    }


}
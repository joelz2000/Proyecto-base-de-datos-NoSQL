<?php
declare(strict_types=1);
include 'libs/ML/vendor/autoload.php';

use Phpml\Regression\LeastSquares;

class ControllerPrediccion{
    public function mostrarPrediccion(){
        $samples = [[60], [61], [62], [63], [65]];
        $targets = [3.1, 3.6, 3.8, 4, 4.1];

        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $result = $regression->predict([64]);
        echo round($result,2);
    }

    public function mostrarPrediccionJSON($samples, $targets){
      
        echo is_array($s) ? 'Array' : 'No es un array';
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $result = $regression->predict([64]);
        echo round($result,2);
    }
}

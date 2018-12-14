<?php


    $p = new ControllerPrediccionEjemplo();
    $p->ctrCargarDatos();

/*use Aws\DynamoDb\Exception\DynamoDbException;
    use Aws\DynamoDb\Marshaler;
    use Phpml\Regression\LeastSquares;
    
$sdk = new Aws\Sdk([
    'endpoint'   => 'http://localhost:8000',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();
$marshaler = new Marshaler();
$regression = new LeastSquares();


$tableName = 'Ejemplo';

$movies = json_decode(file_get_contents('ejemplo.json'), true);

$s; 
$t;
    
foreach ($movies as $movie) {

    $samples = $movie['samples']; 
    $targets = $movie['targets'];
   
    $json = json_encode([
        'samples' => $samples,
        'targets' => $targets
    ]);

    $params = [
        'TableName' => $tableName,
        'Item' => $marshaler->marshalJson($json)
    ];
    
    try {
        $result = $dynamodb->putItem($params);
        echo "Samples: " . $movie['samples'] . " targets: " . $movie['targets'] . "<br>";
    } catch (DynamoDbException $e) {
        echo "Unable to add movie:<br>";
        echo $e->getMessage() . "<br>";
        break;
    }

    $s[] = array($samples);
    $t[] = array($targets);
    
}

$regression->train($s,$t);

$result = $regression->predict([64]);
echo round($result,2);
*/
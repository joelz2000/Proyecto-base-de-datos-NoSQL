

<?php

    use Aws\DynamoDb\Exception\DynamoDbException;
    use Aws\DynamoDb\Marshaler;
    use Phpml\Regression\LeastSquares;
    
    
?>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>
       Crear tablas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <h3>
            <?php
                $prediccion = new ControllerPrediccionEjemplo();
                $prediccion-> ctrCrearTablaPrediccionEjemplo();
            ?>
            </h3>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--
$sdk = new Aws\Sdk([
    'endpoint'   => 'http://localhost:8000',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();

$params = [
    'TableName' => 'Ejemplo',
    'KeySchema' => [
        [
            'AttributeName' => 'samples',
            'KeyType' => 'HASH'  //Partition key
        ],
        [
            'AttributeName' => 'targets',
            'KeyType' => 'RANGE'  //Sort key
        ]
    ],
    'AttributeDefinitions' => [
        [
            'AttributeName' => 'samples',
            'AttributeType' => 'N'
        ],
        [
            'AttributeName' => 'targets',
            'AttributeType' => 'N'
        ],

    ],
    'ProvisionedThroughput' => [
        'ReadCapacityUnits' => 10,
        'WriteCapacityUnits' => 10
    ]
];

try {
    $result = $dynamodb->createTable($params);
    echo 'Created table.  Status: ' . 
        $result['TableDescription']['TableStatus'] ."\n";

} catch (DynamoDbException $e) {
    echo "Unable to create table:\n";
    echo $e->getMessage() . "\n";
}
-->


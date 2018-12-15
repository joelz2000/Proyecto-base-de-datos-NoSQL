

<?php


    use Aws\DynamoDb\Exception\DynamoDbException;
    use Aws\DynamoDb\Marshaler;
    use Phpml\Regression\LeastSquares;
        

    
?>
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>Eliminar tablas</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Eliminar tablas</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <h3>
            <?php
               $sdk = new Aws\Sdk([
                'endpoint'   => 'http://localhost:8000',
                'region'   => 'us-east-1',
                'version'  => 'latest'
                ]);
            
                $dynamodb = $sdk->createDynamoDb();
            
                $params = [
                    'TableName' => 'TiendaProyectoNoSQL'
                ];
            
                try {
                    $result = $dynamodb->deleteTable($params);
                    echo "Tabla eliminada.\n";
            
                } catch (DynamoDbException $e) {
                    echo "Unable to delete table:\n";
                    echo $e->getMessage() . "\n";
                }
        
            ?>
            </h3>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
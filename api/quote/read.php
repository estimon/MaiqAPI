<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/DB.php';
    include_once '../../models/Quote.php';
    $database = new DB();
    $db = $database->connect();

    $quote = new Quote($db);

    $result = $quote->read();
    $num = $result->rowCount();
    if($num > 0) {
        $quote_arr = array();
        $quote_arr['data'] = array();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
    
          $quote_item = array(
            'id' => $id,
            'tekst' => html_entity_decode($tekst),
          );
          array_push( $quote_arr['data'], $quote_item);
        }
    }
    echo json_encode($quote_arr);

<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/DB.php';
    include_once '../../models/Quote.php';
    $database = new DB();
    $db = $database->connect();

    $quote = new Quote($db);
    $quote->id = isset($_GET['id']) ? $_GET['id'] : die();
    $quote->read_single();
    $quote_arr = array(
        'id' => $quote->id,
        'tekst' => $quote->tekst,
    );
    print_r(json_encode($quote_arr));

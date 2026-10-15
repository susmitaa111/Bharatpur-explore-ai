<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__.'/../includes/functions.php';
$input=json_decode(file_get_contents('php://input'),true) ?: $_POST; $text=trim($input['text']??'');
echo json_encode(['success'=>$text!=='','sentiment'=>$text!==''?simple_sentiment($text):null,'method'=>'transparent keyword demo; replace with NLP/LLM for production']);

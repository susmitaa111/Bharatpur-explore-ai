<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__.'/../includes/config.php'; require __DIR__.'/../includes/functions.php';
$input=json_decode(file_get_contents('php://input'),true) ?: $_POST;
$prefs=['days'=>(int)($input['days']??2),'budget'=>$input['budget']??'NPR 2,000–5,000','group'=>$input['group']??'Couple','interests'=>$input['interests']??['Nature'],'transport'=>$input['transport']??'Taxi/Ride','start'=>$input['start']??'Central Bharatpur'];
echo json_encode(['success'=>true,'model'=>'transparent-rule-based-v1','scoring'=>['interestMatch'=>40,'budgetMatch'=>20,'timeMatch'=>20,'groupMatch'=>10,'rating'=>10],'preferences'=>$prefs,'recommendations'=>recommend_places($prefs,8),'itinerary'=>build_itinerary($prefs)],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

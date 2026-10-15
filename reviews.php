<?php
require __DIR__.'/includes/config.php'; require __DIR__.'/includes/functions.php';
if(!isset($_SESSION['reviews'])) $_SESSION['reviews']=[
 ['place_id'=>1,'rating'=>5,'text'=>'Beautiful sunset and friendly atmosphere.','sentiment'=>'Positive'],
 ['place_id'=>2,'rating'=>4,'text'=>'Nice nature stop but transport took some time.','sentiment'=>'Positive'],
 ['place_id'=>7,'rating'=>3,'text'=>'Food was okay and service was average.','sentiment'=>'Neutral'],
];
if($_SERVER['REQUEST_METHOD']==='POST'){
 $text=trim($_POST['review']??''); if($text!==''){$_SESSION['reviews'][]=['place_id'=>(int)($_POST['place_id']??0),'rating'=>(int)($_POST['rating']??5),'text'=>$text,'sentiment'=>simple_sentiment($text)]; $_SESSION['flash']='Review added';}
 header('Location: reviews.php'); exit;
}
$reviews=$_SESSION['reviews']; $counts=['Positive'=>0,'Neutral'=>0,'Negative'=>0]; foreach($reviews as $r)$counts[$r['sentiment']]++; $total=max(1,count($reviews));
$topics=['Cleanliness'=>0,'Food'=>0,'Transportation'=>0,'Hospitality'=>0,'Safety'=>0,'Service quality'=>0];
foreach($reviews as $r){$t=strtolower($r['text']); if(str_contains($t,'clean'))$topics['Cleanliness']++; if(str_contains($t,'food'))$topics['Food']++; if(str_contains($t,'transport'))$topics['Transportation']++; if(str_contains($t,'friendly')||str_contains($t,'host'))$topics['Hospitality']++; if(str_contains($t,'safe'))$topics['Safety']++; if(str_contains($t,'service'))$topics['Service quality']++;}
$pageTitle='Reviews & Sentiment'; require __DIR__.'/includes/header.php';
?>
<section class="page-hero"><div class="container"><div class="section-kicker">Optional AI / NLP feature</div><h1 class="display-4 fw-bold">Reviews & Sentiment</h1><p class="muted">Transparent prototype classification using simple keywords. Replace with an NLP model/API for production.</p></div></section>
<section class="pb-5"><div class="container"><div class="row g-4"><div class="col-lg-5"><div class="detail-panel"><h4>Sentiment overview</h4><canvas id="sentimentChart" height="220"></canvas><div class="row g-2 mt-3"><?php foreach($counts as $k=>$v):?><div class="col-4"><div class="info-card p-3 text-center"><div class="fw-bold fs-4"><?=round($v/$total*100)?>%</div><small class="muted"><?=$k?></small></div></div><?php endforeach;?></div><h5 class="mt-4">Common topics</h5><?php foreach($topics as $k=>$v):?><div class="d-flex justify-content-between border-bottom py-2"><span><?=$k?></span><strong><?=$v?></strong></div><?php endforeach;?></div></div><div class="col-lg-7"><div class="detail-panel"><h4>Recent prototype reviews</h4><?php foreach(array_reverse($reviews) as $r): $p=get_place((int)$r['place_id']);?><div class="border-bottom py-3"><div class="d-flex justify-content-between"><strong><?=h($p['name']??'General Bharatpur experience')?></strong><span class="badge-soft"><?=h($r['sentiment'])?></span></div><div class="rating"><?=str_repeat('★',max(1,min(5,(int)$r['rating'])))?></div><p class="mb-0 mt-1"><?=h($r['text'])?></p></div><?php endforeach;?></div></div></div></div></section>
<script>document.addEventListener('DOMContentLoaded',()=>new Chart(document.getElementById('sentimentChart'),{type:'doughnut',data:{labels:['Positive','Neutral','Negative'],datasets:[{data:[<?=$counts['Positive']?>,<?=$counts['Neutral']?>,<?=$counts['Negative']?>]}]},options:{plugins:{legend:{position:'bottom'}}}}));</script>
<?php require __DIR__.'/includes/footer.php'; ?>

<?php
$allowed=['places','restaurants','homestays','events','users'];
$type=$_GET['type']??'places'; if(!in_array($type,$allowed,true))$type='places'; $adminTitle=ucfirst($type); require __DIR__.'/header.php'; $pdo=db(); $message=''; $error='';
$fields=[
 'places'=>['name','category','location','description','image_url','rating','estimated_cost','lat','lng'],
 'restaurants'=>['name','category','location','description','image_url','rating','price_level','lat','lng'],
 'homestays'=>['name','location','description','image_url','rating','price_per_night','lat','lng'],
 'events'=>['name','event_type','event_date','location','description','image_url'],
 'users'=>['name','email'],
][$type];
if($pdo && $_SERVER['REQUEST_METHOD']==='POST'){
 $action=$_POST['action']??''; $id=(int)($_POST['id']??0);
 try{
  if($action==='delete'&&$id){$st=$pdo->prepare("DELETE FROM `$type` WHERE id=?");$st->execute([$id]);$message='Record deleted.';}
  if(in_array($action,['create','update'],true)){
   $vals=[]; foreach($fields as $f)$vals[$f]=trim((string)($_POST[$f]??''));
   if($type==='users' && $action==='create'){$vals['password_hash']=password_hash('ChangeMe123!',PASSWORD_DEFAULT);$cols=array_keys($vals);} else $cols=$fields;
   if($action==='create'){$sql="INSERT INTO `$type` (`".implode('`,`',$cols)."`) VALUES (".implode(',',array_fill(0,count($cols),'?')).")";$st=$pdo->prepare($sql);$st->execute(array_values($vals));$message='Record created.';}
   else{$sql="UPDATE `$type` SET ".implode(',',array_map(fn($c)=>"`$c`=?",$cols))." WHERE id=?";$st=$pdo->prepare($sql);$st->execute([...array_values($vals),$id]);$message='Record updated.';}
  }
 }catch(Throwable $e){$error='Database operation failed: '.$e->getMessage();}
}
$rows=[]; if($pdo){try{$rows=$pdo->query("SELECT * FROM `$type` ORDER BY id DESC LIMIT 100")->fetchAll();}catch(Throwable $e){$error='Table not ready. Import database/schema.sql first.';}}
?>
<div class="d-flex justify-content-between align-items-center mb-4"><div><div class="section-kicker">CRUD manager</div><h1 class="section-title"><?=h(ucfirst($type))?></h1></div><span class="badge-soft"><?=$pdo?'Database connected':'Database required for CRUD'?></span></div>
<?php if($message):?><div class="alert alert-success"><?=h($message)?></div><?php endif;?><?php if($error):?><div class="alert alert-danger"><?=h($error)?></div><?php endif;?>
<?php if(!$pdo):?><div class="alert alert-warning">MySQL is not connected. The public site still runs from demo data. Import <code>database/schema.sql</code> and configure credentials to enable admin CRUD.</div><?php else:?>
<div class="admin-card p-4 mb-4"><h4>Create <?=h(rtrim(ucfirst($type),'s'))?></h4><form method="post"><input type="hidden" name="action" value="create"><div class="row g-2"><?php foreach($fields as $f):?><div class="col-md-6"><label class="form-label small fw-bold"><?=h(ucwords(str_replace('_',' ',$f)))?></label><?php if($f==='description'):?><textarea class="form-control" name="<?=$f?>"></textarea><?php else:?><input class="form-control" name="<?=$f?>" <?=$f==='name'?'required':''?>></div><?php endif;?><?php endforeach;?></div><button class="btn btn-brand mt-3">Create</button></form></div>
<div class="admin-card p-4"><div class="table-responsive"><table class="table align-middle"><thead><tr><th>ID</th><?php foreach(array_slice($fields,0,4) as $f):?><th><?=h(ucwords(str_replace('_',' ',$f)))?></th><?php endforeach;?><th>Actions</th></tr></thead><tbody><?php foreach($rows as $r):?><tr><td><?=$r['id']?></td><?php foreach(array_slice($fields,0,4) as $f):?><td><?=h(mb_strimwidth((string)($r[$f]??''),0,45,'…'))?></td><?php endforeach;?><td><button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#edit<?=$r['id']?>">Edit</button><form method="post" class="d-inline" onsubmit="return confirm('Delete this record?')"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?=$r['id']?>"><button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr><tr class="collapse" id="edit<?=$r['id']?>"><td colspan="<?=count(array_slice($fields,0,4))+2?>"><form method="post" class="p-3 bg-light rounded"><input type="hidden" name="action" value="update"><input type="hidden" name="id" value="<?=$r['id']?>"><div class="row g-2"><?php foreach($fields as $f):?><div class="col-md-4"><label class="small fw-bold"><?=h(ucwords(str_replace('_',' ',$f)))?></label><input class="form-control form-control-sm" name="<?=$f?>" value="<?=h($r[$f]??'')?>"></div><?php endforeach;?></div><button class="btn btn-sm btn-brand mt-2">Save changes</button></form></td></tr><?php endforeach;?></tbody></table></div><?php if(!$rows):?><p class="muted mb-0">No records yet.</p><?php endif;?></div>
<?php endif;?>
<?php require __DIR__.'/footer.php'; ?>

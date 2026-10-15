<?php
require __DIR__.'/includes/config.php';
require __DIR__.'/includes/database.php';
$msg='';
$error='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        $pdo = db();
        if ($pdo) {
            try {
                $st = $pdo->prepare('INSERT INTO users(name,email,password_hash) VALUES(?,?,?)');
                $st->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
                $msg = 'Account created. You can log in now.';
            } catch (Throwable $e) {
                $error = 'Could not create account. The email may already exist.';
            }
        } else {
            $msg = 'Demo mode: registration UI works, but persistent accounts require MySQL.';
        }
    }
}

$pageTitle='Register';
require __DIR__.'/includes/header.php';
?>
<div class="container">
  <div class="auth-card">
    <div class="section-kicker">Create profile</div>
    <h2 class="section-title">Register</h2>
    <?php if($msg):?><div class="alert alert-success"><?=h($msg)?></div><?php endif;?>
    <?php if($error):?><div class="alert alert-danger"><?=h($error)?></div><?php endif;?>
    <form method="post">
      <label class="form-label">Name</label><input required name="name" class="form-control mb-3">
      <label class="form-label">Email</label><input required type="email" name="email" class="form-control mb-3">
      <label class="form-label">Password</label><input required type="password" name="password" class="form-control mb-3">
      <button class="btn btn-brand w-100">Create account</button>
    </form>
    <p class="small muted mt-3">Already registered? <a href="login.php">Login</a></p>
  </div>
</div>
<?php require __DIR__.'/includes/footer.php'; ?>

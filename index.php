<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

function login() {
  global $fout;
  $fout = '';
  $password = 'dasfq1f42rg3rrwg324@#@FFQ!';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['password'])) {
      $fout = '<h4 class="foutmelding">Please enter a password</h4>';
    } elseif(!empty($_POST['password']) && $_POST['password'] == $password) {
      header('Location: opdrachten.php');
      exit;
    } elseif (!empty($_POST['password']) && $_POST['password'] != $password) {
      $fout = '<h4 class="foutmelding">Incorrect password</h4>';
    }
  }
}
$fout = login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <link rel="stylesheet" href="css/style.css" type="text/css"> 
</head>
<body>
  <header>
    <nav id="nav">
      <ul>
        <li><a href="#nav">Luke Boscher</a></li>
        <div class='nav'>
          <li><a href="#pdftitle">Projecten</a></li>
        </div>
      </ul>
    </nav>
  </header>
  <div class="hero">
    <section id="about">
      <h2>Wie is Luke Boscher?</h2>
      <p>Welcome to my portfolio. I am an IT professional passionate about technology and programming.</p>
      <h2 class='arrow'><a href="#login">&darr;</a></h2>
    </section>
    <!-- <video id="background-video" autoplay muted>
      <source src="video/171409-845439667.mp4" type="video/mp4">
    </video> -->
  </div>
  <main>
    <section class="login" id="login">
      <div class="logincontainer">
        <form action="<?php echo login(); ?>" method="POST" class="loginform">
          <h3>Portfolio Opdrachten</h3>
          <input type="password" name="password" id="password" placeholder="Wachtwoord">
          <input type="submit" value="Submit">
          <?php
            echo $fout;
          ?>
        </form>
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; Luke Boscher, 2024</p>
    <p>All rights reserved. The content on this website is created by and owned 
      by Luke Boscher. Unauthorized use, reproduction, or distribution of any material is prohibited 
      without explicit permission. For inquiries, please contact lukeboscher@gmail.com.</p>
  </footer>
</body>
</html>

<?php
$pdfs = array(
  'Notulen' => 'notulen.pdf',
  'titel2' => 'CafeOUI.pdf',
  'titel3' => 'CafeOUI.pdf',
  'titel4' => 'CafeOUI.pdf',
  'titel5' => 'CafeOUI.pdf',
  'titel6' => 'CafeOUI.pdf',
  'titel7' => 'CafeOUI.pdf',
  'titel8' => 'CafeOUI.pdf'

);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['pdf'])) {

  $currentpdf = $pdfs[$_POST['pdf']];
} else {
  $currentpdf = 'OUIv3.pdf';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="#about">Luke Boscher</a></li>
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
      <h2 class='arrow'><a href="#projects">&darr;</a></h2>
    </section>
    <!-- <video id="background-video" autoplay muted>
      <source src="video/171409-845439667.mp4" type="video/mp4">
    </video> -->
  </div>
  <main>
    <div class="pdfviewer">
      <h2 id='pdftitle'>Projecten</h2>
      <h3>&darr;Kies hier de pdf die je wilt zien&darr;</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>#pdftitle" method="POST">
            <select name="pdf" id="pdfs" onchange="this.form.submit()">
            <?php foreach ($pdfs as $title => $file): ?>
                <option value="<?php echo $title; ?>" <?php echo (!empty($_POST['pdf']) && $_POST['pdf'] == $title) ? 'selected' : ''; ?>><?php echo $title; ?></option>
            <?php endforeach; ?>
            </select>
        </form>
      <?php
        echo '<embed id="pdf-embed" src="pdf/'.$currentpdf.'" width="90%" height="90%">';
      ?>
    </div>
  </main>
  <footer>
    <p>&copy; Luke Boscher, 2024</p>
    <p>All rights reserved. The content on this website is created by and owned 
      by Luke Boscher. Unauthorized use, reproduction, or distribution of any material is prohibited 
      without explicit permission. For inquiries, please contact lukeboscher@gmail.com.</p>
  </footer>
</body>
</html>

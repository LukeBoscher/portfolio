<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

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

$currentpdf = 'notulen.pdf';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['pdf'])) {

  $currentpdf = $pdfs[$_POST['pdf']];
} else {
  $currentpdf = 'notulen.pdf';
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.php">Luke Boscher</a></li>
      </ul>
    </nav>
  </header>
  <div class="pdfviewer">
      <h2 id='pdftitle'>Projecten</h2>
      <h3>&darr;Kies hier de pdf die je wilt zien&darr;</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>#pdftitle" method="POST" class="pdfkeuze">
          <select name="pdf" id="pdfs" onchange="this.form.submit()">
          <?php foreach ($pdfs as $title => $file): ?>
              <option value="<?php echo $title; ?>" <?php echo (!empty($_POST['pdf']) && $_POST['pdf'] == $title) ? 'selected' : ''; ?>><?php echo $title; ?></option>
          <?php endforeach; ?>
          </select>
      </form>
      <?php
      echo '<embed id="pdf-embed" src="pdf/'.$currentpdf.'" width="90%" height="100%">';
      ?>
  </div>
</body>
</html>
<?php
include('config/dbcon.php');

try {
  $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
  $sql = 'SELECT imageURL FROM hackmeContest.images ORDER BY id DESC LIMIT 1';
  $q = $dbh->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);

  echo "I am connected.<br/>";

  // PDO closes connection at end of script
} catch (PDOException $e) {
  echo 'PDO Exception: ' . $e->getMessage();
  exit();
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <title>Hack Challenge PHPro</title>
  <link rel="stylesheet" href="assets/stylesheets/styles.css">
  <link rel="stylesheet" href="assets/stylesheets/pygment_trac.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="assets/javascripts/main.js"></script>
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
</head>
<body>

<header>
  <a href="">
    <h1>Hack Challenge PHPro</h1>
    <p>Try to hack me!!!</p>
  </a>
</header>


<div class="wrapper">

  <nav>
  </nav>


  <section>
    <center>
      <h1>The ultimate PHPro hacker!!!</h1>

      <p>
        <?php while ($r = $q->fetch()): ?>
      <p><img src="<?php echo $r['imageURL'];?>" alt="De winnaar!"></p>
      <?php endwhile; ?>
      </p>

    </center>
  </section>
</div>
<!--[if !IE]><script>fixScale(document);</script><!--<![endif]-->
</body>
</html>


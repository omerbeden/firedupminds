<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Daily Motivation" />
  <meta name="twitter:image" id="dynamicTwitterImage" content="images/placeholder.jpg" />

  <title>Motivational Quotes</title>
  <link rel="stylesheet" href="style.css" />
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-74K77HXXV7"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-74K77HXXV7');
</script>

<body>
  <?php

  if (file_exists('path/to/config.php')) {
    require_once 'path/to/config.php';
  } else {
    defined('DB_SERVER')   || define('DB_SERVER', getenv('DB_SERVER') ?: 'default_server');
    defined('DB_USERNAME') || define('DB_USERNAME', getenv('DB_USERNAME') ?: 'default_username');
    defined('DB_PASSWORD') || define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'default_password');
    defined('DB_DATABASE') || define('DB_DATABASE', getenv('DB_DATABASE') ?: 'default_database');
  }
  $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $randomNumber = rand(1, 86, 489);

  $sql = "SELECT * FROM quotes WHERE id = $randomNumber";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quote = $row["quote"];
    $author = $row["author"];
  }

  $conn->close();
  ?>

  <div id="main-container">
    <div id="image-container">
      <img id="page-image" src="images/1.jpg" alt="image" />
      <div id="image-overlay">
        <p id="highlighted-text">
          <?php echo $quote; ?>
        </p>
      </div>
    </div>
    <a class="twitter-share-button" href="https://twitter.com/intent/tweet" data-size="large" data-url="https://firedupminds.com/">
      Post</a>
  </div>

  <script src="redirect.js"></script>
  <script>
    var randomNumber = generateRandomNumber(7);
    var newImageURL = `images/${randomNumber}.jpg`;

    var dynamicImageElement = document.getElementById("dynamicTwitterImage");
    var pageImage = document.getElementById("page-image");

    dynamicImageElement.setAttribute("content", newImageURL);
    pageImage.setAttribute("src", newImageURL);

    window.twttr = (function(d, s, id) {
      var js,
        fjs = d.getElementsByTagName(s)[0],
        t = window.twttr || {};
      if (d.getElementById(id)) return t;
      js = d.createElement(s);
      js.id = id;
      js.src = "https://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js, fjs);

      t._e = [];
      t.ready = function(f) {
        t._e.push(f);
      };

      return t;
    })(document, "script", "twitter-wjs");
  </script>
</body>

</html>
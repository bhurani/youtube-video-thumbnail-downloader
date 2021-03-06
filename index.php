<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['imgurl'])){
      $img_url = $_POST['imgurl'];

      $curl_handle = curl_init($img_url);
      curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
      $download_img = curl_exec($curl_handle);
      curl_close($curl_handle);

      header('Content-Type: image/jpg; charset=UTF-8');
      header('Content-Disposition: attachment; filename="thumbnail.jpg"');
      echo $download_img;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, cURL">
  <meta name="author" content="Mayank Bhurani">
  <link rel="icon" type="image/x-icon" sizes="32x32" href="./img/favicon.ico">
  <title>Bhurani | Youtube Video Thumbnail Downloader</title>
  <link rel="stylesheet" href="./css/index.css">
</head>
<body>

  <main>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <header>
        <h2>Download Thumbnail</h2>
      </header>
      <section class="url-input">
        <label for="url-field">Paste video url:</label>
        <div class="field">
          <input type="url" id="url-field" class="url-field" placeholder="https://www.youtube.com/watch?v=" required>
          <input type="hidden" name="imgurl" class="hidden-field">
          <span class="bottom-line"></span>
        </div>
      </section>
      <section class="preview-area">
        <img src="" alt="Thumbnail" class="thumbnail">
        <i class="fas fa-cloud-download-alt"></i>
        <label for="url-field">Paste video url to see preview</label>
      </section>
      <input type="submit" value="Download Thumbnail" class="download-btn">
    </form>
  </main>

  <script src="./js/index.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php $filename = 'IMG_2972.jpg'; ?>

  <img src="./<?php echo rawurlencode($filename); ?>" style="max-width: 20rem;" />
</body>

</html>
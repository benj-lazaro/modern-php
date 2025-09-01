<?php
require __DIR__ . "/inc/db-connect.inc.php";
require __DIR__ . "/inc/functions.inc.php";

// Form submission logic
if (!empty($_POST)):
  // Typecast user data entry into a string; use a Coalescent operator to assign an empty string if it fails
  $title = (string) ($_POST['title'] ?? '');
  $date = (string) ($_POST['date'] ?? '');
  $message = (string) ($_POST['message'] ?? '');
  $image = null;

  // Image file scale down & upload
  if (!empty($_FILES) && !empty($_FILES['image'])):
    if ($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0):
      // Get the filename, drop the extension
      $nameWithoutExtension = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);

      // Clean-up any extra characters from the filename
      $name = preg_replace('/[^a-zA-Z0-9]/', '', $nameWithoutExtension);

      // Rename the file and proceed in scaling down the image file
      $originalImage = $_FILES['image']['tmp_name'];
      $imageName = $name . '-' . time() . '.jpg';
      $destinationImage = __DIR__ . '/uploads/' . $imageName;

      // Get the image file's current width & heightAn entry with a non-image file attachment
      $imageSize = getimagesize($originalImage);

      // Check if the image file has width & height
      if (!empty($imageSize)):
        [$width, $height] = $imageSize;

        // Define & calculate the scaled-down dimensions
        $maxDimension = 400;
        $scaleFactor = $maxDimension / max($width, $height);;

        $newWidth = $width * $scaleFactor;
        $newHeight = $height * $scaleFactor;

        // Loads & open the submitted image (jpeg) file
        $sourceImage = imagecreatefromjpeg($originalImage);

        // Check if it is a jpeg image file
        if (!empty($sourceImage)):
          // Create a new image file
          $newImage = imagecreatetruecolor($newWidth, $newHeight);

          // Copy the content of the submitted file and scale it down 
          imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

          // Save the new image on the application's local filesystem
          imagejpeg($newImage, $destinationImage);
        endif;

      else:
        // Ignore the file rename & assign a "null" value
        $imageName = null;

      endif;

    endif;

  endif;

  // Prepare data entry for submission to the database
  $stmt = $pdo->prepare('INSERT INTO `entries` (`title`, `date`, `message`, `image`) VALUES (:title, :date, :message, :image)');
  $stmt->bindValue(':title', $title);
  $stmt->bindValue(':date', $date);
  $stmt->bindValue(':message', $message);
  $stmt->bindValue(':image', $imageName);
  $stmt->execute();

  // Offer a manual redirect to the main page and then terminate execution of this program
  echo '<a href="index.php">Continue to the diary</a>';
  die();
endif;

?>

<?php require __DIR__ . "/views/header.view.php"; ?>

<!-- Form Entry -->
<h1 class="main-heading">New Entry</h1>

<form method="POST" action="form.php" enctype="multipart/form-data">
  <div class="form-group">
    <label class="form-group__label" for="title">Title:</label>
    <input
      class="form-group__input"
      type="text"
      id="title"
      name="title" required />
  </div>

  <div class="form-group">
    <label class="form-group__label" for="date">Date:</label>
    <input
      class="form-group__input"
      type="date"
      id="date"
      name="date" required />
  </div>

  <div class="form-group">
    <label class="form-group__label" for="image">Image:</label>
    <input
      class="form-group__input"
      type="file"
      id="image"
      name="image" />
  </div>

  <div class="form-group">
    <label class="form-group__label" for="message">Message:</label>
    <textarea
      class="form-group__input"
      name="message"
      id="message"
      rows="6" required></textarea>
  </div>

  <div class="form-submit">
    <button class="button">
      <svg
        class="button__icon"
        viewBox="0 0 34.7163912799 33.4350009649">
        <g
          style="
                    fill: none;
                    stroke: currentColor;
                    stroke-linecap: round;
                    stroke-linejoin: round;
                    stroke-width: 2px;
                  ">
          <polygon
            points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649" />
          <line
            x1="33.7163912799"
            y1="1"
            x2="15.1899978903"
            y2="17.5208901631" />
        </g>
      </svg>

      Save!
    </button>
  </div>
</form>

<?php require __DIR__ . "/views/footer.view.php" ?>
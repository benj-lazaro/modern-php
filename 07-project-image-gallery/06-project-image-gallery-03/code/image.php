<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>

<?php
if (!empty($_GET['image']) && !empty($imageTitles[$_GET['image']])):
    $imageFile = $_GET['image'];
    $imageTitle = $imageTitles[$imageFile];
    $imageContent = $imageDescriptions[$imageFile];
?>
    <h2><?php echo e($imageTitle) ?></h2>

    <img src="./images/<?php echo rawurldecode($imageFile); ?>" alt="<?php echo e($imageTitle); ?>">

    <p><?php echo str_replace("\n", "<br />", e($imageContent)); ?></p>
<?php

else: ?>
    <div class="notice">
        The requested image could not be found.
    </div>
<?php endif; ?>

<a href="./gallery.php">Back to gallery</a>

<?php include './views/footer.php'; ?>
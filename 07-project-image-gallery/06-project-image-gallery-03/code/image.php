<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>

<?php
if (!empty($_GET['image'])):
    $requestedImage = $_GET['image'];

    if (!empty($imageDescriptions[$requestedImage])):
        $imageFile = $_GET['image'];
        $imageAlt = $imageTitles[$requestedImage];
        $imageContent = $imageDescriptions[$requestedImage];
?>
        <div>
            <img src="./images/<?php echo rawurldecode($imageFile); ?>" alt="<?php echo e($imageAlt); ?>">
        </div>

        <div>
            <?php echo e($imageContent); ?>
        </div>


<?php
    endif;
endif;
?>

<div>
    <a href="./gallery.php">Back to Gallery</a>
</div>

<?php include './views/footer.php'; ?>
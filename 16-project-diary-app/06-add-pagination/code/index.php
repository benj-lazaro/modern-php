<?php

require __DIR__ . "/inc/db-connect.inc.php";
require __DIR__ . "/inc/functions.inc.php";

// Number of records to fetch from the database & render on the page
$perPage = 2;

// Check the current page being rendered
$page = (int) ($_GET['page'] ?? 1);

// Pagination formula
// $page = 1, offset = 0
// $page = 2, offset = $perPage
// $page = 3, offset = $perPage * 2
$offset = ($page - 1) * $perPage;

// Fetch the records from the database
$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `date` DESC, `id` DESC LIMIT :perPage OFFSET :offset');
// Bind the value of placeholders as integers, instead of (default) strings
$stmt->bindValue('perPage', (int) $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', (int) $offset, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require __DIR__ . "/views/header.view.php"; ?>

<h1 class="main-heading">Entries</h1>

<!-- Card(s) -->
<?php foreach ($results as $result): ?>

  <div class="card">
    <div class="card__image-container">
      <img
        class="card__image"
        src="images/pexels-canva-studio-3153199.jpg"
        alt="" />
    </div>

    <div class="card__desc-container">
      <div class="card__desc-time"><?php echo e($result['date']); ?></div>
      <h2 class="card__heading"><?php echo e($result['title']) ?></h2>
      <p class="card__paragraph"><?php echo nl2br(e($result['message'])); ?></p>
    </div>
  </div>

<?php endforeach; ?>

<!-- Pagination -->
<ul class="pagination">
  <li class="pagination__li">
    <a class="pagination__link" href="#">⏴</a>
  </li>
  <li class="pagination__li">
    <a class="pagination__link pagination__li--active" href="#">1</a>
  </li>
  <li class="pagination__li">
    <a class="pagination__link" href="#">2</a>
  </li>
  <li class="pagination__li">
    <a class="pagination__link" href="#">3</a>
  </li>
  <li class="pagination__li">
    <a class="pagination__link" href="#">⏵</a>
  </li>
</ul>

<?php require __DIR__ . "/views/footer.view.php" ?>
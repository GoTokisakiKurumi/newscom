<?php
require_once "config/function.php";
$db = new Search();
$data = $db->getSearch(@$data);

if ($db->RowCount(@$rowcount) == 0) :
  header('Location: views/notFound.php');
else :
  $slug = str_replace(' ', '-', $data[0]["slug"]);
?>
  <div id="main" class="container-table">
    <div class="table">
      <table border="0">
        <thead>
          <th>No</th>
          <th>Topik Berita</th>
          <th>View</th>
          <th>Action</th>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($data as $data) : ?>
          <tbody>
            <td><?= $i; ?></td>
            <td>
              <img src="http://localhost:8000/News.com/Public/image/thumbnails/<?= $data["image"]; ?>">
              <p><?= $data["judul"]; ?></p>
            </td>
            <td><?= $i; ?></td>
            <td><a href="http://localhost:8000/News.com/Home/dashboard/detail/<?= $slug; ?>">detail</a></td>
          </tbody>
          <?php $i++; ?>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
<?php endif; ?>

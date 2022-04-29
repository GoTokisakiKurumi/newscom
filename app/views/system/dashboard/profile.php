<?php
session_start();
$admin = $_SESSION["admin"];
?>
<div class="dashSpace"></div>
  <div class="container-admin-profile">
    <div class="admin-profile">
    <br>
     <div class="container-profile">
        <img src="<?= BASEURL; ?>/image/profil/<?= $admin["Profileimage"]; ?>">
      </div>
      <p><b><?= $admin["nama"]; ?></b></p>
      <p><?= $admin["status"]; ?></p>
    </div>
    <div class="admin-profile-header">
      <ul>
        <li>
          <p><b>Post berita</b></p>
          <p>130</p>
        </li>
        <li>
          <p><b>jumlah view</b></p>
          <p>530</p>
        </li>
        <li>
          <p><b>Pengunjung</b></p>
          <p>280</p>
        </li>
      </ul>
   </div>
  </div>

    <div style="width: 98%;margin-top: 35px;">
      <canvas id="myChart"></canvas>
    </div>
   <script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June'
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: '#0086FF',
      borderColor: 'rgb(255, 99, 132)',
      data: [47, 10, 5, 2, 20, 30],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>



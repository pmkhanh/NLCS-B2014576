<div class="d-flex">
  <div id="piechart"></div>
  <div class="col offset-sm-2 align-self-center">
    <h2 class="text-center text-white">Bảng thống kê</h2>
    <table class="table text-center">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Thể loại sách</th>
        <th scope="col">Doanh số</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_sta = "SELECT * FROM statistic";
      $result_sta = mysqli_query($conn, $sql_sta);
      
      if (mysqli_num_rows($result_sta) > 0) {
        while ($row = mysqli_fetch_array($result_sta)) {
          ?>
          <tr>
            <td><?= $row['id_cate'] ?></td>
            <td><?= $row['name_cate'] ?></td>
            <td><?= $row['amount'] ?></td>
          </tr>
          <?php }
      }
      ?>
    </tbody>
  </table>
  
</div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  // Load google charts
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  // Draw the chart and set the chart values
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Thể loại', 'Doanh số'],
      <?php
      $sql_sta = "SELECT * FROM statistic";
      $result_sta = mysqli_query($conn, $sql_sta);
      $row_sta = mysqli_fetch_all($result_sta);
      foreach ($row_sta as $sta) {
        extract($sta);
        echo "[ '$sta[2]', $sta[1] ],";
      }

      ?>
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
      'title': 'Thống kê theo thể loại',
      'width': 600,
      'height': 500
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>
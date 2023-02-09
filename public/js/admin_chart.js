<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script>
   var ctx = document.getElementById('myChart').getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'line',
       data: {
           labels: <?php echo json_encode($this->labels); ?>,
           datasets: [{
               label: 'Downloaded Assests',
               data: <?php echo json_encode($this->downloadasset_data); ?>,
               borderColor: 'rgba(75, 192, 192, 1)',
               backgroundColor: 'rgba(75, 192, 192, 0.2)',
               fill: false
           },
           {
               label: 'Downloaded Games',
               data: <?php echo json_encode($this->downloadgame_data); ?>,
               borderColor: 'rgba(0, 0, 0, 1)',
               backgroundColor: 'rgba(0, 0, 0, 0.2)',
               fill: false
           }
         
         ]
       },
       options: {
           scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero: true
                   }
               }]
           }
       }
   });
 </script>
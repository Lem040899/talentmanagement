<?php
include('config/dbcon.php');
include('includes/header.php');
?>
<?
session_start();
require 'config/dbcon.php';
?>
<?php
$con  = mysqli_connect("localhost","root","","talenmdb");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!".mysqli_error($con);
 }else{
         $sql ="SELECT tmstb.id, tmstb.fullname, tmstb.cnumber, tmstb.email, ratings.Total
         FROM tmstb
         JOIN ratings ON tmstb.id = ratings.id";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
            $productname[]  = $row['fullname']  ;
            $sales[] = $row['Total'];
        }
 }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="text-align:center;">
            <h2 class="page-header" >Performance Chart </h2>
            <div>
              <a href="performancemanagement.php" class="btn btn-danger float-end">
               <i class="fa-solid fa-circle-xmark"></i>
               Close
              </a>
            </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                }
                });
    </script>
</html> 
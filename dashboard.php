<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <title>Document</title>
</head>
<body>
<div id="page-wrapper">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-lg-12">
                        <h1 class="page-header">
                            <small></small>
                        </h1>
                    </div>
        	<div class="col-lg_9">
    			<canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 4", "Tháng 6", "Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
        datasets: [{
            label: "Số lượng sản phẩm bán được",
            backgroundColor: 'rgb(98, 182, 255)',
            borderColor: 'rgb(8, 11, 104)',
            data: [0, 10, 5, 2, 20, 30, 45, 29, 20, 20, 15, 30],
        }]
    },

    // Configuration options go here
    options: {}
});
    </script>
</body>
</html>
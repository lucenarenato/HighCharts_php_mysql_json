<!DOCTYPE html>
<html xml:lang="pt-br" lang="pt-br">
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta property="og:locale" content="pt_BR" />
      <meta name="description" content="Renato Lucena - Programador PHP">
      <meta name="author" content="Renato Lucena-Programador PHP">
      <link rel="next" href="http:http://renatolucena.net"/>
      <link rel="shortcut icon" href="favicon.png" />
      <link href='https://fonts.googleapis.com/css?family=Signika:600,300' rel='stylesheet' type='text/css'/>
	<title>HighCharts usando mysql php json</title>	
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
	<div id="container" style="width:100%; height:400px;"></div>

	<script type="text/javascript">
		$(document).ready(function() {
			
			var options = {
				chart: {
					renderTo: 'container',
					type: 'spline'
				},
				title: {
            		text: ' Comportamento dos Eventos '
        		},
        		legend: {
		            layout: 'vertical',
		            align: 'left',
		            verticalAlign: 'middle'
	        	},
	        	subtitle: {
		            text: 'Federal ST'
		        },
		        xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        crosshair: true,
					    min:0,
					    max:11,                     
                        title:{
			                text:'Months'
			            }
                    },
                 yAxis: {
                 	//categories:[],
				    /*labels: {
				      format: '{value}'
				    },*/
			        title: {
			            text: 'Titulos....'
			        }
			    },
		        plotOptions: {
			        series: {
			            allowPointSelect: true
			        }
			    },
				series: [],
				
			};

			$.getJSON('data1.php', function(data){
				$.each(data, function (i, item) {
				    if(item!=undefined){
				            options.series.push({
				                  name:item[0],
				                  data:item.slice(1)
				            });
				    }
				});				
				console.log(data);				
				console.log(options.series);
				var chart = new Highcharts.Chart(options);
			});
		});
	</script>
</body>
</html>
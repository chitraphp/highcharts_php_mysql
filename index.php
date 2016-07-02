<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Highcharts</title>
    <script type="text/javascript" src="js/jquery-3.0.0.min.js" ></script>
    <script type="text/javascript" src="js/highcharts.js" ></script>
    <script type="text/javascript" src="js/themes/gray.js"></script>

  
    <script type="text/javascript">
    //variables to hold x-axis 'categories', y-axis 'series'
    var names = [];
    var visits = [];

    //getting outout from data.php
    $.get("data.php", function(output){
      output = output.split(/<br>/g);
      //alert(output);
      $.each(output, function(key,x){
        //alert(x);
        x = x.split(/\t/);
        //alert(x[0]);
        names.push(x[0]);
        visits.push(parseInt(x[1]));

      });
    });

    $(document).ready(function() {
     var title = {
        text: 'Monthly Average Visits'
     };
     var subtitle = {
        text: 'Source: WorldClimate.com'
     };
     var xAxis = {
        categories: names
     };
     var yAxis = {
        title: {
           text: 'Visits (\xB0C)'
        },
        plotLines: [{
           value: 0,
           width: 1,
           color: '#808080'
        }]
     };

     var tooltip = {
        valueSuffix: '\xB0C'
     };

     var legend = {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
     };

     //json holds hicharts.options
     var json = {};
     var series = [{name: 'data1', data: visits}];
     //alert(series['data']);
     json.title = title;
     json.subtitle = subtitle;
     json.xAxis = xAxis;
     json.yAxis = yAxis;
     json.tooltip = tooltip;
     json.legend = legend;
     json.series = series;
     $('#container').highcharts(json);
    });
    </script>
  </head>
  <body>
    <!--- container to hold highcharts-------->
    <div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>

  </body>
</html>

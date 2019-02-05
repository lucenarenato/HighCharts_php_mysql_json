<html>
<head>
<title>PHPRO AJAX D3.js MySQL Example</title>

<style>
body {
    background-color:white;
    font: 10px sans-serif;
}

.axis path,
.axis line {
    fill: none;
    stroke: #000;
    shape-rendering: crispEdges;
}

.area {
    fill: steelblue;
}
</style>

<script src="https://d3js.org/d3.v3.min.js"></script>
</head>

<body>

<script>

var margin = {top: 20, right: 20, bottom: 30, left: 50},
    width = 1080 - margin.left - margin.right,
    height = 960 - margin.top - margin.bottom;

var x = d3.scale.ordinal()
    .rangeRoundBands([0, width], .0);

var y = d3.scale.linear()
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var area = d3.svg.area()
    .x(function(d) { return x(d.record_date); })
    .y0(height)
    .y1(function(d) { return y(d.total); });

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  d3.json("api.php", function(error, data) {
  var k = [];
    data.forEach(function(d) {
        d.record_date = d.record_date;
        d.total = +d.total;
        k.push(d.record_date)
    });

  x.domain(k);
  y.domain([0, d3.max(data, function(d) { return d.total; })]);

  svg.append("path")
    .datum(data)
    .attr("class", "area")
    .attr("d", area);

  svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + height + ")")
    .call(xAxis);

  svg.append("g")
    .attr("class", "y axis")
    .call(yAxis)
    .append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 6)
    .attr("dy", ".71em")
.style("text-anchor", "end")
.text("Count");
});

</script>
</body>
</html>
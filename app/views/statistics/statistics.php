<html>
<head>
    <meta charset="UTF-8">
    <title>Statistics</title>
    <link rel="stylesheet" type="text/css" href="css/statistics-style.css">
</head>


<body>
<section class="intro">

    <div class="navbar">
        <a href="paginaUtilizator"><img src="Images/png_profile.png" alt="ProfilePage" ></a>
        <a href="login"><img src="Images/png_login.png" alt="LoginPage" ></a>
        <a href="index"><img src="Images/png_home.png" alt="HomePage" ></a>
        <a href="colectieArtefacte"><img src="Images/png_collection.png" alt="CollectionPage" ></a>
        <a href="statistics"><img src="Images/png_statistics.png" alt="StatisticsPage" ></a>
    </div>

    <div class="inner">
        <div class="content">
            <h1><a href="index">ARTIFACTY</a></h1>
        </div>
    </div>
</section>

<section class="BoxForStatictics">
    <h2 style="padding-left: 40%;padding-bottom: 5%;">Statistics</h2>
    <div>
        <div class="general">
            General statistics
            <ul>
                <li>Total number of items: 50</li>
                <li>Number of users: 10</li>
                <li>Number of sold items: 5</li>
                <li>Most expensive item: Ancient Katana</li>
            </ul>
        </div>
        <div class="categories">
            Categories details
            <ul>
                <li>Number of categories: 6</li>
                <li>Category with most items: Clocks</li>
                <li>Most searched category: Jewels</li>
            </ul>
        </div>
    </div>
    <div style="clear: both; height: 3%;"></div>

    <section style="padding-left:17%; padding-top: 10%;">
        <h6>heading</h6>
        <div id="piechart">
        </div>
    </section>

</section>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Category', 'Number of items'],
            ['Weapons',     11],
            ['Carpets',      2],
            ['Cult Objects',  2],
            ['Clocks', 12],
            ['Jewels',    7]
        ]);

        var options = {
            title: 'Percent of items by category'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

</body>
</html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artifacty</title>
    <link rel="stylesheet" type="text/css" href="css/pagina_artefact-style.css">
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

<div class="box">
    <h2>--ArtefactName--</h2>

    <div>
        <div>
            <img src="Images/img_artefact1.jpg" alt="artefact" style="width:100%;">
        </div>
    </div>
    <!-- begin Informatii artefact-->
    <div>
        <h4>Added by: <a href="paginaAltUtilizator"> User </a></h4>
        <hr>
        <h4>Author:</h4> <p>--AuthorName--</p>
        <hr>
        <h4>Owner:</h4> <p>--OwnerName--</p>
        <hr>
        <h4>Dating:</h4> <p>--Dating_the_artefact--</p>
        <hr>
        <h4>Price:</h4> <p>--ArtefactEstimatedPrice--</p>
        <hr>
        <h4>License:</h4> <p>--UseLicense--</p>
        <hr>
        <h4>State of Research:</h4>
        <progress max="100" value="80" ></progress>
        <hr>
        <h4>Description:</h4> <p>--ArtefactDescription--</p>
        <hr>

        <!--Api Google Maps-->

        <h4>Localization:</h4>

        <div id="map" style="width:400px;height:400px;background:grey"></div>

        <script>
            function myMap() {
                var mapOptions = {
                    center: new google.maps.LatLng(51.5, -0.12),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>


    </div>

    <!--end Informatii artefact-->

</div>

</body>
</html>

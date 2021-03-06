<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artifacty</title>
    <link rel="stylesheet" type="text/css" href="/public/css/pagina_artefact-style.css">
</head>
<body>

<section class="intro">

    <div class="navbar">
        <a href="/public/paginaUtilizator"><img src="/public/Images/png_profile.png" alt="ProfilePage" ></a>
        <a href="/public/login"><img src="/public/Images/png_login.png" alt="LoginPage" ></a>
        <a href="/public/index"><img src="/public/Images/png_home.png" alt="HomePage" ></a>
        <a href="/public/colectieArtefacte"><img src="/public/Images/png_collection.png" alt="CollectionPage" ></a>
        <a href="/public/statistics"><img src="/public/Images/png_statistics.png" alt="StatisticsPage" ></a>
    </div>
    <div class="inner">
        <div class="content">
            <h1><a href="/public/index">ARTIFACTY</a></h1>
        </div>
    </div>
</section>
<hr>
<br><br><br>
<hr>
<section class="BigBox">
    <div class="box">
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/app/models/ArtefactModel.php";
        $u=new ArtefactModel;
        if($u->artefact_image!=null) {
            $img = $u->artefact_image->load();
            echo '<h2>' . $u->artefact_name . '</h2>';
            print('<img style="width:100%;" src="data:image/png;base64,' . base64_encode($img) . '" />');
        }

        if($u->user_id==Session::get('id_user')){
            echo '<div>
             <h4>Added by: <a href="/public/paginaUtilizator"> ' . $u->user_name . '</a></h4>
            <hr>';
        }
        else {
            echo '<div>
             <h4>Added by: <a href="/public/paginaAltUtilizator?id=' . $u->user_id . '"> ' . $u->user_name . '</a></h4>
            <hr>';
        }
        echo'<h4>Author:</h4> <p>'.$u->author_name.'</p>
            <hr>';

        echo'<h4>Class:</h4> <p>'.$u->class_names.'</p>
            <hr>';

        echo'<h4>Category:</h4> <p>'.$u->category.'</p>
            <hr>';

        echo'<h4>Subcategory:</h4> <p>'.$u->subcategory.'</p>
            <hr>';

        echo '<h4>Dating:</h4> <p>Century: '.$u->dating.'</p>
            <hr>';

        echo'<h4>Price:</h4> <p>'.$u->price.' USD</p>
            <hr>';
        if($u->license==0)
        echo'<h4>License:</h4> <p>Without license</p>
            <hr>';
        else
            echo'<h4>License:</h4> <p>Without license</p>
            <hr>';

         echo'<h4>Origin:</h4> <p>'.$u->origin.'</p>
            <hr>';

         echo'<h4>Roles:</h4> <p>'.$u->roles.'</p>
            <hr>';

         echo'<h4>Materials:</h4> <p>'.$u->materials.'</p>
            <hr>';

         echo'<h4>Description:</h4> <p>'.$u->description.'</p>
            <hr>';
         echo'<h4>Tags:</h4>';
        foreach ($u->tags as $tag)
        {
            echo"<a class='tag' href='/public/colectieArtefacte?tag=".$tag."'>".$tag.'</a>';
        }
        ?>
            <hr>
            <!--Api Google Maps-->
            <h4>Localization:</h4>
            <div id="map" style="width:400px;height:400px;background:grey"></div>

        </div>
    <?php if($u->user_id==Session::get('id_user'))
    {
    echo '<form  action="/public/paginaArtefact/delete?id='.$_GET['id'].'" method="post">';
        echo '<input onclick="location.href='."'/public/paginaUtilizator'".'" class="button" name="delete" type="submit" value="Delete Artefact">';
        echo '</form>';
    }
    ?>
    </div>
</section>

<h3 style="text-align:center; color:grey;"> Export</h3>
<div class="exportButtons">
        <?php
            include $_SERVER['DOCUMENT_ROOT']."/app/models/ExportModel.php";
            $e = new ExportModel();

            $e->exportJson();
            echo '<a href="/app/files/jsonFile.json" download="artefact.json">';
            echo '<button>JSON</button>';
            echo '</a>';

            $e->exportXml();
            echo '<a href="/app/files/xmlFile.xml" download="artefact.xml">';
            echo '<button>XML</button>';
            echo '</a>';

            $e->exportCsv();
            echo '<a href="/app/files/csvFile.csv" download="artefact.csv">';
            echo '<button>CSV</button>';
            echo '</a>';
        ?>

    <!--<input type="submit" name="JSON" value="JSON" id="button">
    <input type="submit" name="XML" value="XML" id="button">
    <input type="submit" name="CSV" value="CSV" id="button">-->
</div>

<hr>
<section class="boxRelatedArtefacts">
    <h3 style="text-align:center; color:grey;"> Related artefacts:</h3>
    <hr>
    <?php
    if($u->id_related_art[0]=='1')//s-au gasit artefacte asemanatoare
    {
        $contor=1;
        while($contor<=4 and $u->id_related_art[$contor]!=0) {
            echo '<div class="responsive">';
            echo '<div class="gallery">';
            echo '<a href="/public/paginaArtefact?id='.$u->id_related_art[$contor].'">';
            if($u->img_related_art[$contor]!=null){
            echo '<img src="data:image/jpg;base64,'.base64_encode($u->img_related_art[$contor]->load()).'" alt="Imagine Artefact" width="600" height="400">';
            }
            echo '</a>';
            echo '<div class="desc">'.$u->name_related_art[$contor].'</div>';
        echo '</div>';
        echo '</div>';
        $contor++;
        }
    }
    else {if($u->id_related_art[0]=='0')
        echo "<p>There aren't any related artefacts!</p>";
    }
    ?>


    <div class="clearfix"></div>
    <hr>
</section>

<script>
    var latitudine="<?php print($u->latitude) ?>";
    var longitudine="<?php print($u->longitude) ?>";
    function myMap() {
        var mapOptions = {
            center: new google.maps.LatLng(latitudine, longitudine),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.HYBRID
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx6GgomrtePy3-K91tI_1eValNVkkT4mQ&callback=myMap"></script>

</body>
</html>


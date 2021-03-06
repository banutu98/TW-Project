<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artifacty</title>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
</head>
<body>
<section class="intro">
    <h6>heading</h6>
    <!-- <nav>
         <a style="position:fixed;" href="#" id="menu-icon"></a>
         <ul>
             <li><a href="pagina_utilizator">Profile</a></li>
             <li><a href="login">Login/Register</a></li>
             <li><a href="#collection">Collection</a></li>
             <li><a href="#categories">Categories</a></li>
             <li><a href="statistics">Statistics</a></li>
         </ul>
     </nav>-->
    <div class="navbar">
        <a href="/public/paginaUtilizator"><img src="/public/Images/png_profile.png" alt="ProfilePage" ></a>
        <a href="/public/login"><img src="/public/Images/png_login.png" alt="LoginPage" ></a>
        <a href="/public/index"><img src="/public/Images/png_home.png" alt="HomePage" ></a>
        <a href="/public/colectieArtefacte"><img src="/public/Images/png_collection.png" alt="CollectionPage" ></a>
        <a href="/public/statistics"><img src="/public/Images/png_statistics.png" alt="StatisticsPage" ></a>
    </div>

    <div class="inner">
        <div class="content">
            <h1>ARTIFACTY</h1>
        </div>
    </div>
</section>

<section>
    <div class="introduction">
        <h1>ARTIFACTY</h1>
        <br>
        <p style="text-indent: 6%;">
            If you are a specialist in artefacts, a collector or just passionate and curious,
            our site is a great way to manage your collection and to find out interesting
            facts about other artefacts.
        </p>
        <!--become a member section-->
        <div class="clear-fix"></div>

        <h2 id="join-button"><span><a href="/public/register">Become a member!</a></span></h2>
        <h4 style="text-align: center; color: grey;"><span>If you are already a member:<a href="/public/login"> Sign in </a>!</span></h4>
        <a id="collection"></a>
        <p style="text-align: center;">
            Click the image below to visit our collection!
        </p>
    </div>
</section>

<section class="bigcontainer">
    <h6>heading</h6>
    <div class="container">
        <img src="/public/Images/img_collection.jpg" alt="Collection" class="image" style="width:100%">
        <div class="middle">
            <div ><a class="text" href="/public/colectieArtefacte">Visit our Collection!</a></div>
        </div>
    </div>
</section>

<!--categories section-->
<a id="categories"></a>
<div class="clear-fix"></div>
<h2 id="categories-header"><span>Categories</span></h2>
<div style="background-color:#eabf15; padding: 2%;"></div>
<hr>
<section class="categories_container">


    <?php
    include $_SERVER['DOCUMENT_ROOT']."/app/models/HomeModel.php";
    $h=new HomeModel();
    for ($contor=0;$contor<count($h->name_colectii);$contor++)
    {
       echo '<div class="gallery">';
       echo  '<a  href="/public/colectieArtefacte?search=&cat%5B%5D='.$h->name_colectii[$contor].'">';
            echo '<img src="/public/Images/img_artefact2.jpg" alt="Weapons" width="300" height="200">';
        echo '</a>';
        echo '<div class="desc">'.$h->name_colectii[$contor].'</div>';
    echo '</div>';
    }
    ?>
</section>
<div class="clear-fix"></div>
<hr>

<div class="footer"></div>
</body>
</html>
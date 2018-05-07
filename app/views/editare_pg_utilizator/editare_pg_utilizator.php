<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Artifacty</title>
    <link rel="stylesheet" type="text/css" href="css/editare_pg_utilizator-style.css">
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

<section class="box_user">
    <h3><strong>Profile</strong></h3>
    <br>
    <hr>
    <img src="Images/user.png" alt="This is the users profile picture" width="100" height="100">
    <hr>
    <form action="paginaUtilizator">
        <table style="margin: 0 auto;">
            <tr><td class="stanga"><strong>Name:</strong></td><td class="dreapta"><input  class="stanga" type="text" name="nume" value="-"></td></tr>
            <tr><td class="stanga"><strong>UserName:</strong></td><td class="dreapta"><input class="stanga" type="text" name="username" value="-"></td></tr>
            <tr><td class="stanga"><strong>Class:</strong></td><td class="dreapta"><input class="stanga" type="text" name="lastname" value="-"></td></tr>
            <tr><td class="stanga"><strong>Country:</strong></td><td class="dreapta"><input class="stanga" type="text" name="lastname" value="-"></td></tr>
            <tr><td class="stanga"><strong>Email:</strong></td><td class="dreapta"><input class="stanga" type="text" name="lastname" value="-"></td></tr>
        </table>
        <input class="button" type="submit" value="Save Profile">
    </form>
</section>
</body>
</html>
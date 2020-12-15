<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="busqueda_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <h1 class="text mt-3">Busqueda</h1>
    <form action="Php/Search.php" method="post" class="Busqueda" name="Busqueda">
        <nav class="navbar navbar-expand-sm navbar-dark bg-info bg-dark navbar-toggleable-md sticky-top mt-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="mx-2 my-auto my-lg-0 d-inline w-75">
                    <input type="text" class="form-control border border-right-0" placeholder="Search..." name="Texto">
                </div>
                <div class="mx-2 my-auto my-lg-0 d-inline">
                    <input class="form-control" type="date" id="example-date-input" name="FechaIni">
                </div>
                <div class="mx-2 my-auto my-lg-0 d-inline">
                    <input class="form-control" type="date" id="example-date-input" name="FechaFin">
                </div>
                <div class="dropdown mr-2 my-auto my-lg-0 w-75">
                    <select class="form-control" id="categoBox" name="categoBox">
                        <option value='0'>Secciones</option>
                    </select>
                </div>
                <div class="my-4 my-lg-0 mx-auto d-flex flex-row justify-content-center">
                    <input type="submit" value="Buscar" class="btn btn-danger mr-auto" id="clear">
                </div>
                <div class="my-4 my-lg-0 ml-2 d-flex flex-row justify-content-center">
                    <a href="index.php" class="btn btn-success mr-2">Regresar</a>
                </div>
            </div>
        </nav>
    </form>



    <!-- Noticias en lista -->
    <div class="container mt-3 misNoticias">


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="optionSeccion.js"></script>
    <script src="Busqueda.js"></script>
</body>

</html>

<?php
  require 'Php/dbOrlando.php';
  // if($con){
  //   echo "Hay conexion";
  // }
  // else{
  //   error.log($con);
  // }
  if(isset($_GET['idSeccion'])) {
    $idSeccion = $_GET['idSeccion'];

    $temp = "SELECT * FROM Noticia WHERE seccionIdF = '$idSeccion' AND isActive = 1";

    //echo $temp;

    $result = mysqli_query($con, $temp) or die ("Fallo el query");

    $rows = mysqli_num_rows($result);

    if($rows) {
        //$noticias = array();

        while($noticia = mysqli_fetch_assoc($result)) {
            /*$noticias[] = array(
                'titulo' => $noticia['titulo'],
                'sinposis' => $noticia['sinopsis']
            );*/
            $id = $noticia['noticiaId'];
            $titulo = $noticia['titulo'];
            $sinopsis = $noticia['sinopsis'];


            echo "<div class='row remove'>";
            echo "<div class='card mt-3 mx-auto text-white bg-dark w-75 remove'>";
            echo "<div class='card-body remove'>";
            echo "<h2 class='card-title mt-2 remove'>$titulo</h2>";
            echo "<p class='card-text remove'>$sinopsis</p>";
            echo "<a href='./noticia.php?idNoticia=$id' class='btn btn-danger remove mr-2'>Ver más</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
  }

?>
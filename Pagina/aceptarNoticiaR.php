<?php
    require 'Php/dbOrlando.php';
    session_start();
    error_reporting(0);
    
    $varSesion = $_SESSION['usuario'];
    $varSesionTipo =  $_SESSION['tipo'];

    $sqlquery = mysqli_query($con, "CALL sp_selectUsuarios()");
    $con->close();

    require 'Php/dbOrlando.php';
    $sqlquery2 = mysqli_query($con, "CALL sp_NoticiasReportero('$varSesion')");
    $con->close();

    require 'Php/dbOrlando.php';
    $sqlquery3 = mysqli_query($con, "CALL sp_NoticiasReporteroActivas('$varSesion')");
    $con->close();

    require 'Php/dbOrlando.php';
    $sqlquery4 = mysqli_query($con, "CALL sp_NoticiasReporteroNoActivas('$varSesion')");
    $con->close();

    
    require 'Php/dbOrlando.php';
    $sqlquery5 = mysqli_query($con, "CALL sp_NoticiasReporteroGeneral('$varSesion')");
    $con->close();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="aceptarNoticia_style.css">
    <title>3DJuegos</title>
</head>

<body>
    <div class="navbarUsuarioAdmin" id="navbarUsuarioAdmin">
        <nav class="navbar navbar-expand-sm navbar-dark bg-info bg-dark navbar-toggleable-md sticky-top">
            <a class="navbar-brand" href="index.php">
                <img src="https://yt3.ggpht.com/a/AATXAJxZMZ0mKBqkcFUcoXXapAjbD0FjYbgDTe3yNCPyZA=s900-c-k-c0xffffffff-no-rj-mo"
                    width="30" height="30" class="d-inline-block align-top" alt="Logo-Boostrap">
                3DJuegos
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="navbar-nav mr-auto ml-auto text-center">

                </div>
                <div class="d-flex flex-row justify-content-center">
                    <a href="crearNoticia.php" class="btn btn-danger  mr-2">Crear Noticia</a>
                    <a href="Php/cerrarSesion.php" class="btn btn-warning  mr-2">Cerrar Sesion</a>
                </div>
            </div>
        </nav>
    </div>
    <!------------------------------------------------------------------------------------->
    <div class="container">
        <div class="row justify-content-between mt-3 m-1">
            <div class="col-sm-12 col-lg-6">
                <div class="perfil">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="text-center py-3">
                            <h1 class="text-dark">Tus Noticias</h1>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="activasBox">Escoja una noticia</label>
                            </div>
                            <select class="custom-select" id="activasBox" name="comboActivas">
                                <?php
                            while($row2 = mysqli_fetch_array($sqlquery3)){
                                ?>
                                <option value="<?=$row2["titulo"];?>"><?=$row2["titulo"];?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mx-sm-4 pb-2" style="text-align: center;">
                            <input type="submit" class="bajaLogica btn btn-block editar" name="bajaLogica"
                                value="Baja">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="noActivasBox">Escoja una noticia</label>
                            </div>
                            <select class="custom-select" id="noActivasBox" name="comboNoActivas">
                                <?php
                            while($row3 = mysqli_fetch_array($sqlquery4)){
                                ?>
                                <option value="<?=$row3["titulo"];?>"><?=$row3["titulo"];?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group mx-sm-4 pb-2" style="text-align: center;">
                            <input type="submit" class="alzaLogica btn btn-block editar" name="alzaLogica"
                                value="Alta">
                        </div>
                    </form>
                </div>
            </div>
            <!-------------------->
            <div class="col-sm-12 col-lg-6">
                <div class="perfil">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group text-center pt-3">
                            <h1 class="text-dark">Pendientes</h1>
                        </div>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Escoja una Noticia</label>
                        </div>
                        <select class="custom-select" name="comboNoticias">
                            <?php
                        while($row = mysqli_fetch_array($sqlquery2)){
                            ?>
                            <option value="<?=$row["titulo"];?>"><?=$row["titulo"];?></option>
                            <?php
                        }
                        ?>
                        </select>
                        </div>

                        <div class="form-group mx-sm-4 pb-2" style="text-align: center;">
                            <input type="submit" class="uploadfilesub btn btn-block editar" name="uploadfilesub"
                                value="EDITAR">
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="generales">Quitar comentarios</label>
                        </div>
                        <select class="custom-select" name="comboNoticiasGenerales">
                            <?php
                        while($row4 = mysqli_fetch_array($sqlquery5)){
                            ?>
                            <option value="<?=$row4["titulo"];?>"><?=$row4["titulo"];?></option>
                            <?php
                        }
                        ?>
                        </select>
                        </div>

                        <div class="form-group mx-sm-4 pb-2" style="text-align: center;">
                            <input type="submit" class="uploadfilesub btn btn-block editar" name="revisarComentarios"
                                value="revisar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-between pt-5 mt-5 m-1">
            <div class="col-sm-12 col-lg-6">
                <div class="perfil">
                    <div class="text-center py-3">
                        <h1 class="text-dark">Agregar Secciones</h1>

                        <form action="Php/insertSeccion.php" method="post" class="addSeccion" name="addSeccion">
                            <?php
                                echo "<input type='hidden' name='usuario' value='$varSesion'>"
                            ?>
                            <div class="form-group" style="padding-top: 15px;">
                                <div class="text-dark">
                                    <label for="nombreSeccion">Nombre de la Seccion</label>
                                </div>
                                <input type="text" class="form-control" id="nombreSeccion" placeholder="Seccion"
                                    name="nombreSeccion">
                            </div>
                            <div class="form-group" style="padding-top: 15px;">
                                <div class="text-dark">
                                    <label for="color-picker">Escoja un color</label>
                                </div>
                                <input type="color" class="form-control" id="exampleFormControlInput1"
                                    name="color-picker">
                            </div>
                            <div class="justify-content-center bd-highlight"
                                style="padding-bottom:15px;padding-top: 15px;">
                                <!--<a href="#" class="btn btn-success  mr-2 ml-auto" id="crearSeccion" type="submit">Crear</a>-->
                                <input type="submit" value="Crear" class="btn btn-success  mr-2 ml-auto"
                                    onclick="location.href='aceptarNoticia.php';">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!---------------------------------------->
            <div class="col-sm-12 col-lg-6">
                <div class="perfil">
                    <div class="text-center py-3">
                        <h1 class="text-dark">Eliminar Secciones</h1>
                        <form action="Php/deleteSeccion.php" method="post" class="deleteSeccion">
                            <div class="form-group" style="padding-top: 15px;">
                                <div class="text-dark">
                                    <label for="categoriaLabel">Categoria</label>
                                </div>
                                <select class="form-control" id="categoBox" name="categoBox">

                                </select>
                            </div>
                            <div class="justify-content-center bd-highlight"
                                style="padding-bottom:15px; padding-top: 15px;">
                                <input type="submit" value="Eliminar" class="btn btn-danger  mr-2 ml-auto"
                                    onclick="location.href='aceptarNoticia.php';">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="insertSeccion.js"></script>
    <script src="deleteSeccion.js"></script>
</body>

</html>

<?php
include('Php/dbOrlando.php');

    if($con) {
        //if connection has been established display connected.
        
        }
        //if button with the name uploadfilesub has been clicked
    if(isset($_POST['uploadfilesub'])) {
        //declaring variables
        $titulo = $_POST['comboNoticias'];

        session_start();
        $varSesion = $_SESSION['usuario'];
        $varSesionTipo =  $_SESSION['tipo'];
        $_SESSION['noticia'] = $titulo;

        if( $titulo != "") {
            $yourURL="editarNoticia.php";
            echo ("<script>location.href='$yourURL'</script>");
        } else {
            echo "aqui te quedas";
        }
    }

    if(isset($_POST['bajaLogica'])) {
        //declaring variables
        $baja = $_POST['comboActivas'];

        $bajaQuery = "call sp_bajaNoticia('$baja')";

        $qry1 = mysqli_query($con,  $bajaQuery);
        if($qry1){
            $yourURL="aceptarNoticiaR.php";
            echo ("<script>location.href='$yourURL'</script>");
        }else{
            echo ("No se pudo bajar la noticia");
        }
    }

    if(isset($_POST['alzaLogica'])) {
        //declaring variables
        $alta = $_POST['comboNoActivas'];

        $altaQuery = "call sp_alzaNoticia('$alta')";

        $qry2 = mysqli_query($con,  $altaQuery);
        if($qry2){
            $yourURL="aceptarNoticiaR.php";
            echo ("<script>location.href='$yourURL'</script>");
        }else{
            echo ("No se pudo bajar la noticia");
        }
    }

    

    if(isset($_POST['revisarComentarios'])) {
        //declaring variables
        $noticiaTitulo = $_POST['comboNoticiasGenerales'];

        $altaQuery = "call sp_alzaNoticia('$alta')";

        $qry3 = mysqli_query($con,  $altaQuery);
        if($qry3){
            session_start();
            error_reporting(0);
            $_SESSION['usuario'] = $varSesion;
            $_SESSION['tipo'] = $varSesionTipo;
            $_SESSION['titulo'] = $noticiaTitulo;

            $yourURL="eliminarComentarios.php";
            echo ("<script>location.href='$yourURL'</script>");
        }else{
            echo ("No se pudo bajar la noticia");
        }
    }

    $con->close();
?>
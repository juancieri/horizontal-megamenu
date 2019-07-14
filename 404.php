<?php
$titlePage = "Error Page 404";
$pageDescription = "";
$pageKeywords = "";
require("part-head.php");
?>

    <body id="error-page">
      
        <?php include_once("analyticstracking.php") ?>
        
        <?php require("part-header.php"); ?>
        
        <main>
            
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1>Error 404</h1>
                            <h2>Página no encontrada</h2>
                            <p>La página que estás buscando no existe</p>
                            <a href="index.php" class="btn btn-primary">Volver al home</a>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
        
        <?php require("part-footer.php"); ?>
        
        <?php require("part-script.php"); ?>
        
        <?php require("part-modal.php"); ?>
        
        <script>
            $(document).ready(function(){
                
            });
        </script>
        
    </body>
</html>
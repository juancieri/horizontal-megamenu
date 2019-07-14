<?php
$titlePage = "Error Page 500";
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
                            <section>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h1>Error 500</h1>
                                            <a href="index.php" class="btn btn-primary">Volver al home</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
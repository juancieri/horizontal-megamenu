<?php
$titlePage = "";
$pageDescription = "";
$pageKeywords = "";
require("part-head.php");
?>

    <body id="success-page">
      
        <?php include_once("analyticstracking.php") ?>
        
        <script>
          gtag('event', 'conversion', {
              'send_to': 'AW-xxxxx',
              'transaction_id': ''
          });
        </script>
        
        <?php require("part-header.php"); ?>
        
        <main>
            
            
            
        </main>
        
        <?php require("part-footer.php"); ?>
        
        <?php require("part-script.php"); ?>
        
    </body>
</html>
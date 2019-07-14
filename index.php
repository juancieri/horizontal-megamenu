<?php
$titlePage = "";
$pageDescription = "";
$pageKeywords = "";
require("part-head.php");
?>

    <body id="home-page">
      
        <?php include_once("analyticstracking.php") ?>
        
        <?php require("part-header.php"); ?>
        
        <main>
            
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <form data-toggle="validator" role="form" action="sendmail.php" method="post" enctype="multipart/form-data" class="form">
                                <input type="hidden" name="antiSpam" value="">
                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control" required data-required-error="Campo Obligatorio" placeholder="Nombre">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required data-required-error="Campo Obligatorio" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="telefono" class="form-control" required data-required-error="Campo Obligatorio" placeholder="Teléfono">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="fotos[]" multiple>
                                </div>
                                <div class="form-group">
                                    <textarea name="mensaje" class="form-control" required data-required-error="Campo Obligatorio" placeholder="Mensaje"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="g-recaptcha" data-sitekey="6LcA4mgUAAAAAP0bSXto7a0bnJ8GA8p-KuRoUBpr" data-callback="captcha_onclick"></div>
                                    <input type="text" name="recaptcha" required value="" id="recaptchaValidator" pattern="1" data-error="Por favor complete el captcha" style="visibility: hidden; display: none;">
                                    <div class="help-block with-errors"></div>
                                    <script>
                                        function captcha_onclick() {
                                            $('#recaptchaValidator').val(1);
                                            $(".form input").focusout();
                                        }
                                    </script>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Contactarme</button>
                                </div>
                            </form>
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
                initWhatsappChat();
            });
        </script>
        
    </body>
</html>
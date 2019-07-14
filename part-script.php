<!-- JQuery-->
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<!-- Font Awesome-->
<script sync defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"></script>
<!-- Google ReCaptcha -->
<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

<!-- Bootstrap-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Custom JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script src="js/min/owl.carousel.min.js"></script>
<script src="js/min/script.min.js"></script>

<script>

<?php if (isset($_GET['success'])){ ?>

    $(document).ready(function(){
        $("#contactSuccessModal").modal("show");
    });

<?php } ?>

</script>
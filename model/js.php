<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
    function sendVerification(){
        console.log("calling")
        $.ajax({
            url: "controller/sendVerificationLink.php",
            data: {
                uid: "<?php echo $user["uid"]; ?>"
            },
            success: function( result ) {
                $(".alert").hide(500);
                console.log("Done")
            }
        });
    }
</script>
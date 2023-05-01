
<?php
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
       echo "<script>window.location.href = 'http://localhost:8080/quan_ly_ban_xe_OOP/index.php'</script>";
    }
?>
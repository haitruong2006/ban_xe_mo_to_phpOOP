<?php
    if(isset($_GET['option'])){
        switch($_GET['option']){
            case'login':
                include"login.php";
                break;   
            case'logout':
                include"logout.php";
                break; 
            case'category':
                include"category.php";
                break;
            case'detail':
                include"detail.php";
                break;
            case'addlikeproduct':
                include"add_like_product.php";
                break;
            case'listlikeproduct':
                include"listlike.php";
                break;
            case'register':
                include"register.php";
                break;
            case'cart':
                include"cart.php";
                break;
          

        }
    }
    else{
        include"home.php";
    }
       
?>


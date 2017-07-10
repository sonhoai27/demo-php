<?php
    require_once("./models/dbcon.php");
    require_once("./views/admin/product.php");
    class ShowAdminProductPage{
        public function showAdminProduct(){
            $getProduct = new ConnectDB();
            $resultPrd = $getProduct->getAllProduct();
            
            $main = new Product();
            $main->ProductPage($resultPrd);
        }
    }
?>
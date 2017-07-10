<?php
    class ProductDetail{
        public function ShowProductDetail(){
            require_once('./views/detail_products.php');
            $main = new Product_Detail();
            $main->Product_Detail_Page();
        }
    }
?>
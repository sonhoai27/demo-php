<?php
    class Sales{
        public function showSales(){
          require_once('./views/sale.php');
            $sale = new Sale();
            $sale->SalePage();
        }
    }
?>

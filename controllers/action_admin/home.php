<?php
    class ShowAdminPage{
        public function showAdmin(){
            require_once("./views/admin/home.php");
            $main = new Admin();
            $main->AdminPage();
        }
    }
?>
<?php
    require_once("./models/dbcon.php");
    class ShowAdminPrdDetail {
        public function showPrdDetail($id){
            require_once("./views/admin/prd_detail.php");
            $db = new ConnectDB();
            $data = $db->getOneProduct($id);
            
            $main = new Prd_Detail();
            $main->PrdDetailPage($data);
        }
    }
?>
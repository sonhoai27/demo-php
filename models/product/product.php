<?php
    ob_start();
    require_once("./models/dbcon.php");
    class M_Product {
        private $db = NULL;
        function M_Product(){
            $this->db = new ConnectDB();
            $this->db->connectdb();
        }

        public function Add_Prd($name, $brand, $price, $sale, $color, $sex, $size, $img1, $img2, $img3){

            $sql = "INSERT INTO watch (name_watch, brand_id, price_watch, sale_watch, size_watch, color_watch, sex_watch, img_1, img_2, img_3)
                VALUES ('$name', '$brand', '$price', '$sale', '$size', '$color', '$sex', '$img1', '$img2', '$img3')";
    
            if($this->db->query($sql) == true){
                echo "Thêm Thành Công";
                $url_dir = "./admin?a=admin_product";
                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href=$url_dir>$url_dir</a>");
                }
                else{
                    exit(header("Location: $url_dir"));
                }
            }else{
                echo "Thêm Thất Bại";
            }
            $this->db->disconnectdb();
        }

        public function Update_Prd($id, $name, $brand, $price, $sale, $color, $sex, $size, $img1, $img2, $img3){
            $sql = "UPDATE watch
            SET name_watch = '$name', brand_id = '$brand', price_watch = '$price', sale_watch = '$sale', size_watch = '$size', color_watch = '$color', sex_watch = '$sex', img_1 = '$img1', img_2 = '$img2', img_3 = '$img3'
            WHERE id_watch = '$id'";

            if($this->db->query($sql) == true){
                echo "Success";
                $url_dir = "./admin?a=admin_product";
                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href=$url_dir>$url_dir</a>");
                }
                else{
                    exit(header("Location: $url_dir"));
                }
            }else{
                echo "Error";
            }
            $this->db->disconnectdb();
        }

        public function Delete_Prd($arr_prd){
            $arr = array();
            $arr = explode(",",$arr_prd);
            $finished = false;
            for($i = 0; $i < count($arr); $i++){
                $id = $arr[$i];
                $sql = "delete from watch where id_watch = '$id'";
                if($this->db->query($sql) == true){
                    $finished = true;
                }
            }
            if($finished == true){
                echo "Success";
                $url_dir = "./admin?a=admin_product";
                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href=$url_dir>$url_dir</a>");
                }
                else{
                    exit(header("Location: $url_dir"));
                }
            }else{
                echo "Error";
            }

            $this->db->disconnectdb();
        }

        public function UpdateImgPrd($id_prd, $key_img, $img_data){
             $sql = "UPDATE watch SET img_$key_img = '$img_data' where id_watch = '$id_prd'";

            $this->db->query($sql);
            $this->db->disconnectdb();
        }
    }
    ob_end_flush();
?>
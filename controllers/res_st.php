<?php
    require_once("./models/product/product.php");
    class RES_ST{
        public function res_img(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if ( 0 < $_FILES['img-sp-1']['error'] ) {
                    echo 'Error: ' . $_FILES['img-sp-1']['error'] . '<br>';
                }
                else {

                    //xy ly id tung san pham
                    $arr_id = array();
                    $handel_id = $_POST['id_prd'];

                    $arr_id = explode(" ", $handel_id);

                    $id_prd = $arr_id[1];
                    $key_img = $arr_id[2];

                    $target_dir = "././public/images/products/";

                    $file_img = $_FILES['img-sp-1'];
                    

                    $target_file = $target_dir .date("H i s"). basename($file_img["name"]);
                    
                    $uploadOk = 1;

                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    
                    $check = getimagesize($file_img["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $uploadOk = 0;
                    }
                    if (file_exists($target_file)) {
                        $uploadOk = 0;
                    }
                     // Check file size
                    if ($file_img["size"] > 5000000) {
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                        echo "error";
                    } else {
                        $main = new M_Product();
                        move_uploaded_file($file_img["tmp_name"], $target_file);
                        $img1 = substr($target_file, 2);
                        $main->UpdateImgPrd($id_prd, $key_img, $img1);
                        echo $img1;
                    }
                }
            }
        }
    }
?>
<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Watches For Men and Women, Handbags, Crystal, Pens - Jomashop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="./public/styles/css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./public/styles/js/script.js"></script>
    <link href="./public/styles/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=vietnamese" rel="stylesheet">
    <script type="text/javascript">
    // var windowsize = $(window).width();

    //     $(window).resize(function() {
    //       var windowsize = $(window).width();
    //     });

    //     if (windowsize < 1000) {
    //       //if the window is greater than 440px wide then turn on jScrollPane..
    //         alert('Not Working')
    //         window.location.href = "http://google.com"
    //     }
   $(document).ready(() => {
       var check_toggle_menu = true
       $(".sh_toggle_menu_left").click(() => {
           if(check_toggle_menu){
                $("#sh_navigation").addClass("sh_hidden")
                $("#sh_content_right").css({"margin-left": "0%"})
                $("#sh_content_right").removeClass("col-xs-10")
                $("#sh_content_right").addClass("col-xs-12")
                check_toggle_menu = false;
           }else{
                $("#sh_navigation").removeClass("sh_hidden")
                $("#sh_content_right").css({"margin-left": "16.4444%"})
                $("#sh_content_right").removeClass("col-xs-12")
                $("#sh_content_right").addClass("col-xs-10")
                check_toggle_menu =true;
           }
       })

    
   })
    $(document).ready(()=> {
        var dem = 0;
        $('#sh_add_new_btn_upload_img').click(() => {
           if(dem < 2){
                $('.input_file_container').append(`<input type="file" name="img-sp[]" id="img-sp" class="input_file">`)
                dem++
           }
            //console.log("AA")
        })
        $("#uploadimage1").on('submit',(function(e) {
            e.preventDefault()
            $.ajax({
                url: "./res_st.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $('#prd_d_img1').attr("src", data)
                    console.log(data)
                }
            });

        }))
        $("#uploadimage2").on('submit',(function(e) {
            e.preventDefault()
            $.ajax({
                url: "./res_st.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $('#prd_d_img2').attr("src", data)
                    console.log(data)
                }
            });

        }))
        $("#uploadimage3").on('submit',(function(e) {
            e.preventDefault()
            $.ajax({
                url: "./res_st.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $('#prd_d_img3').attr("src", data)
                    console.log(data)
                }
            });

        }))
    })
</script>
</head>
    <body>
        <?php
            $dem = 0;
            $controller_path = "controllers/action_admin";
            $controller_path_1 = "controllers/action_admin/product";
    	    $action = isset($_GET['a']) ? $_GET['a']:"";
            require_once("./controllers/action_admin/product/product_c.php");
            require_once("./theme/admin/menu_left.php");
            require_once("./theme/admin/menu-admin-top.php");
            require_once('./controllers/action_admin/home.php');
            require_once('./controllers/action_admin/admin_product.php');
            require_once("./controllers/action_admin/prd_detail.php");
            if($action != ""){
                if(!file_exists("./$controller_path/$action.php")){
                    $dem = 1;
                }
                if((!file_exists("./$controller_path_1/$action.php") && $dem == 1)){
                    $dem = 1;
                }else{
                    $dem = 0;
                }
                if($dem == 0){
                    if($action == "admin_product"){
                    $main = new ShowAdminProductPage();
                    $main->showAdminProduct();
                        }
                    if($action == "prd_detail"){
                        $id = isset($_GET['id']) ? $_GET['id'] : "";
                        $main = new ShowAdminPrdDetail();
                        if($id != ""){
                            $main->showPrdDetail($id);
                        }
                    }
                    if($action == "product_c"){
                        $main = new ShowAdminAddPrd();
                        $dir = isset($_GET['dir']) ? $_GET['dir']:"";
                         if($dir == ""){
                            $main->ShowAddPrd();
                         }else{
                             if($dir == "1"){
                                $name = $brand = $price = $sale = $color = $sex = $size = $img1 = $img2 = $img3 = "";
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    if(isset($_POST['ten-sp'])){
                                        $name = addslashes($_POST['ten-sp']); //cac ky tu dat biet se hien
                                    }
                                    if(isset($_POST['hang-sp'])){
                                        $brand = $_POST['hang-sp'];
                                    }
                                    if(isset($_POST['gia-sp'])){
                                        $price = $_POST['gia-sp'];
                                    }
                                    if(isset($_POST['sale-sp'])){
                                        $sale = $_POST['sale-sp'];
                                    }
                                    if(isset($_POST['mau-sp'])){
                                        $color = $_POST['mau-sp'];
                                    }
                                    if(isset($_POST['size-sp'])){
                                        $size = $_POST['size-sp'];
                                    }
                                    if(isset($_POST['gioi-tinh'])){
                                        $sex = $_POST['gioi-tinh'];
                                    }
                                }
                                $main->AddAdminPrd($name, $brand, $price, $sale, $color, $sex, $size);
                             }
                            if($dir == "2"){
                                $id = $name = $brand = $price = $sale = $color = $sex = $size = $img1 = $img2 = $img3 = "";
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    if(isset($_POST['id-sp'])){
                                        $id = $_POST['id-sp'];
                                    }
                                    if(isset($_POST['ten-sp'])){
                                        $name = addslashes($_POST['ten-sp']); //cac ky tu dat biet se hien
                                    }
                                    if(isset($_POST['hang-sp'])){
                                        $brand = $_POST['hang-sp'];
                                    }
                                    if(isset($_POST['gia-sp'])){
                                        $price = $_POST['gia-sp'];
                                    }
                                    if(isset($_POST['sale-sp'])){
                                        $sale = $_POST['sale-sp'];
                                    }
                                    if(isset($_POST['mau-sp'])){
                                        $color = $_POST['mau-sp'];
                                    }
                                    if(isset($_POST['size-sp'])){
                                        $size = $_POST['size-sp'];
                                    }
                                    if(isset($_POST['gioi-tinh'])){
                                        $sex = $_POST['gioi-tinh'];
                                    }
                                    if(isset($_POST['img-sp-1'])){
                                        $img1 =  addslashes($_POST['img-sp-1']);
                                    }
                                    if(isset($_POST['img-sp-2'])){
                                        $img2 =  addslashes($_POST['img-sp-2']);
                                    }
                                    if(isset($_POST['img-sp-3'])){
                                        $img3 =  addslashes($_POST['img-sp-3']);
                                    }
                                }
                                $main->UpdateAdminPrd($id, $name, $brand, $price, $sale, $color, $sex, $size, $img1, $img2, $img3);
                             }
                            if($dir == "3"){
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    if(isset($_POST['delete_id_watch'])){
                                        $id = $_POST['delete_id_watch'];
                                    }
                                    $main->DeleteAdminPrd($id);
                                }
                            }
                         }
                       
                    }
                }
                else{
                    if($dem != 0){
                        echo "<h1>ERROR 404</h1>";
                        echo $dem;
                    }
                }
                
            }else {
                if($action == ""){
                    $main = new ShowAdminPage();
                    $main->showAdmin();
                }
            }
        ?>
          
    </body>

</html>
<?php
ob_end_flush();
?>
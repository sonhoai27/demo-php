<?php
    class ShowHomePage {
       public function showHomePage(){
           require_once('./views/content.php');
           $content = new Content();
           $content->home();
        }
}
?>

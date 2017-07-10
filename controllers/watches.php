<?php
    class Watch{
        public function showWatches(){
            require_once ('./views/watches.php');
            $main = new Watches();
            $main ->WatchesPage();
        }
    }
?>
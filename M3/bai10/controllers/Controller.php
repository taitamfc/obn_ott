<?php
class Controller{
    public function redirect($url){
        ?>
            <script>
                window.location.href = '<?= $url; ?>';
            </script>
        <?php
    }
}
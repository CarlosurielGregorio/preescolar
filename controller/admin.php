<?php

    class adminController{
        public function __construct(){
            
        }

        public function login(){
            $this->view = 'login';
        }

        public function logout(){
            
            if(isset($_SESSION)){
                session_destroy();
            }
            ?>
                <script>
                    window.location = "<?php echo URL; ?>";
                </script>
            <?php
        }
        
    }

    $admin = new adminController();
?>
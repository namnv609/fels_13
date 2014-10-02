<!DOCTYPE html>
<html lang="vi-VN">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="NamNV609" />
        <title><?php echo $title_for_layout; ?></title>
        <?php
            echo $this->Html->css(array(
                'admin/login'
            ));
        ?>
    </head>
    <body>
        <div class="wrap">
            <div id="content">
                <div id="main">
                    <div class="full_w">
                        <form action="<?php echo SITE_URL . '/login'; ?>" method="post" autocomplete="off">
                            <?php
                                $flashMessage = $this->Session->flash();
                                
                                if(!empty($validationErrs)){
                                    $_validationErrs = Set::flatten($validationErrs);
                                
                                    foreach($_validationErrs as $validationErr){
                                        echo "<p>- $validationErr</p>";
                                    }
                                }
                                if(!empty($flashMessage)){
                                    echo "<p>$flashMessage</p>";
                                }
                            ?>
                            <label for="login">Username:</label>
                            <input id="login" name="txtUserEmail" class="text" value="admin@gmail.com" />
                            <label for="pass">Password:</label>
                            <input id="pass" name="txtUserPassword" type="password" class="text" />
                            <div class="sep"></div>
                            <button type="submit" class="ok">Login</button>
                        </form>
                    </div>
                    <div class="footer">&raquo; <a href="<?php echo SITE_URL; ?>">Framgia E-learning System</a> | NamNV609</div>
                </div>
            </div>
        </div>

    </body>
</html>

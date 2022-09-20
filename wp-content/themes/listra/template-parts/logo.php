<div class="logo fluid-container pt-3 pb-3 d-flex flex-column justify-content-center align-items-center">
    <a href="/">
        <?php 
            $url = get_theme_mod('logo');
            if($url) {
                ?>
                <img src="<?php echo $url ?>"/>
                <?php 
            } else {
                echo get_bloginfo('name');
            }
        ?>
    </a>
</div>

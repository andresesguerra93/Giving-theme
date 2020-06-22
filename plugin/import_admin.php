<?php 
    if($_POST['imp_hidden'] == 'Y') {        
        
        $prod_title = $_POST['imp_prod_title'];
        add_option('imp_prod_title', $prod_title);

        $prod_img_folder = $_POST['imp_prod_img_folder'];
        add_option('imp_prod_img_folder', $prod_img_folder);
 
        $store_url = $_POST['imp_portafolio_url'];
        add_option('imp_portafolio_url', $store_url);

        //crear_base();
        insertar_wpdb();
        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {  
        $prod_title = get_option('imp_prod_title');      
        $prod_img_folder = get_option('imp_prod_img_folder');
        $store_url = get_option('imp_portafolio_url');
    }
?>
<div class="wrap">
    <?php    echo "<h2>" . __( ' Product Display Options', 'imp_trdom' ) . "</h2>"; ?>
     
    <form name="imp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="imp_hidden" value="Y"/>        
        <?php    echo "<h4>" . __( ' Settings', 'imp_trdom' ) . "</h4>"; ?>
        <p><?php _e(" Titulo: " ); ?><input type="text" name="imp_prod_title" value="<?php echo $prod_title; ?>" size="20"></p>
        <p><?php _e(" URL: " ); ?><input type="text" name="imp_portafolio_url" value="<?php echo $store_url; ?>" size="20"></p>
        <p><?php _e("port image folder: " ); ?><input type="text" name="imp_prod_img_folder" value="<?php echo $prod_img_folder; ?>" size="20"></p>
         
     
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'imp_trdom' ) ?>" />
        </p>
    </form>
</div>


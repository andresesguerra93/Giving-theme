<?php
/*
    Plugin Name: andres esguerra
    Plugin URI: 
    Description: plugin portafolio
    Author: andres esguerra
    Version: 1.0
    Author URI: 
    */
function imp_getprot($prot_cnt)
{
    global $wpdb;

    // $userdb = get_option('imp_dbuser');
    // $passdb = get_option('imp_dbpwd');
    // $dbname = get_option('imp_dbname');
    // $dbhost = get_option('imp_dbhost');

    // $portafoliodb = new wpdb($userdb,$passdb, $dbname, $dbhost);                        
    $retval = '';
    $prot_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_plugin");
    //for ($i = 1; $i < $prot_count; $i++) {
        $i = 1;    
    while($i <= $prot_count){    
        //$prot_count = 0;
        //if ($prot_count == 0) {
            $prot_id = $i;
        //}
        $prot_title = $wpdb->get_var("SELECT titulo FROM wp_plugin WHERE prots_id=$prot_id");
        $portafolio_url = $wpdb->get_var("SELECT url_pagina FROM wp_plugin WHERE prots_id=$prot_id");
        $image_folder = $wpdb->get_var("SELECT url_imagen FROM wp_plugin WHERE prots_id=$prot_id");

        $retval .= '<div class="imp_prot">';
        $retval .= '<a href="' . $portafolio_url . 'prot_info.php?prots_id=' . $prot_id . '"><img src="' . $image_folder. '" /></a><br />';
        $retval .= '</div>';


        return $retval;
    }
}

function imp_admin()
{
    include('import_admin.php');
}

function imp_admin_actions()
{
    add_options_page("Prot Display", "Prot Display", 1, "Prot Display", "imp_admin");
}

function crear_base()
{

    global $wpdb;

     $table_name = $wpdb->prefix . 'plugin';

    // Declaramos la tabla que se creará de la forma común.
    $sql = "CREATE TABLE $table_name (
            `prots_id` int(11) NOT NULL AUTO_INCREMENT,
            `titulo` varchar(255) NOT NULL,
            `url_imagen` varchar(255) NOT NULL,
            `url_pagina` varchar(255) NOT NULL,
            UNIQUE KEY prots_id (prots_id)
          );";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    dbDelta($sql);
}

function insertar_wpdb(){
    

    global $wpdb;

    $prot_title = $_POST['imp_prod_title'];
    $prot_name = $_POST['imp_prod_img_folder'];
    $portafolio_url = $_POST['imp_portafolio_url'];

    $table_name = $wpdb->prefix . "plugin";
    $wpdb->insert( $table_name, array(
        'titulo' => $prot_title, 
        'url_imagen' => $prot_name,
        'url_pagina' => $portafolio_url
    ) );
  }
  

add_action('wp', 'crear_base');
add_action('wp', 'insertar_wpdb');
add_action('admin_menu', 'imp_admin_actions');

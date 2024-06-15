<?php
/**
 * Plugin Name: My Guntenberg Blocks
 * Description: Mi plugin con bloques
 * Version: 1.0
 * Author: Marialaura Miranda Villegas
 */

 if(!defined("ABSPATH")){
    exit;
 };

 function my_guntenberg_blocks_register_blocks() {
   $asset_file = include(plugin_dir_path( __FILE__ ) ."/build/index.asset.php");

   //Registrar scripts editor de bloque
   wp_enqueue_script(
       "my-blocks-editor",
       plugin_dir_url(__FILE__) . "build/index.js",
       $asset_file["dependencies"],
       $asset_file["version"]
   );



   //Regsitrar estilos de editor de bloques
   wp_register_style(
       "my-blocks-editor-style",
       plugins_url("build/editor.css", __FILE__), 
       array(),
       $asset_file['version']
   );


   //Regsitrar estilos de front-end
    wp_register_style(
        "my-blocks-style",
        plugins_url("build/style.css", __FILE__), 
        array(),
        $asset_file['version']
   );

   require_once plugin_dir_path( __FILE__ ) . 'includes/blocks/sketchfab-block.php';
  // require_once plugin_dir_path( __FILE__ ) . 'blocks/poke-block.php';
}

add_action('init','my_guntenberg_blocks_register_blocks');
?>
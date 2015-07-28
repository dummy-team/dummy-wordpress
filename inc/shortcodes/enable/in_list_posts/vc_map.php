<?php
  vc_map( array(
    'name' => 'Hello World',
    'base' => 'in_list_posts',
    'icon' => 'thb_vc_ico_post',
    'class' => 'thb_vc_sc_post',
    'category' => 'Inouit',
    'params'    => array(
     array(
       'type' => 'textfield',
       'heading' => 'Titre',
       'param_name' => 'title',
       'description' => 'Titre',
     ),
     array(
         'type' => 'vc_link',
         'heading' => 'Lien',
         'param_name' => 'link',
         'description' => 'Entrez l\'url du lien'
     ),
    ),
    'description' => 'Lien mis en avant'
  ) );
?>

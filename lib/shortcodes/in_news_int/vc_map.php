<?php
vc_map(
    array(
        "name" => "Bloc actus Home",
        "base" => "in_news_home",
        "content_element" => true,
        "icon" => "thb_vc_ico_post",
        "class" => "thb_vc_sc_post",
        "category" => "Inouit",
        "description" => "Afficher les acticles en home",
        "params"  => array(
            array(
                "type" => "textfield",
                "heading" => "Nombre de news",
                "param_name" => "limit_show_news",
                "description" => "Nombre de news à afficher",
            ),
        ),
    )
);

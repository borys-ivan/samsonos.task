<?php

return array(
    
 
    'delete_page/([0-9]+)'=>'site/DeletePage/$1',

    'update_page/([0-9]+)'=>'site/UpdatePage/$1',

    'original_image/([0-9]+)'=>'site/OriginalImage/$1',

    'image/([0-9]+)'=>'site/PageImage/$1',





    'page-([0-9]+)'=>'site/index/$1',

    'add_image'=>'site/addImage',


    '' => 'site/index', // actionIndex в SiteController

);

(function($){
    "use strict";
    
    let $webteck_page_breadcrumb_area      = $("#_webteck_page_breadcrumb_area");
    let $webteck_page_settings             = $("#_webteck_page_breadcrumb_settings");
    let $webteck_page_breadcrumb_image     = $("#_webteck_breadcumb_image");
    let $webteck_page_title                = $("#_webteck_page_title");
    let $webteck_page_title_settings       = $("#_webteck_page_title_settings");

    if( $webteck_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--webteck-page-breadcrumb-settings").show();
        if( $webteck_page_settings.val() == 'global' ) {
            $(".cmb2-id--webteck-breadcumb-image").hide();
            $(".cmb2-id--webteck-page-title").hide();
            $(".cmb2-id--webteck-page-title-settings").hide();
            $(".cmb2-id--webteck-custom-page-title").hide();
            $(".cmb2-id--webteck-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--webteck-breadcumb-image").show();
            $(".cmb2-id--webteck-page-title").show();
            $(".cmb2-id--webteck-page-breadcrumb-trigger").show();
    
            if( $webteck_page_title.val() == '1' ) {
                $(".cmb2-id--webteck-page-title-settings").show();
                if( $webteck_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--webteck-custom-page-title").hide();
                } else {
                    $(".cmb2-id--webteck-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--webteck-page-title-settings").hide();
                $(".cmb2-id--webteck-custom-page-title").hide();
    
            }
        }
    } else {
        $webteck_page_breadcrumb_area.parents('.cmb2-id--webteck-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $webteck_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--webteck-page-breadcrumb-settings").show();
            if( $webteck_page_settings.val() == 'global' ) {
                $(".cmb2-id--webteck-breadcumb-image").hide();
                $(".cmb2-id--webteck-page-title").hide();
                $(".cmb2-id--webteck-page-title-settings").hide();
                $(".cmb2-id--webteck-custom-page-title").hide();
                $(".cmb2-id--webteck-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--webteck-breadcumb-image").show();
                $(".cmb2-id--webteck-page-title").show();
                $(".cmb2-id--webteck-page-breadcrumb-trigger").show();
        
                if( $webteck_page_title.val() == '1' ) {
                    $(".cmb2-id--webteck-page-title-settings").show();
                    if( $webteck_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--webteck-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--webteck-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--webteck-page-title-settings").hide();
                    $(".cmb2-id--webteck-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--webteck-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $webteck_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--webteck-page-title-settings").show();
            if( $webteck_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--webteck-custom-page-title").hide();
            } else {
                $(".cmb2-id--webteck-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--webteck-page-title-settings").hide();
            $(".cmb2-id--webteck-custom-page-title").hide();

        }
    });

    //page settings
    $webteck_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--webteck-breadcumb-image").hide();
            $(".cmb2-id--webteck-page-title").hide();
            $(".cmb2-id--webteck-page-title-settings").hide();
            $(".cmb2-id--webteck-custom-page-title").hide();
            $(".cmb2-id--webteck-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--webteck-breadcumb-image").show();
            $(".cmb2-id--webteck-page-title").show();
            $(".cmb2-id--webteck-page-breadcrumb-trigger").show();
    
            if( $webteck_page_title.val() == '1' ) {
                $(".cmb2-id--webteck-page-title-settings").show();
                if( $webteck_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--webteck-custom-page-title").hide();
                } else {
                    $(".cmb2-id--webteck-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--webteck-page-title-settings").hide();
                $(".cmb2-id--webteck-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $webteck_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--webteck-custom-page-title").hide();
        } else {
            $(".cmb2-id--webteck-custom-page-title").show();
        }
    });
    
})(jQuery);
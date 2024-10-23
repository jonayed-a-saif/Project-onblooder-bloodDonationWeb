/*

[Main Script]

Project: Traga
Version: 1.0
Author : angfuzsoft.com

*/
;(function($){
    "use strict";

    jQuery(window).on( 'elementor/frontend/init', function() {
        // console.log( elementorFrontend);
        if( typeof elementor != "undefined" && typeof elementor.settings.page != "undefined" ) {

            elementor.settings.page.addChangeCallback( 'webteck_header_style', function ( newValue ) {
                if( newValue == 'prebuilt'  ) {
                    elementor.saver.update({
                        onSuccess: function() {
                            elementor.reloadPreview();
                            elementor.once( 'preview:loaded', function() {
                                elementor.getPanelView().setPage( 'page_settings' ).activateTab('settings');
                            } );
                        }
                    });
                }
            } );
            

            elementor.settings.page.addChangeCallback( 'webteck_header_builder_option', function ( newValue ) {
                elementor.saver.update({
                    onSuccess: function() {
                        elementor.reloadPreview();
                        elementor.once( 'preview:loaded', function() {
                            elementor.getPanelView().setPage( 'page_settings' ).activateTab('settings');
                        } );
                    }
                });
            } );
            
            elementor.settings.page.addChangeCallback( 'webteck_footer_style', webteckFooterStyle );
            function webteckFooterStyle ( newValue ) {
                elementor.saver.update({
                    onSuccess: function() {
                        elementor.reloadPreview();
                        elementor.once( 'preview:loaded', function() {
                            elementor.getPanelView().setPage( 'page_settings' ).activateTab('settings');
                        } );
                    }
                });
            }
            elementor.settings.page.addChangeCallback( 'webteck_footer_choice', webteckFooterChoice );
            function webteckFooterChoice ( newValue ) {
                elementor.saver.update({
                    onSuccess: function() {
                        elementor.reloadPreview();
                        elementor.once( 'preview:loaded', function() {
                            elementor.getPanelView().setPage( 'page_settings' ).activateTab('settings');
                        } );
                    }
                });
            }

        }
    });
    
})(jQuery);
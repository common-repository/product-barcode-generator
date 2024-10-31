<?php



    register_setting("pbarginerator_print_option", "pbarginerator_print_option", array(
        $this,
        'pbarginerator_print_option_page_sanitize'
    ));

    register_setting("pbr_print_ajax", "pbr_print_ajax", array(
        $this,
        'pbr_print_ajax_sanitize'
    )); 


    add_settings_section("pbr_section_setting", " ", array(
        $this,
        'qrc_print_settting_func'
    ) , 'pbarcode_print_setting');

    add_settings_section("pbrc_print_section", "", array(
        $this,
        'pbrc_print_section_func'
    ) , 'pbrc_print_sections');

    add_settings_section("pbardownload_section", " ", array(
        $this,
        'pbardownlaod_section_func'
    ) , 'pbar_downlaod_section');


    add_settings_section("pbar_preview_demo", " ", array(
        $this,
        'pbar_preview_demo'
    ) , 'pbar_preview_demo_section');


    add_settings_section("pbar_shortcodesetting", " ", array(
        $this,
        'pbar_shortcosssg'
    ) , 'pbar_shortcodesettings');


    add_settings_field("barcode_color_settings", esc_html__("Color Setting", "product-barcode-generator") , array(
        $this,
        "barcode_color_settings"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_hidemobi']);

    add_settings_field("pbarcode_format", esc_html__("Barcode Format", "product-barcode-generator") , array(
        $this,
        "pbarcode_format"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_format']);

    add_settings_field("pbarcode_value", esc_html__("Barcode Content:", "product-barcode-generator") , array(
        $this,
        "pbarcode_value"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_vakus']);
    
    add_settings_field("pbarcode_types", esc_html__("Barcode Type", "product-barcode-generator") , array(
        $this,
        "pbarcode_types"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_tye']);

    add_settings_field("pbarcode_width", esc_html__("Barcode Width", "product-barcode-generator") , array(
        $this,
        "pbarcode_width"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_width']);

    add_settings_field("barcode_height_set_page", esc_html__("Barcode  height", "product-barcode-generator") , array(
        $this,
        "barcode_height_set_page"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_height']);



    add_settings_field("pbar_labeltaxonmy", esc_html__("Barcode Label Typography", "product-barcode-generator") , array(
        $this,
        "pbar_labeltaxonmy"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_labeltaxonmy']);

    add_settings_field("pbar_title_color", esc_html__("Product Title and Price Typography", "product-barcode-generator") , array(
        $this,
        "pbar_title_color"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_titcolor']);

    add_settings_field("pbarcode_madeby", esc_html__("Add Custom Text (Premium)", "product-barcode-generator") , array(
        $this,
        "pbarcode_madeby"
    ) , 'pbarcode_print_setting', "pbr_section_setting",['class' => 'parcode_madeby']);

    add_settings_section("pbar_printsetting", " ", array() , 'pbar_printsettings');


    add_settings_field("qr_print_per_page", esc_html__("Print & Download Page:", "product-barcode-generator") , array(
        $this,
        "qr_print_per_page"
    ) , 'pbar_printsettings', "pbar_printsetting");


    add_settings_field("pbarcode_enable_frontend", esc_html__("Turn off Auto Display on single product page", "product-barcode-generator") , array(
        $this,
        "pbarcode_enable_frontend"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");

    add_settings_field("pbarcode_downlaobtn", esc_html__("Download Button", "product-barcode-generator") , array(
        $this,
        "pbarcode_downlaobtn"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");
    add_settings_field("pbarcode_enable_shoppage", esc_html__("Turn off auto Display on Shop page", "product-barcode-generator") , array(
        $this,
        "pbarcode_enable_shoppage"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");

    add_settings_field("barcode_for_signgle_Page", esc_html__("Shortcode for Single Product Page", "product-barcode-generator") , array(
        $this,
        "barcode_for_signgle_Page"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");
    
    add_settings_field("barcode_for_shop_Page", esc_html__("Shortcode for Shop Page", "product-barcode-generator") , array(
        $this,
        "barcode_for_shop_Page"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");

    add_settings_field("barcode_enable_print_shtco", esc_html__("Enable Print Shortcode?", "product-barcode-generator") , array(
        $this,
        "barcode_enable_print_shtco"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");

    
    add_settings_field("barcode_enable_down_shtco", esc_html__("Enable Download Shortcode?", "product-barcode-generator") , array(
        $this,
        "barcode_enable_down_shtco"
    ) , 'pbar_shortcodesettings', "pbar_shortcodesetting");
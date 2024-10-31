<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Product_barcode
 * @subpackage Product_barcode/class
 * @author     Sharabindu <sharabindu86@gmail.com>
 */

register_setting("pbarginerator_ordeermails", "pbarginerator_ordeermails", array(
    $this,
    'pbarginerator_ordeermails_page_sanitize'
)); // sanitize_callback);
add_settings_section("pbr_ordeermails_section_setting", " ", array(
    $this,
    "pbr_ordeermails_section_se"
) , 'pbr_ordeermails__setting');

add_settings_section("pbar_preview_orderdemo", " ", array(
    $this,
    "pbar_preview_demo"
) , 'pbar_preview_orderdemos');

add_settings_field("barcode_print_css_labess", esc_html__("Order barcode", "product-barcode-generator") , array(
        $this,
        "barcode_print_css_labess"
    ) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting",['class' => 'barcode_print_css_labess']);

add_settings_field("pbarcode_value", esc_html__("barcode content:", "product-barcode-generator") , array(
    $this,
    "pbarcode_value"
) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting", ['class' => 'pbarcode_values']);


add_settings_field("orders_page_product", esc_html__("Turn off Product barcode on order dashbord", "product-barcode-generator") , array(
    $this,
    "orders_page_product"
) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting", ['class' => 'orders_page_product']);

add_settings_field("orders_page_orbarcode", esc_html__("Turn off Order barcode on order dashbord", "product-barcode-generator") , array(
    $this,
    "orders_page_orbarcode"
) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting", ['class' => 'orders_page_orbarcode']);

add_settings_field("orders_types", esc_html__("Show the order barcode in the order email  (Pro)", "product-barcode-generator") , array(
    $this,
    "orders_types"
) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting", ['class' => 'orders_types']);
add_settings_field("orders_mail_product", esc_html__("Turn On Product barcode on order mail (Pro)", "product-barcode-generator") , array(
    $this,
    "orders_mail_product"
) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting", ['class' => 'orders_mail_product']);


    add_settings_field("barcode_print_css_labe", esc_html__("Barcode on Order invoice (Pro)", "product-barcode-generator") , array(
        $this,
        "barcode_print_css_labe"
    ) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting",['class' => 'barcode_print_css_labe']);
    add_settings_field("pdfshoes_types", esc_html__("Display barcode (Pro)", "product-barcode-generator") , array(
        $this,
        "pdfshoes_types"
    ) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting",['class' => 'pdfshoes_types']);


add_settings_field("orders_pdf_product", esc_html__("Turn off Product barcode on PDF (Pro)", "product-barcode-generator") , array(
    $this,
    "orders_pdf_product"
) , 'pbr_ordeermails__setting', "pbr_ordeermails_section_setting",['class' => 'orders_pdf_product']);
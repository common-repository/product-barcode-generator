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
class PbrpdfLiteBarcode
{
    public function __construct()
    {


        add_action('add_meta_boxes', array(
            $this,
            'mv_add_meta_boxes'
        ));
        add_action('woocommerce_after_order_itemmeta', array(
            $this,'pbrorder_pagebarcode'
        ) , 10, 3);

    }

    function mv_add_meta_boxes()
    {

        $options = get_option('pbarginerator_ordeermails');

        $turnoff = isset($options['orders_page_orbarcode']) && $options['orders_page_orbarcode'] === 'orders_page_orbarcode' ? 'checked' : '';

        if($turnoff !== 'checked'){       
        add_meta_box('mv_other_fields', __('Order Barcode', 'product-barcode-generator') , array(
            $this,
            'mv_add_other_fields_for_packaging'
        ) , array('woocommerce_page_wc-orders','shop_order'), 'side', 'core');
    }
    }


    function mv_add_other_fields_for_packaging()
    {

        global $post;
        wp_enqueue_script('pbr-order');
        wp_enqueue_script('dom-to-image');
        wp_enqueue_script('print_option');
        $order = wc_get_order();
        if($order){

        $transaction_id = $order->get_transaction_id();

        $order_id = $order->get_id();
        $options = get_option('pbarginerator_ordeermails');

        $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'orderid';

        $pbarcode_value_prefix = isset($options['pbarcode_value_prefix']) ? $options['pbarcode_value_prefix'] : 'no';
        $pbarcode_value_prefixyes = isset($options['pbarcode_value_prefixyes']) ? $options['pbarcode_value_prefixyes'] : '';

        if ($pbarcode_value_prefix === 'yes')
        {

            $orderidsvalue = $pbarcode_value_prefixyes . $order_id;
        }
        else
        {
            $orderidsvalue = $order_id;
        }
        if ($pbarcode_value === 'orderid')
        {

            $barcodetext = $orderidsvalue;
        }
        else
        {
            $barcodetext = $transaction_id;
        }

        echo '<div class="sjkdhshr75"><div id="pro_barqr_print_wrapeprsdsd"  style="text-align:left;background: #fff;width:fit-content;"><div id="pro_barqr_print_wrapepr" style="text-align:left;width:fit-content;"><div id="pbdorderbarcodewrapper"><img class="pbdorderbarcode" data-ordercont="'.$barcodetext.'" id="pbdorderba_'.$order_id.'"></div></div></div></div>';

       echo '<div class="download_Pbar_conwrap" style="justify-content: center;">
            <a id="download_Pbar_con">
            <button type="button" class="button button-primary" title="Download Barcode"><span class="dashicons dashicons-download"></span></button>
            </a>
            <button id="printButton" type="button" class="button button-primary pbrpritnbtn" title="Print Barcode"><span class="dashicons dashicons-printer"></span></button></div><script>jQuery("#download_Pbar_con").on("click", function () {
        var node = document.getElementById("pro_barqr_print_wrapeprsdsd");
            domtoimage.toPng(node).then(function (dataUrl) {
        var anchorTag = document.createElement("a");
        anchorTag.download = "' . $barcodetext . '.png";
        anchorTag.href = dataUrl;
        anchorTag.target = "_blank";
            anchorTag.click();    });
    })
            </script>';




    }
    }
    function pbrorder_pagebarcode($item_id, $item, $product) {
    if($product){
        $sku           = $product->get_sku();
        $name           = $product->get_name();
        $id           = $product->get_id();

        $options = get_option('pbarginerator_ordeermails');

        $options1 = get_option('pbarginerator_print_option');
        $barcodevalue = isset($options1['pbarcode_value']) ? $options1['pbarcode_value'] : 'sku';

        $options = get_option('pbarginerator_print_option');
        $pbrdigit = isset($options['pbrdigit']) ? $options['pbrdigit'] : '6';
        $jhsdg = substr(number_format('84834348' * $id,0,'',''),0,$pbrdigit);



        if ($barcodevalue == 'sku'){
        $barcodetext = $sku;
        }
        if ($barcodevalue == 'ID'){
            $barcodetext = $id;
        }
        if ($barcodevalue == 'pbrnumber'){
            $barcodetext = $jhsdg;
        }

    $turnoff = isset($options['orders_page_product']) && $options['orders_page_product'] === 'orders_page_product' ? 'checked' : '';
        $hrmls =   '<div id="pbdorderbarcodewrapper" ><img class="pbdorderbarcode" id="pbarbarcode_'.$id.'" data-ordercont="'.$barcodetext.'"></div>';


        if(!$turnoff){
        echo $hrmls;
        wp_enqueue_script('JsBarcode');
        wp_enqueue_script('pbr-order');
     }
        }



}

}
if (class_exists("PbrpdfLiteBarcode"))
{

    new PbrpdfLiteBarcode;
}


<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      3.0.1
 *
 * @package    pbar_generator_pro
 * @subpackage pbar_generator_pro/admin
 */

class Pbarcode_Generator_Ordermail
{

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'qcr__print_setting'
        ));
        
    }
    function qcr__print_setting()
    {
        require_once PBARGENERATOR_PATH . 'admin/extenstion/register_settings_order.php';

    }
    function barcode_print_css_labe() {
    return true;
    }
    function barcode_print_css_labess() {
    return false;
    }
    function pbr_ordeermails_section_se()
    {
      return;
    }
    function orders_mail_product() {
        printf('<input type="checkbox" class="pbrapple-switch">');

        echo '<div style="margin-top: 16px;"><a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=codemanas-woocommerce-preview-emails" target="_blank">Pro Admin Demo of Order Page</a></div>';
    }
    function orders_pdf_product() {

        printf('<input type="checkbox" class="pbrapple-switch">');
    }
    function orders_page_product() {
        $options = get_option('pbarginerator_ordeermails');
        printf('<input type="checkbox" name="pbarginerator_ordeermails[orders_page_product]" class="pbrapple-switch"   value="orders_page_product" %s>', (isset($options['orders_page_product']) && $options['orders_page_product'] === 'orders_page_product') ? 'checked' : '');
    }

    function orders_page_orbarcode() {
        $options = get_option('pbarginerator_ordeermails');
        printf('<input type="checkbox" name="pbarginerator_ordeermails[orders_page_orbarcode]" class="pbrapple-switch"   value="orders_page_orbarcode" %s>', (isset($options['orders_page_orbarcode']) && $options['orders_page_orbarcode'] === 'orders_page_orbarcode') ? 'checked' : '');
    }

    function orders_types()
    {

    ?>
    
        <select>
        <option value="never"><?php esc_html_e('Never show in order emails', 'product-barcode-generator') ?></option>

        <option value="all"><?php esc_html_e('Show in all order emails', 'product-barcode-generator') ?></option>

        <option value="completed"><?php esc_html_e('only when order Status: "completed"', 'product-barcode-generator') ?></option>

        </select> <div style="margin-top: 16px;"><a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=codemanas-woocommerce-preview-emails" target="_blank">Pro Admin Demo for Order email</a></div>
    <?php
    }
    function pdfshoes_types()
    {
                echo '<img class="pbrimageselct" id="pbrimageselct1" src="' . PBARGENERATOR_URL . '/admin/img/icon-128x128.png" alt=""><a id="pbr-pdf" video-url="https://www.youtube.com/watch?v=nYdeRsB1_MI"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a>
  <div style="margin-top: 16px;"><a href="https://barcode-admin.dipashi.com/wp-admin/post.php?post=275&action=edit" target="_blank">Pro Admin Demo of Order Page</a></div>';
    }

    function pbarcode_value()
    {

        $options = get_option('pbarginerator_ordeermails');
        $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'orderid';
        $pbarcode_value_prefix = isset($options['pbarcode_value_prefix']) ? $options['pbarcode_value_prefix'] : 'no';
        $pbarcode_value_prefixyes = isset($options['pbarcode_value_prefixyes']) ? $options['pbarcode_value_prefixyes'] : '';
        if ($pbarcode_value_prefix === 'yes')
        {
            $display = 'inline-block';
        }
        else
        {
            $display = 'none';
        }
?>
 
        <select name="pbarginerator_ordeermails[pbarcode_value]" id="ordebarcodevalue">


        <option value="orderid"  <?php echo esc_attr($pbarcode_value) === 'orderid' ? 'selected' : '' ?>><?php esc_html_e('The order Number', 'product-barcode-generator') ?></option>

        <option value="transation"  <?php echo esc_attr($pbarcode_value) === 'transation' ? 'selected' : '' ?>><?php esc_html_e('The Transation Number', 'product-barcode-generator') ?></option>


        </select><a id="pbr-oder" video-url="https://www.youtube.com/embed/66w6ZPVBXo0?si=YIM6lOBgIOtA7rhJ"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a><a class="inlinedocs" href="https://barcode.dipashi.com/docs/order-mail-barcode/">Docs</a>
        <div id="ordebarcodevalueprfixwrapper">
    <p style="margin-top:20px"><label for="ordebarcodevalueprfix" style="display: inline-block;padding-bottom:10px"><strong> Want to Add Prefix in barcode before order ID</strong> <em>(Optional)</em></label></p>

        <select name="pbarginerator_ordeermails[pbarcode_value_prefix]" id="ordebarcodevalueprfix" >


        <option value="yes"  <?php echo esc_attr($pbarcode_value_prefix) === 'yes' ? 'selected' : '' ?>><?php esc_html_e('Yes', 'product-barcode-generator') ?></option>

        <option value="no"  <?php echo esc_attr($pbarcode_value_prefix) === 'no' ? 'selected' : '' ?>><?php esc_html_e('NO', 'product-barcode-generator') ?></option>


        </select>
    <input style="display: <?php echo $display; ?>" id="pbarcode_value_prefixyes" type="text" value="<?php echo $pbarcode_value_prefixyes ?>" placeholder="BDX-DXN" name="pbarginerator_ordeermails[pbarcode_value_prefixyes]"></div>
    <?php
    }

    function pbar_preview_demo()
    { ?>
<div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h">Order Email barcode (Premium)</h4>
                    
                     <p>Automatically generates barcode for every new order and old order. WC order email barcode, can be created from different elements.</p>
                     <img style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo PBARGENERATOR_URL . 'admin/img/order-email.png' ?>" alt="Pro Features">


                     <a class="qrc_gtnow" href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=codemanas-woocommerce-preview-emails">Order Email Demo</a>
<a class="oreremils" id="orderemail" video-url="https://www.youtube.com/watch?v=66w6ZPVBXo0" style="cursor: pointer;"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a>

         <h4 class="pro_ftcs__h">Order barcode in PDF Invoice</h4>
 <img style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo PBARGENERATOR_URL . 'admin/img/invoce.png' ?>" alt="Pro Features">
                     <a class="qrc_gtnow" href="https://barcode-admin.dipashi.com/wp-admin/edit.php?post_type=shop_order">Live PDF Demo</a>
                 </div>

<?php
    }

    function pbarginerator_ordeermails_page_sanitize($input)
    {
        $sanitary_values = array();

        if (isset($input['pbarcode_value']))
        {
            $sanitary_values['pbarcode_value'] = ($input['pbarcode_value']);
        }
        if (isset($input['pbarcode_value_prefix']))
        {
            $sanitary_values['pbarcode_value_prefix'] = ($input['pbarcode_value_prefix']);
        }
        if (isset($input['pbarcode_value_prefixyes']))
        {
            $sanitary_values['pbarcode_value_prefixyes'] = ($input['pbarcode_value_prefixyes']);
        }
        if (isset($input['orders_page_orbarcode']))
        {
            $sanitary_values['orders_page_orbarcode'] = ($input['orders_page_orbarcode']);
        }
        if (isset($input['orders_page_product']))
        {
            $sanitary_values['orders_page_product'] = ($input['orders_page_product']);
        }
        return $sanitary_values;
    }
}

if (class_exists("Pbarcode_Generator_Ordermail"))
{

    new Pbarcode_Generator_Ordermail;
}


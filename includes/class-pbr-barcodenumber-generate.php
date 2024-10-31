<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    product-barcode-generator
 * @subpackage product-barcode-generator/admin
 */


class Pbar_Litenumbergenrate
{
    public function __construct()
    {

        add_filter('manage_edit-product_columns', array(
            $this,
            'pbr_admin_products_visibility_column'
        ) , 9999);

        add_action('manage_product_posts_custom_column', array(
            $this,
            'pbr_admin_products_visibility_column_content'
        ) , 10, 2);

        add_filter('manage_edit-product_sortable_columns', array(
            $this,
            'pbr_admin_products_visibility_column_sortable'
        ));

        add_action('woocommerce_product_quick_edit_start', array(
            $this,
            'pbr_showpbg_meta_barcode_quick_edit'
        ));
        add_action('manage_product_posts_custom_column', array(
            $this,
            'pbr_showpbg_meta_barcode_quick_edit_data'
        ) , 9999, 2);

        add_action('woocommerce_product_quick_edit_save', array(
            $this,
            'pbr_savepbg_meta_barcode_quick_edit'
        ));

        add_action('woocommerce_product_meta_end', array(
            $this,
            'pabr_frontend_displaynumber'
        ));
    add_filter( 'woocommerce_locate_template',  array($this,'woo_adon_plugin_template'), 1, 3 );

    }

   function woo_adon_plugin_template( $template, $template_name, $template_path ) {

    
     global $woocommerce;
     $_template = $template;
     if ( ! $template_path ) 
        $template_path = $woocommerce->template_url;
 
     $plugin_path  = untrailingslashit(PBARGENERATOR_PATH ) . '/admin/woocommerce/';
    $template = locate_template(
    array(
      $template_path . $template_name,
      $template_name
    )
   );
 
   if( ! $template && file_exists( $plugin_path . $template_name ) )
    $template = $plugin_path . $template_name;
 
   if ( ! $template )
    $template = $_template;

   return $template;

}



    function pbr_admin_products_visibility_column($columns)
    {

        $columns['barcode'] = 'barcode';
        return array_slice($columns, 0, 3, true) + array(
            'barcode' => 'barcode'
        ) + array_slice($columns, 3, count($columns) - 3, true);
    }

    function pbr_admin_products_visibility_column_content($column, $product_id)
    {
            if ($column == 'barcode')
            {
                $product = wc_get_product($product_id);
                $options = get_option('pbarginerator_print_option');
                $pbrdigit = isset($options['pbrdigit']) ? $options['pbrdigit'] : '6';
                $jhsdg = substr(number_format('84834348' * get_the_ID() , 0, '', '') , 0, $pbrdigit);
    $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
            $meta_value = get_post_meta(get_the_ID() , 'pbg_meta_barcode', true);
        $product = wc_get_product(get_the_ID());
                if (! empty( $meta_value )){
                    $printSju = $meta_value;  
                    }else{
                     $printSju = $jhsdg;  
                    }
                echo $printSju;

            }
        }

    function pbr_admin_products_visibility_column_sortable($columns)
    {
        $columns['barcode'] = 'barcode';
        return $columns;
    }

    function pbr_showpbg_meta_barcode_quick_edit()
    {
            $options = get_option('pbarginerator_print_option');
            $pbrdigit = isset($options['pbrdigit']) ? $options['pbrdigit'] : '6';
            $jhsdg = substr(number_format('84834348' * get_the_ID() , 0, '', '') , 0, $pbrdigit);
        $product = wc_get_product(get_the_ID());
    $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
            $meta_value = get_post_meta(get_the_ID() , 'pbg_meta_barcode', true);

                if (! empty( $meta_value )){
                    $printSju = $meta_value;  
                    }else{
                     $printSju = $jhsdg;  
                    }

?>
   <label>
      <span class="title"> <?php echo esc_html__('Barcode', 'product-barcode-generator') ?></span>
      <span class="input-text-wrap">
         <input type="text" name="pbg_meta_barcode" class="text" value="<?php echo $printSju ?>">
      </span>
   </label>
   <br class="clear" />
   <?php
   
    }

    function pbr_showpbg_meta_barcode_quick_edit_data($column, $post_id)
    {

            $options = get_option('pbarginerator_print_option');
            $pbrdigit = isset($options['pbrdigit']) ? $options['pbrdigit'] : '6';
            $jhsdg = substr(number_format('84834348' * get_the_ID() , 0, '', '') , 0, $pbrdigit);
        $product = wc_get_product(get_the_ID());
    $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
            $meta_value = get_post_meta(get_the_ID() , 'pbg_meta_barcode', true);

                 if (! empty( $meta_value )){
                    $printSju = $meta_value;  
                    }else{
                     $printSju = $jhsdg;  
                    }
            echo '<span id="cf_' . $post_id . '" data="' . $printSju . '"></span>';
            wc_enqueue_js("
      $('#the-list').on('click', '.editinline', function() {
         var post_id = $(this).closest('tr').attr('id');
         post_id = post_id.replace('post-', '');
         var custom_field = $('#cf_' + post_id).attr('data');
         $('input[name=\'pbg_meta_barcode\']', '.inline-edit-row').val(custom_field);
        });


    ");
      
    }

    function pbr_savepbg_meta_barcode_quick_edit($product)
    {
        $post_id = $product->get_id();
        if (isset($_REQUEST['pbg_meta_barcode']))
        {
            $custom_field = $_REQUEST['pbg_meta_barcode'];
            update_post_meta($post_id, 'pbg_meta_barcode', wc_clean($custom_field));
        }
    }



    

    function pabr_frontend_displaynumber()
    {


            $options = get_option('pbarginerator_print_option');
            $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
        $enablefrontend = isset($options['pbarcode_enable_frontend']) && $options['pbarcode_enable_frontend'] === 'pbarcode_enable_frontend' ? 'checked' : '';
           if($enablefrontend != 'checked'){ 
            echo '<p id="pbrloaders">Loading...</p><p class="pbreotiri"><strong>' . esc_html__('Barcode', 'product-barcode-generator') . '</strong>: <span class="brlslds"></span></p>';
            }
        
    }

}
if (class_exists('Pbar_Litenumbergenrate'))
{

    new Pbar_Litenumbergenrate();
}


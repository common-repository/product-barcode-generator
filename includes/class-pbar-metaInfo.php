<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      5.0.1
 *
 * @package    pbar_generator_pro
 * @subpackage pbar_generator_pro/includes
 */

class pabliteMetabox{

        private $screens = array('product');

        private $fields = array(
          array(
            'label' => 'Custom barcode (Pro)',
            'id' => 'pbg_meta_barcode',
            'type' => 'text',
           )  
        );

        public function __construct() {
          add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
          add_action( 'save_post', array( $this, 'save_fields' ) );
        }

        public function add_meta_boxes() {
          foreach ( $this->screens as $s ) {
            add_meta_box(
              'Productbarcodes',
              __( 'Product barcode', 'product-barcode-generator' ),
              array( $this, 'meta_box_callback' ),
              $s,
              'advanced',
              'high'
            );
          }
        }

        public function meta_box_callback( $post ) {
          wp_nonce_field( 'Productbarcode_data', 'Productbarcode_nonce' ); 
          $this->field_generator( $post );
        }

        public function field_generator( $post ) {
            if (class_exists("WooCommerce"))
            {   

        $product = wc_get_product(get_the_ID());
    $options = get_option('pbarginerator_print_option');
    $pbarcode_types = isset($options['pbarcode_types']) ? $options['pbarcode_types'] : 'img';

    $pbarcode_align = isset($options['pbarcode_align']) ? $options['pbarcode_align'] : 'center';
    $qr_print_title_display = isset($options['qr_print_title_display']) ? $options['qr_print_title_display'] : 'yes';

    $qr_print_price_display = isset($options['qr_print_price_display']) ? $options['qr_print_price_display'] : 'yes';


    $pbar_title_color = isset($options['pbar_title_color']) ? $options['pbar_title_color'] : '#000';
    $pbar_price_color = isset($options['pbar_price_color']) ? $options['pbar_price_color'] : '#000';

    $pbar_title_font = isset($options['pbar_title_font']) ? $options['pbar_title_font'] : '11';

    $pbar_price_font = isset($options['pbar_price_font']) ? $options['pbar_price_font'] : '11';
    $qbarcode_bg_color = (isset($options['qbarcode_bg_color'])) ? $options['qbarcode_bg_color'] : '#ddd';

    $pbarcode_format = isset($options['pbarcode_format']) ? $options['pbarcode_format'] : 'CODE128';
    $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';

    $pbrdigit = isset($options['pbrdigit']) ? $options['pbrdigit'] : '6';
        $jhsdg = substr(number_format('84834348' * $post->ID,0,'',''),0,$pbrdigit);



    $qr_print_fontfamilyown = isset($options['qr_print_fontfamilyown']) ? $options['qr_print_fontfamilyown'] : 'sans-serif';

    $qr_print_fontfamily = isset($options['qr_print_fontfamily']) ? $options['qr_print_fontfamily'] : 'sans-serif';

          $output = '';


          foreach ( $this->fields as $field ) {

            $options = get_option('pbarginerator_print_option');
            $meta_value = get_post_meta($post->ID, $field['id'], true);
            $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
                            if ($pbarcode_value == 'sku'){
            $printSju = $product->get_sku();     
            $disabled = 'disabled';     
            $bcontent = 'Barcode Content: Product SKU'; 
            $disbledescrion = __("The following field will be available only if barcode number is selected as barcode content", 'product-barcode-generator');    
            }
            if ($pbarcode_value == 'pbrnumber' && ! empty( $meta_value )){
            $printSju = $meta_value; 
            $disabled = '';  
            $bcontent = 'Barcode Content: Barcode Number';
            $disbledescrion = __("Input custom barcode number to generate custom barcode", 'product-barcode-generator');

            }elseif($pbarcode_value == 'pbrnumber' && empty( $meta_value )){
            $printSju = $jhsdg;  
            $disabled = '';  
            $bcontent = 'Barcode Content: Barcode Number';
            $disbledescrion = __("Input custom barcode number to generate custom barcode", 'product-barcode-generator');

            }
            if ($pbarcode_value == 'ID'){
            $printSju = get_the_ID();
            $disabled = 'disabled'; 
            $bcontent = 'Barcode Content: Product ID';
            $disbledescrion = __("The following field will be available only if barcode number is selected as barcode content", 'product-barcode-generator'); 
            }


            $label = '<label for="' . $field['id'] . '">' . $bcontent . '</label><span class="woocommerce-help-tip" tabindex="0" data-tip="'.$disbledescrion.'"></span><script>jQuery( function( $ ) {
    jQuery(".woocommerce-help-tip").tipTip({
        "attribute": "data-tip",
        "fadeIn":    50,
        "fadeOut":   50,
        "delay":     200
    });
})</script>';
            switch ( $field['type'] ) {
              default:
                $input = sprintf(
                '<input id="%s" name="%s" type="%s" value="%s" placeholder="input custom number" '.$disabled.'>',
                $field['id'],
                $field['id'],
                $field['type'],
                $meta_value
              );
            }
            $output .= $this->format_rows( $label, $input );
          }
          echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';




                if ($qr_print_title_display == 'yes')
                {
                    $title_show = '<li class="pbr_title_print" style="color:' . $pbar_title_color . ';font-size:' . $pbar_title_font . 'px">' . get_the_title() . '</li>';
                }
                else
                {
                    $title_show = '';
                }
                if ($qr_print_price_display == 'yes' && get_post_type() == 'product')
                {
                    $price_show = '<li class="pbrprice_print" style="color:' . $pbar_price_color . ';font-size:' . $pbar_price_font . 'px">' . $product->get_price_html() . '</li>';
                }
                else
                {
                    $price_show = '';
                }

                if ($pbarcode_types == 'svg')
                {
                    $pbarcode_typess = '<svg id="Probarcode_metabox"></svg>';
                }
                else
                {
                    $pbarcode_typess = '<img id="Probarcode_metabox">';
                }

                if ($product->is_type('variable'))
                {

                    $variation_naiote = '<p class="pbar_variation_ntc">Premium version gets variable child product barcodes <em><a href="https://barcode-admin.dipashi.com/wp-admin/post.php?post=12695&action=edit" target="_blank">Live Demo</a></em></p>';
                }
                else
                {
                    $variation_naiote = '';
                }
                      wp_enqueue_script('pbr_generator');
                echo '<p id="pbrloader">Loading....</p><div id="pbrbarcometabinov"><div id="pro_barqr_print_wrapepr" data-sku="'.$printSju.'" style="padding:0 10px;list-style: none;display: inline-block;margin-right: 10px;text-align: ' . $pbarcode_align . ';font-family:'.$qr_print_fontfamily.';"><div class="pbrmetaperid">' . $title_show . ' ' . $price_show . '</div>
             <li>' . $pbarcode_typess . '</li><style>li.pbrprice_print ins {text-decoration:none;}li.pbrprice_print del {color: #858585;}
             
                 #pro_barqr_print_wrapepr {
        background: '.$qbarcode_bg_color .' !important;
    }
@media print {
    span.screen-reader-text {
display:none;
}
    #pro_barqr_print_wrapepr {
        background: '.$qbarcode_bg_color .' !important;
    }
    #pro_barqr_print_wrapepr {
       -webkit-print-color-adjust: exact;
    }
    .pbrmetaperid {
    display: flex;
    padding-top: 5px;
    justify-content: space-between;
}
div#pro_barqr_print_wrapepr li {
    margin-top: 5px;
    margin-bottom: 7px;
    list-style: none;
}
li.pbrprice_print, li.pbr_title_print {
    padding: 0 10px;
}
}


</style></div>
            <div class="download_Pbar_conwrap">
            <a id="download_Pbar_con">
            <button type="button" class="button button-primary" title="Download Barcode"><span class="dashicons dashicons-download"></span></button>
            </a>
            <button id="printButton" type="button" class="button button-primary pbrpritnbtn" title="Print Barcode"><span class="dashicons dashicons-printer"></span></button>
            <button type="submit" class="button" title="Save Changes" '.$disabled.'>Update barcode</button></div>'.$variation_naiote.'</div>';
            }
            else
            {
                echo '<p class="wcplugin_active">' . esc_html__('Please enable the WooCommerce plugin, the barcode generator will not work without \'WooCommerce', 'product-barcode-generator') . '</p>';
            }

        }

        public function format_rows( $label, $input ) {
          return '<div class="pbrmetaboxs"><strong>'.$label.'</strong></div><div>'.$input.'</div>';
        }

        

        public function save_fields( $post_id ) {
          if ( !isset( $_POST['Productbarcode_nonce'] ) ) {
            return $post_id;
          }
          $nonce = $_POST['Productbarcode_nonce'];
          if ( !wp_verify_nonce( $nonce, 'Productbarcode_data' ) ) {
            return $post_id;
          }
          if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
          }
                if (array_key_exists('pbg_meta_barcode', $_POST))
            {

                update_post_meta($post_id, 'pbg_meta_barcode', sanitize_text_field($_POST['pbg_meta_barcode']));
            }

        }

      }

      if (class_exists('pabliteMetabox')) {
        new pabliteMetabox;
      };

      
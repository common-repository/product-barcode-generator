<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    product-barcode-generator
 * @subpackage product-barcode-generator/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    product-barcode-generator
 * @subpackage product-barcode-generator/admin
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class pbar_generator_Admin
{

    /**
     * The option page variable of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string
     $qrc_option_page_options     option name.
     */
    private $qrc_option_page_options;

    /**
     * The ID of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.0.7
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_pbarcode_genartor.php';

        define('PBG_PLUGIN_ID', 'pbar_print');
        define('PBG_ORDER_ID', 'pbar_orderemail');
        $plugin_name = new Pbarcode_Generator();

        add_action('admin_enqueue_scripts', array(
            $this,
            'qrc_admin_theme_style'
        ));

        add_action('login_enqueue_scripts', array(
            $this,
            'qrc_admin_theme_style'
        ));

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    2.0.7
     */
    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, PBARGENERATOR_URL . 'admin/css/pbar_generator-admin.css', array() , $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    2.0.7
     */
    public function enqueue_scripts()
    {


        wp_register_script('JsBarcode', PBARGENERATOR_URL . 'admin/js/JsBarcode.all.min.js', array('jquery') , $this->version, false);
        wp_register_script('pbr_generator', PBARGENERATOR_URL . 'admin/js/pbr-generator.js', array() , time(), true);
        wp_register_script('pbr-order', PBARGENERATOR_URL . 'admin/js/pbr-order.js', array() , $this->version, true);
 wp_register_script("print_option", PBARGENERATOR_URL . "admin/js/jQuery.print.js", [], $this->version, true);
    wp_register_script("dom-to-image", PBARGENERATOR_URL . "admin/js/dom-to-image.min.js", [], $this->version, true);
        if (get_post_type() == "product") {
        wp_enqueue_script('JsBarcode', PBARGENERATOR_URL . 'admin/js/JsBarcode.all.min.js', array('jquery') , $this->version, false);

        wp_enqueue_script('dom-to-image', PBARGENERATOR_URL . 'admin/js/dom-to-image.min.js', array() ,$this->version, true);

        wp_enqueue_script('print_option', PBARGENERATOR_URL . 'admin/js/jQuery.print.js', array() , $this->version, true);
        include PBARGENERATOR_PATH . '/admin/extenstion/datapbarcodes.php';

        $product = wc_get_product(get_the_ID());
        $current_title = get_the_title(get_the_id());

 
        $arhg = ["cuurenttitle" => $current_title, "pbfformat" => $pbarcode_format, "width" => $pbarcode_width, "fontOptions" => $pbar_fnt_option, "fontSize" => $barcode_label_fontsize, "font" => $barcode_label_fontfami, "textPosition" => $pbar_txtposition, "textAlign" => $pbar_fnt_txtalign, "textMargin" => $barcode_label_txtmargin, "lineColor" => $qbarcode_display_color, "height" => $barcode_height, "background" => $qbarcode_bg_color, ];

        wp_localize_script('pbr_generator','pbrGrnerator', $arhg,);
    }

    if ((isset($_GET['page']) && strpos($_GET['page'], PBG_PLUGIN_ID) !== false) ||  (isset($_GET['page']) &&strpos($_GET['page'], PBG_ORDER_ID) !== false)){


        wp_enqueue_script('JsBarcode', PBARGENERATOR_URL . 'admin/js/JsBarcode.all.min.js', array('jquery') , $this->version, false);
           wp_enqueue_script('rangeslider', PBARGENERATOR_URL . 'admin/js/rangeslider.min.js', array(
            'jquery'
        ) , $this->version, true);
           wp_enqueue_script('video-popup', PBARGENERATOR_URL . 'admin/js/video.popup.js', array(
            'jquery'
        ) , $this->version, true);

        wp_enqueue_script('jqColorPicker', PBARGENERATOR_URL . 'admin/js/jqColorPicker.min.js', array(
            'jquery'
        ) , $this->version, true);

        wp_enqueue_script('pbrcode-generator-admin', PBARGENERATOR_URL . 'admin/js/pbrcode-generator-admin.js', array(
            'jquery',
            'rangeslider'
        ) , $this->version, true);
    }


    }

    public function qrc_admin_theme_style()
    {
        if (isset($_GET['page']) && strpos($_GET['page'], PBG_PLUGIN_ID) !== false)
        {
            echo '<style>.update-nag, .updated,.notice.notice-info{ display: none !important; }.notice-success.settings-error {display: block}</style>';
        }
    }

    /**
     * Setting link.
     *
     * @since    2.0.7
     */

    public function plugin_settings_link($links)
    {
        if (is_admin())
        {

            return array_merge(array(
                '<a href="' . admin_url('admin.php?page=pbar_print') . '">' . esc_html__('Settings', 'product-barcode-generator') . '</a>',
            ) , $links);
        }
    }

    /**
     * This function is Add Menu page call back function.
     */

    public function admin_menu_define()
    {

        $icon_url = PBARGENERATOR_URL . 'admin/img/sds.png';

        add_menu_page(esc_html__('Woo barcode', 'product-barcode-generator') , esc_html__('Woo barcode', 'product-barcode-generator') , 'manage_options', 'pbar_print', array(
            $this,
            'pbarcode_print_pdf'
        ) , $icon_url,70);

        add_submenu_page('pbar_print', 'Order barcode', 'Order barcode', 'publish_posts', 'pbar_orderemail', array(
        $this,
        'pbar_orderemail'
        ));

         add_submenu_page('pbar_print', 'Print Page', 'Print Page', 'publish_posts', 'pbar_printpage', array(
             $this,
             'pbar_printpage'
         ));
         add_submenu_page('pbar_print', 'Download Page', 'Download Page', 'publish_posts', 'pbar_downbar', array(
             $this,
             'pbar_downbar'
         ));
    }
function pbar_orderemail()
    {

        ?>

        <div class="pbar_wrap">
        <div class="pbarcowp_admin">
           <ul class="pbarcowp_nav_bar">
              <li><a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_orderemail" target="_blank"><?php echo esc_html('Premium Admin Demo', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/plugins/product-barcode-generator/" target="_blank"><?php echo esc_html('Get Pro', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode.dipashi.com/" target="_blank"><?php echo esc_html('Demo', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Documentation', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/contact-us" target="_blank"><?php echo esc_html('Support', 'product-barcode-generator') ?></a></li>
           </ul>
           <ul  class="pbarcowp_hdaer_cnt">
              <li> <img src=" <?php echo PBARGENERATOR_URL . 'admin/img/barcodelogosmall.png' ?>" alt="Logo"></li>
              <li  class="qrc_fd_cnt">
                 <h3><?php echo esc_html('Order Barcode Settings', 'product-barcode-generator') . '<sup>' . PBARGENERATOR_VERSION ?></sup> </h3>
                 <small><?php echo esc_html('Barcode Generator For WooCommerce Products And Orders', 'product-barcode-generator') ?></small>
              </li>
           </ul>
        </div>
        <div class="pbar_dashboard_wrap">
<div class="pbrtabs">
  <ul id="pbrtabs-nav">

<li ><a href="<?php echo admin_url('/') ?>/admin.php?page=pbar_print"><?php echo esc_html("Porduct barcode", "product-barcode-generator") ?></a></li>

<li ><a href="<?php echo admin_url('/') ?>/admin.php?page=pbar_print"><?php echo esc_html("Auto Display & Shortcode Settings (PRO)", "product-barcode-generator") ?></a></li>


<li  class="active"><a href=" <?php echo admin_url('/') ?>/admin.php?page=pbar_orderemail"><?php echo esc_html("Order barcode", "product-barcode-generator") ?></a></li>
<li><a href="<?php echo admin_url('/') ?>/admin.php?page=pbar_print#tab3"><?php echo esc_html("Extra Features for Premium", "product-barcode-generator") ?></a></li>
  </ul> <!-- END tabs-nav -->
    <div id="pbrorderbatcon">

        <form method="post" action="options.php">
        <?php
        settings_errors();
        if (!class_exists("WooCommerce"))
        {
            echo '<p class="wcplugin_active">' . esc_html__('Please enable the WooCommerce plugin, the barcode generator will not work without \'WooCommerce', 'product-barcode-generator') . '</p>';
        }
?> 
    <div id="tab1" class="">
<div class="comwrapers">
<div class="com-md-8">
<?php
            settings_fields("pbarginerator_ordeermails");

            do_settings_sections('pbr_ordeermails__setting');

?>
<div class="barcodesubmits">
                  <button type="submit" id="pbrosiudi" class="button button-primary"><span class="dashicons dashicons-cloud-saved"></span> Save Changes </button>
            </div>
</div><div class="com-md-4 lksfuieusb">

<?php

            do_settings_sections('pbar_preview_orderdemos');

?>
</div>
</div>
</div>
        </div>
              
         </div>

</div>

 <?php
    }
    function pbar_printpage()
    { ?>

       <div class="pbar_wrap">
        <div class="pbarcowp_admin">
           <ul class="pbarcowp_nav_bar">
              <li><a href="https://barcode.dipashi.com/" target="_blank"><?php echo esc_html('Frontend Demo (Pro)', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_print" target="_blank"><?php echo esc_html('Backend Demo (Pro)', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/plugins/product-barcode-generator/" target="_blank"><?php echo esc_html('Get Pro Plugin', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/contact-us" target="_blank"><?php echo esc_html('Support', 'product-barcode-generator') ?></a></li>
           </ul>
           <ul  class="pbarcowp_hdaer_cnt">
              <li> <img src=" <?php echo PBARGENERATOR_URL . 'admin/img/barcodelogosmall.png' ?>" alt="Logo"></li>
              <li  class="qrc_fd_cnt">
                 <h3><?php echo esc_html('Bulk Print Page', 'product-barcode-generator') . '<sup>' . PBARGENERATOR_VERSION ?></sup> </h3>
                 <small><?php echo esc_html('Barcode Generator For WooCommerce Product And WooCommerce Order', 'product-barcode-generator') ?></small>
              </li>
           </ul>
        </div>
        <div class="pbar_dashboard_wrap">
                        <div id="pbarcode_print_page">
            <h3> <?php echo esc_html__('This is a premium version feature','product-barcode-generator') ?><a id="pbr-prints" video-url="https://www.youtube.com/watch?v=vIQcjeJ56gk"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a> <a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_printpage" target="_blank" class="printlive"><?php echo esc_html__('Live Admin Demo','product-barcode-generator') ?></a></h3>
      <p><?php echo esc_html__('This page is for premium users, user can manage print page by removing title, price, border, they can customize box height as per requirement, preview with barcode per column and print page size. Ajax can search by premium product name or product category. At the bottom of this page is a Load More button, when the user clicks the button more products will be loaded from your site','product-barcode-generator') ?></p>

               <img src=" <?php echo PBARGENERATOR_URL . '/admin/img/admin-demo-min.png' ?>" alt="Bulk Print">
            </div>
        </div>


 <?php }
    function pbar_downbar()
    { ?>

       <div class="pbar_wrap">
        <div class="pbarcowp_admin">
           <ul class="pbarcowp_nav_bar">
              <li><a href="https://barcode.dipashi.com/" target="_blank"><?php echo esc_html('Frontend Demo (Pro)', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_print" target="_blank"><?php echo esc_html('Backend Demo (Pro)', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/plugins/product-barcode-generator/" target="_blank"><?php echo esc_html('Get Pro Plugin', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/contact-us" target="_blank"><?php echo esc_html('Support', 'product-barcode-generator') ?></a></li>
           </ul>
           <ul  class="pbarcowp_hdaer_cnt">
              <li> <img src=" <?php echo PBARGENERATOR_URL . 'admin/img/barcodelogosmall.png' ?>" alt="Logo"></li>
              <li  class="qrc_fd_cnt">
                 <h3><?php echo esc_html('Download All Barcodes', 'product-barcode-generator') . '<sup>' . PBARGENERATOR_VERSION ?></sup> </h3>
                 <small><?php echo esc_html('Barcode Generator For WooCommerce Product And WooCommerce Order', 'product-barcode-generator') ?></small>
              </li>
           </ul>
        </div>
        <div class="pbar_dashboard_wrap">
            <div id="pbarcode_print_page">

            <h3><?php echo esc_html__('This is a premium version feature','product-barcode-generator') ?><a id="pbr-downl" video-url="https://www.youtube.com/watch?v=jQixgcO3U1w"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a> <a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_downbar" target="_blank" class="printlive"><?php echo esc_html__('Live Admin Demo','product-barcode-generator') ?></a></h3>
            <p><?php echo esc_html__('This page is for premium users, user can search Ajax by product name or product category. It has a Load More button at the bottom of the page, when the user clicks the button more products will be loaded from your site','product-barcode-generator') ?></p>

               <img src=" <?php echo PBARGENERATOR_URL . '/admin/img/downpage-min-min.png' ?>" alt="Demo barcode" class="pbrdemobarcoes">
            </div>
        </div>
        

 <?php }      
    function pbarcode_print_pdf()
    { ?>
        <div class="pbar_wrap">
        <div class="pbarcowp_admin">
           <ul class="pbarcowp_nav_bar">
              <li><a href="https://barcode.dipashi.com/" target="_blank"><?php echo esc_html('Frontend Demo (Pro)', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_print" target="_blank"><?php echo esc_html('Backend Demo (Pro)', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/plugins/product-barcode-generator/" target="_blank"><?php echo esc_html('Get Pro Plugin', 'product-barcode-generator') ?></a></li>
              <li><a href="https://barcode.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'product-barcode-generator') ?></a></li>
              <li><a href="https://sharabindu.com/contact-us" target="_blank"><?php echo esc_html('Support', 'product-barcode-generator') ?></a></li>
           </ul>
           <ul  class="pbarcowp_hdaer_cnt">
              <li> <img src=" <?php echo PBARGENERATOR_URL . 'admin/img/barcodelogosmall.png' ?>" alt="Logo"></li>
              <li  class="qrc_fd_cnt">
                 <h3><?php echo esc_html('Product Barcode Generator', 'product-barcode-generator') . '<sup>' . PBARGENERATOR_VERSION ?></sup> </h3>
                 <small><?php echo esc_html('Barcode Generator For WooCommerce Product And WooCommerce Order', 'product-barcode-generator') ?></small>
              </li>
           </ul>
        </div>
        <div class="pbar_dashboard_wrap">
<div class="pbrtabs">
               <ul id="pbrtabs-nav">
                  <li><a href="#tab1">barcode Design</a></li>
                      <li><a href="#tab6">Order barcode</a></li>
                  <li><a href="#tab2">Auto Display & Shortcode(PRO)</a></li>
            
                  <li><a href="#tab3">Print Page(PRO)</a></li>
              
                  <li><a href="#tab4">barcode Download(PRO)</a></li>
                <li><a href="#tab5">Pro Features</a></li>
               </ul>

    <div id="pbrtab-content">
    <div class="tab1-tab active">
<div class="comwrapers">
<div class="com-md-8">

        <form method="post" action="options.php" id="pbardesingsubmit">
                       <?php
                if (!class_exists("WooCommerce"))
                {
                    echo "<p class='wcplugin_active'>Please enable the WooCommerce plugin, the barcode generator will not work without 'WooCommerce'</p>";
                }

                settings_fields("pbarginerator_print_option");

                do_settings_sections('pbarcode_print_setting');


        ?> 
        <div class="qrcsubmits" bis_skin_checked="1">
                  <button type="submit" id="pbrosiudi" class="button button-primary"><span class="dashicons dashicons-cloud-saved"></span>Save Changes <span class="qrcintegrates"></span></button>
         <span class="qrcintegrates_djkfhjhj"></span>
            </div>
                        </form>
</div><div class="com-md-4"> 
<?php

            do_settings_sections('pbar_preview_demo_section');

?>
</div>
</div>
</div>

    <div  class="tab2-tab">
    
<?php do_settings_sections('pbar_shortcodesettings'); ?>

</div>
    <div  class="tab3-tab">
        <div class="pbar_dashboard_wrap">
                        <div id="pbarcode_print_page">
            <h3> <?php echo esc_html__('This is a premium version feature','product-barcode-generator') ?><a id="pbr-prints" video-url="https://www.youtube.com/watch?v=vIQcjeJ56gk"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a> <a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_printpage" target="_blank" ><?php echo esc_html__('Live Admin Demo','product-barcode-generator') ?></a></h3>
      <p><?php echo esc_html__('This page is for premium users, user can manage print page by removing title, price, border, they can customize box height as per requirement, preview with barcode per column and print page size. Ajax can search by premium product name or product category. At the bottom of this page is a Load More button, when the user clicks the button more products will be loaded from your site','product-barcode-generator') ?></p>

               <img src=" <?php echo PBARGENERATOR_URL . '/admin/img/admin-demo-min.png' ?>" alt="Bulk Print">
            </div>
        </div>

</div>
    <div  class="tab4-tab">
    
        <div class="pbar_dashboard_wrap">
            <div id="pbarcode_print_page">

            <h3><?php echo esc_html__('This is a premium version feature','product-barcode-generator') ?><a id="pbr-downl" video-url="https://www.youtube.com/watch?v=jQixgcO3U1w"><span title="Video Documentation" id="docsides" class="dashicons dashicons-video-alt3"></span></a> <a href="https://barcode-admin.dipashi.com/wp-admin/admin.php?page=pbar_downbar" target="_blank"><?php echo esc_html__('Live Admin Demo','product-barcode-generator') ?></a></h3>
            <p><?php echo esc_html__('This page is for premium users, user can search Ajax by product name or product category. It has a Load More button at the bottom of the page, when the user clicks the button more products will be loaded from your site','product-barcode-generator') ?></p>

               <img src=" <?php echo PBARGENERATOR_URL . '/admin/img/downpage-min-min.png' ?>" alt="Demo barcode" class="pbrdemobarcoes">
            </div>
        </div>

</div>


    <div  class="tab5-tab">
          
    <?php include PBARGENERATOR_PATH.'/admin/pro-features.php';
                 ?> 

</div>  <div  class="tab6-tab">
          
    <div id="pbrorderbatcon">

        <form method="post" action="options.php">
        <?php
        settings_errors();
        if (!class_exists("WooCommerce"))
        {
            echo '<p class="wcplugin_active">' . esc_html__('Please enable the WooCommerce plugin, the barcode generator will not work without \'WooCommerce', 'product-barcode-generator') . '</p>';
        }
?> 
    <div id="tab1" class="">
<div class="comwrapers">
<div class="com-md-8">
<?php
            settings_fields("pbarginerator_ordeermails");

            do_settings_sections('pbr_ordeermails__setting');

?>
<div class="barcodesubmits">
                  <button type="submit" id="pbrosiudi" class="button button-primary"><span class="dashicons dashicons-cloud-saved"></span> Save Changes </button>
            </div>
</div><div class="com-md-4 lksfuieusb">

<?php

            do_settings_sections('pbar_preview_orderdemos');

?>
</div>
</div>
</div>
        </div>

</div>
       </div>
    </div>
</div>
</div>

    <?php
        }

    public function adminFooterTextQR()
    {

        if (isset($_GET['page']) && strpos($_GET['page'], PBG_PLUGIN_ID) !== false)
        {

        ?>
        <div id="footer_pbrgrnrtaor" role="contentinfo">
        <p><?php echo esc_html__('Thank you for choosing', 'product-barcode-generator') ?> <strong><?php echo esc_html__('Product barcode generator', 'product-barcode-generator') ?></strong> <span class="dashicons dashicons-smiley"></span>
        <?php echo esc_html__('Please give us a 5 star ', 'product-barcode-generator') ?> ( <a class="pbgenetro_dash_strat" href="https://wordpress.org/support/plugin/product-barcode-generator/reviews/" target="_blank" rel="noopener noreferrer"><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i></a> ) <?php echo esc_html__('review on ', 'product-barcode-generator') ?> <a href="https://wordpress.org/support/plugin/product-barcode-generator/reviews/" target="_blank" rel="noopener noreferrer"><?php echo esc_html__('WordPress.org', 'product-barcode-generator') ?></a> <?php echo esc_html__(' to help us spread the word!  ', 'product-barcode-generator') ?></p>
        <div class="clear"></div>
        </div>
        <?php
        }
    }
}


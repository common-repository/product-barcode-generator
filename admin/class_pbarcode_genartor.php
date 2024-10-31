<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    product-barcode-generator
 * @subpackage product-barcode-generator/admin
 */

class Pbarcode_Generator
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
       include PBARGENERATOR_PATH.'/admin/extenstion/registerSetting.php';

    }

 public function pbarcode_width()
    {

        $options = get_option('pbarginerator_print_option');
        $options_rang_value = isset($options['pbarcode_width']) ? $options['pbarcode_width'] : '2';

        printf('<span id="bar-width-display"></span>
          <input type="range" name="pbarginerator_print_option[pbarcode_width]" value="%s" min="1" max="4"  step="1" class="rangesliderdfdf" id="pbarcode_width">', $options_rang_value);

    }   


    function barcode_color_settings()
    {
    
        $options = get_option('pbarginerator_print_option');
        $value = (isset($options['qbarcode_display_color'])) ? $options['qbarcode_display_color'] : '#16267d';
        $qbarcode_bg_color = (isset($options['qbarcode_bg_color'])) ? $options['qbarcode_bg_color'] : '#ddd';
        printf('<ul class="br_per_page"><li><strong><label> ' . esc_html__('Barcode Color: ', 'product-barcode-generator') . '</label></strong><input type="text" name="pbarginerator_print_option[qbarcode_display_color]" value="%s" class="qrc-bgcolor-picker" id="line-color"></li>', $value);
        printf('<li><strong><label> ' . esc_html__('Background Color: ', 'product-barcode-generator') . '</label></strong><input type="text" name="pbarginerator_print_option[qbarcode_bg_color]" value="%s" class="qrc-bgcolor-picker" id="background-color"></li></ul>', $qbarcode_bg_color);
    }


function pbar_labeltaxonmy(){

            $options = get_option('pbarginerator_print_option');
        $options_value = isset($options['barcode_label_fontsize']) ? $options['barcode_label_fontsize'] : 12;
        $barcode_label_txtmargin = isset($options['barcode_label_txtmargin']) ? $options['barcode_label_txtmargin'] : 4;
        $pbar_fnt_option = isset($options['pbar_fnt_option']) ? $options['pbar_fnt_option'] : '';
        $pbar_fnt_txtalign = isset($options['pbar_fnt_txtalign']) ? $options['pbar_fnt_txtalign'] : 'center';
        $pbar_txtposition = isset($options['pbar_txtposition']) ? $options['pbar_txtposition'] : 'bottom';
        $barcode_label_fontfami = isset($options['barcode_label_fontfami']) ? $options['barcode_label_fontfami'] : 'sans-serif';
        $barcode_label_fontfamiown = isset($options['barcode_label_fontfamiown']) ? $options['barcode_label_fontfamiown'] : 'sans-serif';
        if($barcode_label_fontfami == 'custom'){

            $fontfamiown_display = 'inline-block';
        }else{
            $fontfamiown_display = 'none';

        }

        if(empty($barcode_label_fontfami)){

            $barcode_label_fontfami = 'sans-serif';
        }

        printf('
            <ul class="br_per_page"><li><strong><label>'.esc_html__('Font Size: ', 'product-barcode-generator').'</label></strong><span id="bar-label-display"></span>
          <input type="range" name="pbarginerator_print_option[barcode_label_fontsize]" value="%s" min="10" max="30" class="rangesliderdfdf" id="barcode_label_fontsize"></li>', $options_value);
        printf('<li><strong><label>'.esc_html__('Text Margin: ', 'product-barcode-generator').'</label></strong><span id="bar-txtmargin-display"></span>
          <input type="range" name="pbarginerator_print_option[barcode_label_txtmargin]" value="%s" min="0" max="10" class="rangesliderdfdf" id="barcode_label_txtmargin"></li></ul>', $barcode_label_txtmargin);

        ?><ul class="br_per_page">
        <li><strong><label><?php echo esc_html__('Font Options: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[pbar_fnt_option]" id="pbar_fnt_option">
                
            <option value="bold" <?php echo esc_attr($pbar_fnt_option) == 'bold' ? 'selected' : '' ?>><?php esc_html_e('Bold', 'product-barcode-generator'); ?></option>
            <option value="Italic" <?php echo esc_attr($pbar_fnt_option) == 'Italic' ? 'selected' : '' ?>><?php esc_html_e('Italic', 'product-barcode-generator'); ?></option>   
            <option value="bold italic" <?php echo esc_attr($pbar_fnt_option) == 'bold italic' ? 'selected' : '' ?>><?php esc_html_e('Bold italic', 'product-barcode-generator'); ?></option>   
            <option value="" <?php echo esc_attr($pbar_fnt_option) == '' ? 'selected' : '' ?>><?php esc_html_e('Normal', 'product-barcode-generator'); ?></option>   

            </select></li><li>
        <strong><label><?php echo esc_html__('Text Align: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[pbar_fnt_txtalign]" id="pbar_fnt_txtalign">
                
            <option value="left" <?php echo esc_attr($pbar_fnt_txtalign) == 'left' ? 'selected' : '' ?>><?php esc_html_e('Left', 'product-barcode-generator'); ?></option>
            <option value="center" <?php echo esc_attr($pbar_fnt_txtalign) == 'center' ? 'selected' : '' ?>><?php esc_html_e('center', 'product-barcode-generator'); ?></option>   
            <option value="right" <?php echo esc_attr($pbar_fnt_txtalign) == 'right' ? 'selected' : '' ?>><?php esc_html_e('Right', 'product-barcode-generator'); ?></option>   

            </select></li></ul>
            <ul class="br_per_page"><li>
        <strong><label><?php echo esc_html__('Text Position: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[pbar_txtposition]" id="pbar_txtposition">
                
            <option value="top" <?php echo esc_attr($pbar_txtposition) == 'top' ? 'selected' : '' ?>><?php esc_html_e('Top', 'product-barcode-generator'); ?></option>
            <option value="bottom" <?php echo esc_attr($pbar_txtposition) == 'bottom' ? 'selected' : '' ?>><?php esc_html_e('Bottom', 'product-barcode-generator'); ?></option>   

            </select></li><li>
             <strong>
            <label><?php echo esc_html__('Font family: ', 'product-barcode-generator'); ?></label></strong>
            <select id="barcode_label_fontfami" name="pbarginerator_print_option[barcode_label_fontfami]">
                <option value="monospace" style="font-family: monospace" <?php echo esc_attr($barcode_label_fontfami) == 'monospace' ? 'selected' : '' ?>><?php esc_html_e('Monospace', 'product-barcode-generator'); ?></option>
                <option value="sans-serif" style="font-family: sans-serif" <?php echo esc_attr($barcode_label_fontfami) == 'sans-serif' ? 'selected' : '' ?>><?php esc_html_e('Sans-serif', 'product-barcode-generator'); ?></option>
                <option value="serif" style="font-family: serif"  <?php echo esc_attr($barcode_label_fontfami) == 'serif' ? 'selected' : '' ?>><?php esc_html_e('Serif', 'product-barcode-generator'); ?></option>
                <option value="fantasy" style="font-family: fantasy"   <?php echo esc_attr($barcode_label_fontfami) == 'fantasy' ? 'selected' : '' ?>><?php esc_html_e('Fantasy', 'product-barcode-generator'); ?></option>
                <option value="cursive" style="font-family: cursive" <?php echo esc_attr($barcode_label_fontfami) == 'cursive' ? 'selected' : '' ?>><?php esc_html_e('Cursive', 'product-barcode-generator'); ?></option>
                <option value="custom" <?php echo esc_attr($barcode_label_fontfami) == 'custom' ? 'selected' : '' ?> class="pbarcustomfont"><?php esc_html_e('Custom', 'product-barcode-generator'); ?></option>
              </select>

            <input type="text" name="pbarginerator_print_option[barcode_label_fontfamiown]" value="<?php echo esc_attr($barcode_label_fontfamiown) ?>" id="barcode_label_fontfamiown" placeholder="font-family name" style="display: <?php echo esc_attr($fontfamiown_display) ?>">
            <p>
            <em style="color: #9b9b9b;"><?php echo esc_html__("Input the name of the font family installed on your site, default: sans-serif", "product-barcode-generator"); ?></em></p>
        </li>
    </ul>


        <?php


        }
    function pbar_title_color()
    {
        $options = get_option('pbarginerator_print_option');
        $value = (isset($options['pbar_title_color'])) ? $options['pbar_title_color'] : '#000';
        $qr_print_title_display = isset($options['qr_print_title_display']) ? $options['qr_print_title_display'] : '';
        $qr_print_price_display = isset($options['qr_print_price_display']) ? $options['qr_print_price_display'] : '';
        $qr_print_fontfamily = isset($options['qr_print_fontfamily']) ? $options['qr_print_fontfamily'] : 'sans-serif';

        $qr_print_fontfamilyown = isset($options['qr_print_fontfamilyown']) ? $options['qr_print_fontfamilyown'] : 'sans-serif';

        if($qr_print_fontfamily == 'custom'){

            $qr_print_fontfamilydisplay = 'inline-block';
        }else{
            $qr_print_fontfamilydisplay = 'none';

        }

        if(empty($qr_print_fontfamily)){

            $qr_print_fontfamily = 'sans-serif';
        }



        ?>
        <div class="ttlecolorhd">
            <ul class="br_per_page"><li>
        <strong><label><?php echo esc_html__('Show Title?: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[qr_print_title_display]" id="qr_print_title_display">
                
            <option value="yes" <?php echo esc_attr($qr_print_title_display) == 'yes' ? 'selected' : '' ?>><?php esc_html_e('Yes', 'product-barcode-generator'); ?></option>
            <option value="no" <?php echo esc_attr($qr_print_title_display) == 'no' ? 'selected' : '' ?>><?php esc_html_e('No', 'product-barcode-generator'); ?></option>   

            </select>

            </li><li>
            <strong><label><?php echo esc_html__('Show Price?: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[qr_print_price_display]" id="qr_print_price_display">
                
            <option value="yes" <?php echo esc_attr($qr_print_price_display) == 'yes' ? 'selected' : '' ?>><?php esc_html_e('Yes', 'product-barcode-generator'); ?></option>
            <option value="no" <?php echo esc_attr($qr_print_price_display) == 'no' ? 'selected' : '' ?>><?php esc_html_e('No', 'product-barcode-generator'); ?></option>   

            </select>
        </li></ul>
            <?php
    
       
        printf('<ul class="br_per_page"><li><span id="pbar_title_colorspan"><strong><label> ' . esc_html__('Title Color: ', 'product-barcode-generator') . '</label></strong><input type="text" name="pbarginerator_print_option[pbar_title_color]" value="%s" class="qrc-bgcolor-picker" id="pbar_title_color"></span></li>', $value);

        $valueprice = (isset($options['pbar_price_color'])) ? $options['pbar_price_color'] : '#000';
        printf('<li><span id="pbar_price_colorspan"><strong><label> ' . esc_html__('Price Color: ', 'product-barcode-generator') . '</label></strong><input type="text" name="pbarginerator_print_option[pbar_price_color]" value="%s" class="qrc-bgcolor-picker" id="pbar_price_color"></span></li></ul>', $valueprice);


   $pbar_title_font = isset($options['pbar_title_font']) ? $options['pbar_title_font'] : '11'; 

        $pbar_price_font = isset($options['pbar_price_font']) ? $options['pbar_price_font'] : '11';
    
        printf('<ul class="br_per_page"><li id="pbar_title_fontdis"><strong><label> ' . esc_html__('Font Size(Title): ', 'product-barcode-generator') . '</label></strong>
          <input type="number" name="pbarginerator_print_option[pbar_title_font]" value="%s" min="8" max="40" id="pbar_title_font"><p><em style="color: #9b9b9b;">'.esc_html("Product Title Font Size, default: 11(px)","product-barcode-generator").'</em></p></li>', $pbar_title_font);

        printf('<li><strong><label> ' . esc_html__('Font Size(Price): ', 'product-barcode-generator') . '</label></strong>
          <input type="number" name="pbarginerator_print_option[pbar_price_font]" value="%s" min="8" max="40"  id="pbar_price_font"><p><em style="color: #9b9b9b;">'.esc_html("Product Title Font Size, default: 11(px)","product-barcode-generator").'</em></p></li>', $pbar_price_font);

            ?>
            <li>
             <strong>
            <label><?php echo esc_html__('Font family: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[qr_print_fontfamily]" id="qr_print_fontfamily">
                <option value="monospace" style="font-family: monospace" <?php echo esc_attr($qr_print_fontfamily) == 'monospace' ? 'selected' : '' ?>><?php esc_html_e('Monospace', 'product-barcode-generator'); ?></option>
                <option value="sans-serif" style="font-family: sans-serif" <?php echo esc_attr($qr_print_fontfamily) == 'sans-serif' ? 'selected' : '' ?>><?php esc_html_e('Sans-serif', 'product-barcode-generator'); ?></option>
                <option value="serif" style="font-family: serif"  <?php echo esc_attr($qr_print_fontfamily) == 'serif' ? 'selected' : '' ?>><?php esc_html_e('Serif', 'product-barcode-generator'); ?></option>
                <option value="fantasy" style="font-family: fantasy"   <?php echo esc_attr($qr_print_fontfamily) == 'fantasy' ? 'selected' : '' ?>><?php esc_html_e('Fantasy', 'product-barcode-generator'); ?></option>
                <option value="cursive" style="font-family: cursive" <?php echo esc_attr($qr_print_fontfamily) == 'cursive' ? 'selected' : '' ?>><?php esc_html_e('Cursive', 'product-barcode-generator'); ?></option>
                <option value="custom" <?php echo esc_attr($qr_print_fontfamily) == 'custom' ? 'selected' : '' ?> class="pbarcustomfont"><?php esc_html_e('Custom', 'product-barcode-generator'); ?></option>
              </select>

            <input type="text" name="pbarginerator_print_option[qr_print_fontfamilyown]" value="<?php echo esc_attr($qr_print_fontfamilyown) ?>" id="qr_print_fontfamilyown" style="display: <?php echo esc_attr($qr_print_fontfamilydisplay) ?>">
                <p>
            <em style="color: #9b9b9b;"><?php echo esc_html__("Input the name of the font family installed on your site, default: sans-serif", "product-barcode-generator"); ?></em></p>
        </li>
    </ul></div>

    <?php


    }

    function pbarcode_format()
    {

        $options = get_option('pbarginerator_print_option');
        $pbarcode_format = isset($options['pbarcode_format']) ? $options['pbarcode_format'] : 'CODE128';
        if ($pbarcode_format == 'EAN13')
        {

            $hides = 'block';
        }
        else
        {

            $hides = 'none';
        }
         if ($pbarcode_format == 'EAN8')
        {

            $hides8 = 'block';
        }
        else
        {

            $hides8 = 'none';
        }
        if ($pbarcode_format == 'UPC')
        {

            $hideasa = 'block';
        }
        else
        {

        $hideasa = 'none';
        }

       if ($pbarcode_format == 'CODE128')
        {
            $nuremstatics = 'block';
            $nuremics = 'none';
        }


    ?>

        <select name="pbarginerator_print_option[pbarcode_format]" class="pbarcodeen13" id="barcodeType">

        <option value="CODE128"  <?php echo esc_attr($pbarcode_format) === 'CODE128' ? 'selected' : '' ?>><?php esc_html_e('CODE128 (Auto)', 'product-barcode-generator') ?></option>
        <option value="EAN13"  <?php echo esc_attr($pbarcode_format) === 'EAN13' ? 'selected' : '' ?>><?php esc_html_e('EAN-13', 'product-barcode-generator') ?></option>
        <option value="EAN8"  <?php echo esc_attr($pbarcode_format) === 'EAN8' ? 'selected' : '' ?>><?php esc_html_e('EAN-8', 'product-barcode-generator') ?></option>
        <option value="UPC"  <?php echo esc_attr($pbarcode_format) === 'UPC' ? 'selected' : '' ?>><?php esc_html_e('UPC(A)', 'product-barcode-generator') ?></option>
        </select>

        <span style="display: <?php echo esc_attr($nuremstatics); ?>" class="nuremstatics"><?php esc_html_e('Both numeric and static characters are usable', 'product-barcode-generator') ?></span>
        <span style="display: <?php echo esc_attr($hides); ?>" class="en13info"><?php esc_html_e(' Sku numeric & 13 digit code.', 'product-barcode-generator') ?><a href="https://generate.plus/en/number/ean" target="_blank" rel="noopener">EAN13 number egnerator</a>
    </span>
        <span style="display: <?php echo esc_attr($hides8); ?>" class="en8info"><?php esc_html_e(' Sku numeric & 8 digit code." ', 'product-barcode-generator') ?><a href="https://generate.plus/en/number/ean" target="_blank" rel="noopener">EAN8 number egnerator</a>
    </span>
        
        <span style="display: <?php echo esc_attr($hideasa); ?>"  class="upcinfo"><?php esc_html_e('Sku numeric,12 digit required.', 'product-barcode-generator') ?> <a href="https://boxshot.com/barcode/tutorials/upc-a-calculator/#check-digit-calculator"  target="_blank"><?php esc_html_e('Check Digit', 'product-barcode-generator') ?></a>
           </span>
    <?php
    }
function pbarcode_value() {
        $options = get_option('pbarginerator_print_option');
        $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
        $pbrdigit = isset($options['pbrdigit']) ? $options['pbrdigit'] : '6';

        $pbarcode_format = isset($options['pbarcode_format']) ? $options['pbarcode_format'] : 'CODE128';
        if ($pbarcode_format == 'EAN13' || $pbarcode_format == 'EAN8' || $pbarcode_format == 'UPC' || ($pbarcode_format == 'ITF') || ($pbarcode_format == 'MSI') || ($pbarcode_format == 'MSI10') || ($pbarcode_format == 'MSI11') || ($pbarcode_format == 'MSI1010') || ($pbarcode_format == 'MSI1110') || ($pbarcode_format == 'pharmacode') || ($pbarcode_format == 'CODE128C') || ($pbarcode_format == 'CODE128A')) {
            $hides = 'none';
        } else {
            $hides = 'inline-block';

        }
        if($pbarcode_value == 'pbrnumber'){
        $hidesvalue = 'block';        
        }else{
        $hidesvalue = 'none'; 
        }
?>

        <select name="pbarginerator_print_option[pbarcode_value]"  class="pbarcodeautoyes">

        <option value="sku"  <?php echo esc_attr($pbarcode_value) === 'sku' ? 'selected' : '' ?>><?php esc_html_e('The Product SKU', 'product-barcode-generator') ?></option>
        <option class="pbarcodeautono" value="ID"  <?php echo esc_attr($pbarcode_value) === 'ID' ? 'selected' : '' ?> style="display: <?php echo esc_attr($hides); ?>"><?php esc_html_e('The Product ID', 'product-barcode-generator') ?></option>

        <option value="pbrnumber" <?php echo esc_attr($pbarcode_value) === 'pbrnumber' ? 'selected' : '' ?>><?php esc_html_e('Barcode Number', 'product-barcode-generator') ?></option>



        </select>
    <div class="pabrdigit" style="display: <?php echo esc_attr($hidesvalue); ?>">
    <label for=""><?php esc_html_e('Choose Digit:', 'product-barcode-generator') ?></label>


        <select name="pbarginerator_print_option[pbrdigit]" >
        <option value="4"  <?php echo esc_attr($pbrdigit) === '4' ? 'selected' : '' ?>>4</option> 
        <option value="5"  <?php echo esc_attr($pbrdigit) === '5' ? 'selected' : '' ?>>5</option>  
        <option value="6"  <?php echo esc_attr($pbrdigit) === '6' ? 'selected' : '' ?>>6</option>  
        <option value="7"  <?php echo esc_attr($pbrdigit) === '7' ? 'selected' : '' ?>>7</option>  
        <option value="8"  <?php echo esc_attr($pbrdigit) === '8' ? 'selected' : '' ?>>8</option>   
        <option value="9"  <?php echo esc_attr($pbrdigit) === '9' ? 'selected' : '' ?>>9</option>   

        </select> <a id="pbr-number" video-url="https://www.youtube.com/watch?v=w6WtDni7Lzc" style="cursor: pointer;"><span title="video tutorial" id="docsides" class="dashicons dashicons-video-alt3"></span></a> <a href="https://barcode.dipashi.com/docs/automatically-generate-barcode-numbers/" target="_blank">Docs</a>
        <p class="numbergidhfdfh"><em><?php esc_html_e('Select the Digit of barcode numbers', 'product-barcode-generator') ?><em> </p>
        </div>
        <p class="manualnumner">Manually input the barcode number according to the barcode format. If the number is not as per the format, it will display CODE128 barcode</p>
        
    <?php
    }
    function pbarcode_madeby() {
        $options = get_option('pbarginerator_print_option');
        $pbarcode_madeby = isset($options['pbarcode_madeby']) ? $options['pbarcode_madeby'] : '';
        $pbar_madebypos = isset($options['pbar_madebypos']) ? $options['pbar_madebypos'] : 'bottom';
    $pbarcode_align = isset($options['pbarcode_align']) ? $options['pbarcode_align'] : 'center';
        printf('<input type="text" name="pbarginerator_print_option[pbarcode_madeby]" placeholder="Made In USA" value="%s" id="pbarcode_madeby">', $pbarcode_madeby);
        ?>


            <ul class="pmadebyids"><li>
        <strong><label><?php echo esc_html__('Text Position: ', 'product-barcode-generator'); ?></label></strong>
            <select name="pbarginerator_print_option[pbar_madebypos]" id="pbar_madebyposition">
                
            <option value="top" <?php echo esc_attr($pbar_madebypos) == 'top' ? 'selected' : '' ?>><?php esc_html_e('Top', 'product-barcode-generator'); ?></option>
            <option value="bottom" <?php echo esc_attr($pbar_madebypos) == 'bottom' ? 'selected' : '' ?>><?php esc_html_e('Bottom', 'product-barcode-generator'); ?></option>
            </select></li>       <li  class="txtaligndisplay"><span id="txtaligndisplay"><strong><label><?php echo esc_html__('Text Align: ', 'product-barcode-generator')  ?> </label></strong>

        <select name="pbarginerator_print_option[pbarcode_align]" id="pbarcode_align">

        <option value="center"  <?php echo esc_attr($pbarcode_align) === 'center' ? 'selected' : '' ?>><?php echo esc_html__('Center', 'product-barcode-generator') ?></option>
        <option value="left"  <?php echo esc_attr($pbarcode_align) === 'left' ? 'selected' : '' ?>><?php echo esc_html__('Left', 'product-barcode-generator') ?></option>
        <option value="right"  <?php echo esc_attr($pbarcode_align) === 'right' ? 'selected' : '' ?>><?php echo esc_html__('Right', 'product-barcode-generator') ?></option>
        </select></span>
        </li> <li>
        </li>
    </ul>

    <?php
    }
    function pbarcode_downlaobtn() {

        printf('<input type="text" value="Download" ><p class="description"><em style="color: #9b9b9b;">' . esc_html__('If the field is empty, the download button will disappear from single product page', 'product-barcode-generator') . '</em></p>');
    }


    function pbarcode_types()
    {

        $options = get_option('pbarginerator_print_option');
        $pbarcode_value = isset($options['pbarcode_types']) ? $options['pbarcode_types'] : 'img';

  
    ?>
    
        <select name="pbarginerator_print_option[pbarcode_types]">


        <option value="img"  <?php echo esc_attr($pbarcode_value) === 'img' ? 'selected' : '' ?>><?php esc_html_e('Image', 'product-barcode-generator') ?></option>

        <option value="svg"  <?php echo esc_attr($pbarcode_value) === 'svg' ? 'selected' : '' ?>><?php esc_html_e('Svg', 'product-barcode-generator') ?></option>

        </select>
    <?php
    }



    function pbar_preview_demo()
    {

        include PBARGENERATOR_PATH . '/admin/extenstion/preview-extntion.php';
    }

    function barcode_print_css_labe(){

    echo "<h2>Barcode Label Settings</h2>";
    }function pbar_shortcosssg(){

    return true;
    }
    function pbarcode_enable_shoppage() {
        $options = get_option('pbarginerator_print_option');
        printf('<input type="checkbox" name="pbarginerator_print_option[pbarcode_enable_shoppage]" class="pbrapple-switch"   value="pbarcode_enable_shoppage" %s><p class="description"><em style="color: #9b9b9b;">' . esc_html__('Click to Turn off display the product barcode on the Shop,Categories,tags pages', 'product-barcode-generator') . ' <a href="https://barcode.dipashi.com/shop/"  target="_blank">View Demo</a></em></p>', (isset($options['pbarcode_enable_shoppage']) && $options['pbarcode_enable_shoppage'] === 'pbarcode_enable_shoppage') ? 'checked' : '');
    }
    function barcode_print_setting_labe(){

    echo '<h2>Bulk Print & Download (Premium) <a id="pbr-vides" video-url="https://www.youtube.com/watch?v=vIQcjeJ56gk"><span title="video tutorial" id="docsides" class="dashicons dashicons-video-alt3"></span></a><span id="rxpandpremiuprint">Expand Settings &darr;</span></h2>';
    }
  function barcode_shortcodesettingsd(){

    echo '<h2>Shortcode & Auto Display barcode (Premium) <a  id="pbr-shortcoe" video-url="https://www.youtube.com/watch?v=LreoteMeVs8"><span title="video tutorial" id="docsides" class="dashicons dashicons-video-alt3"></span></a><span id="rxpandpremishort">Expand Settings </span>&darr;</h2>';



    }


    function barcode_label_setting(){

    echo "<h2>Product Title & Price(For Print)</h2>";
    }




    function pbrc_print_section_func()
    {
        //require_once PBARGENERATOR_PATH . 'admin/extentions/print-extntion.php';
    }

    function qrc_print_settting_func()
    {
        return true;
    }
    function qr_print_per_page()
    {
        $placeholder = esc_html('Enter the barcode images number on each page, -1 for all displays', 'product-barcode-generator');
        printf('<ul class="br_per_page"><li><strong><label> ' . esc_html__('Barcode Per Page :', 'product-barcode-generator') . '</label></strong><input type="text" value="7" placeholder="Barcode Per Page, e.g:10"><p><em style="color: #9b9b9b;">%s</em></p></li>',$placeholder);
 

         echo '<li><strong><label> ' . esc_html__('Order By:', 'product-barcode-generator') . '</label></strong>';


         ?>

         <select>

         <option value="ID" ><?php echo esc_html__('ID  ', 'product-barcode-generator') ?></option>
         <option value="title"><?php echo esc_html__('Title', 'product-barcode-generator') ?></option>
         <option value="date"><?php echo esc_html__('Date', 'product-barcode-generator') ?></option>
         <option value="name"><?php echo esc_html__('Name', 'product-barcode-generator') ?></option>


         </select>
        <p><em style="color: #9b9b9b;"> <?php echo esc_html__('Display barcode image as order by', 'product-barcode-generator') ?></em></p></li>

        <li><strong><label><?php echo esc_html("Category Type: ","product-barcode-generator");?></label></strong>
        <select id="qr_print_cat_ty" >
            <option value="all"><?php echo esc_html__('All', 'product-barcode-generator') ?></option>
            <?php
                if (class_exists("WooCommerce"))
                {

                    $terms = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                    ));

                    foreach ($terms as $el_category)
                    {

        ?>

        <option><?php echo esc_attr($el_category->name); ?></option>

        <?php
                }
            }

        ?>
        </select>
        <p><em style="color: #9b9b9b;"> <?php echo esc_html__('Filter barcodes by category on each page ', 'product-barcode-generator') ?></em></p></li>
        <?php

        if (current_user_can('manage_options'))
        {
          ?>
    </li><strong><label><?php echo esc_html("Add Capabily: ","product-barcode-generator");?></label></strong>
        <select>
        <option value="---">---</option>
        <option value="editor"><?php echo esc_html__('editor', 'product-barcode-generator') ?> </option>
        <option value="author"><?php echo esc_html__('author', 'product-barcode-generator') ?></option>
        <option value="contributor"><?php echo esc_html__('contributor', 'product-barcode-generator') ?></option>
        <option value="subscriber"><?php echo esc_html__('subscriber', 'product-barcode-generator') ?></option>
        <option value="customer"><?php echo esc_html__('customer', 'product-barcode-generator') ?></option>
        <option value="shop_manager"><?php echo esc_html__('shop manager', 'product-barcode-generator') ?></option>

        </select>

      <p><em style="color: #9b9b9b;"> <?php echo esc_html__('Admin can add a user role for this page and print page', 'product-barcode-generator') ?></em></p></li>

      <?php 
      }
      echo '</ul>';  

    }
    function barcode_height_set_page()
    {
        $options = get_option('pbarginerator_print_option');
        $options_value = isset($options['barcode_height_set_page']) ? $options['barcode_height_set_page'] : 40;
        printf('<span id="bar-height-display"></span>
          <input type="range" name="pbarginerator_print_option[barcode_height_set_page]" value="%s" min="10" max="150" class="rangesliderdfdf" id="barcode_height_set_page">', $options_value);

    }


    function barcode_for_signgle_Page(){

    printf('<input type="text" class="pbarfrntdhsjtr" disabled value="[pbar-display]"><p class="Rgtddfdfd"><em style="color: #9b9b9b;">'.esc_html('
    Copy the shortcode and use it anywhere on the single product page', 'product-barcode-generator').'</em></p>');

    }
    function barcode_for_shop_Page(){

    printf('<input type="text" class="pbarfrntdhsjtr" disabled value="[pbar-shop]"><p class="Rgtddfdfd"><em style="color: #9b9b9b;">'.esc_html('
    If you are a developer you can use this code in a template file  <?php echo do_shortcode("[pbar-shop]"); ?>', 'product-barcode-generator').'</em></p>');

    }

    function barcode_enable_print_shtco(){

    printf('<input type="checkbox"  class="pbrapple-switch"><span style="display:inline-block;margin-right:30px"></span>
        <input type="text" class="pbarfrntdhsjtr" disabled value="[pbar-print]"><p class="description"><em style="color: #9b9b9b;">
        <p class="description"><em style="color: #9b9b9b;">'.esc_html('Click to enable shortcodes for frontend', 'product-barcode-generator').' <a href="https://barcode.dipashi.com/print-demo/" target="_blank">View Demo</a></em></p>');

        }

    function pbarcode_enable_frontend(){


    printf('<input type="checkbox" class="pbrapple-switch" ><p class="description"><em style="color: #9b9b9b;">'.esc_html('Click to turn off automatically display the barcode on the single product page', 'product-barcode-generator').' <a href="https://barcode.dipashi.com/product/v-neck-t-shirt/"  target="_blank">View Demo</a></em></p>');

        }

    function pbarcode_enable_shop(){

    printf('<input type="checkbox" class="pbrapple-switch"><p class="description"><em style="color: #9b9b9b;">'.esc_html('Click to turn off automatically display the barcode on the shop and product cateogry/tags page', 'product-barcode-generator').' <a href="https://barcode.dipashi.com/product/v-neck-t-shirt/"  target="_blank">Demo</a></em></p>');

        }

    function barcode_enable_down_shtco(){

      printf('<input type="checkbox" class="pbrapple-switch"><span style="display:inline-block;margin-right:30px"></span><input type="text" class="pbarfrntdhsjtr" disabled value="[pbar-download]"><p class="description"><em style="color: #9b9b9b;"><p class="description"><em style="color: #9b9b9b;">'.esc_html('Click to enable shortcodes for frontend' ,'product-barcode-generator').' <a href="https://barcode.dipashi.com/download-page/"  target="_blank">View Demo</a></em></p>',);  
        }



    function pbarginerator_print_option_page_sanitize($input)
    {
        $sanitary_values = array();

        if (isset($input['qr_print_title_display']))
        {
            $sanitary_values['qr_print_title_display'] = ($input['qr_print_title_display']);
        }
        if (isset($input['qr_print_price_display']))
        {
            $sanitary_values['qr_print_price_display'] = ($input['qr_print_price_display']);
        }
        if (isset($input['pbarcode_value']))
        {
            $sanitary_values['pbarcode_value'] = ($input['pbarcode_value']);
        }
        if (isset($input['pbar_price_color']))
        {
            $sanitary_values['pbar_price_color'] = ($input['pbar_price_color']);
        }
        if (isset($input['pbar_title_color']))
        {
            $sanitary_values['pbar_title_color'] = ($input['pbar_title_color']);
        }
        if (isset($input['pbarcode_width']))
        {
            $sanitary_values['pbarcode_width'] = ($input['pbarcode_width']);
        }
        if (isset($input['pbarcode_format']))
        {
            $sanitary_values['pbarcode_format'] = ($input['pbarcode_format']);
        }
        if (isset($input['pbar_title_font']))
        {
            $sanitary_values['pbar_title_font'] = ($input['pbar_title_font']);
        }
        if (isset($input['pbar_price_font']))
        {
            $sanitary_values['pbar_price_font'] = ($input['pbar_price_font']);
        }
        if (isset($input['barcode_label_fontsize']))
        {
            $sanitary_values['barcode_label_fontsize'] = ($input['barcode_label_fontsize']);
        }
        if (isset($input['barcode_label_txtmargin']))
        {
            $sanitary_values['barcode_label_txtmargin'] = ($input['barcode_label_txtmargin']);
        }
        if (isset($input['pbar_fnt_option']))
        {
            $sanitary_values['pbar_fnt_option'] = ($input['pbar_fnt_option']);
        }
        if (isset($input['pbar_fnt_txtalign']))
        {
            $sanitary_values['pbar_fnt_txtalign'] = ($input['pbar_fnt_txtalign']);
        }
        if (isset($input['pbar_txtposition']))
        {
            $sanitary_values['pbar_txtposition'] = ($input['pbar_txtposition']);
        }
        if (isset($input['pbarcode_types']))
        {
            $sanitary_values['pbarcode_types'] = ($input['pbarcode_types']);
        }
        if (isset($input['qbarcode_bg_color']))
        {
            $sanitary_values['qbarcode_bg_color'] = ($input['qbarcode_bg_color']);
        }
        if (isset($input['qbarcode_display_color']))
        {
            $sanitary_values['qbarcode_display_color'] = ($input['qbarcode_display_color']);
        }
        if (isset($input['barcode_height_set_page']))
        {
            $sanitary_values['barcode_height_set_page'] = ($input['barcode_height_set_page']);
        }
        if (isset($input['barcode_label_fontfami']))
        {
            $sanitary_values['barcode_label_fontfami'] = ($input['barcode_label_fontfami']);
        }
        if (isset($input['barcode_label_fontfamiown']))
        {
            $sanitary_values['barcode_label_fontfamiown'] = ($input['barcode_label_fontfamiown']);
        }
        if (isset($input['qr_print_fontfamilyown']))
        {
            $sanitary_values['qr_print_fontfamilyown'] = ($input['qr_print_fontfamilyown']);
        }
        if (isset($input['qr_print_fontfamily']))
        {
            $sanitary_values['qr_print_fontfamily'] = ($input['qr_print_fontfamily']);
        }
 
        return $sanitary_values;
    }
}


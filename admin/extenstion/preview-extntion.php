<?php

    include PBARGENERATOR_PATH . '/admin/extenstion/datapbarcodes.php';

    if ($pbarcode_format == 'EAN13')
    {
        $printSju = '1234567890128';

    }    
    if ($pbarcode_format == 'EAN8')
    {
        $printSju = '12345670';

    }
    if ($pbarcode_format == 'UPC')
    {
        $printSju = '123456789012';
    }
    if ($pbarcode_format == 'CODE128'){

        if ($pbarcode_value == 'sku')
        {
            $printSju = 'AB1234567890';
        }
        if ($pbarcode_value == 'ID')
        {
            $printSju = '123456';
        }
        if ($pbarcode_value == 'pbrnumber')
        {
            $printSju = '234565865';
        }
    }
        if ($qr_print_title_display == 'yes')
        {
            $displays =" inline-block";

        }else{
            $displays =" none";
        }
    
     
        $title_show = '<li class="qr_title_print" style="color:' . $pbar_title_color . ';font-size:'.$pbar_title_font.'px">' . esc_html__("Product Title", "product-barcode-generator") . '</li>';
    
    if ($qr_print_price_display == 'yes')
            {
                $display =" inline-block";

            }else{
                $display =" none";
            }


            if($pbarcode_types == 'svg'){
        $pbarcode_typess = '<svg id="barcodedemo_"></svg>'  ;
        }else{
        $pbarcode_typess = '<img id="barcodedemo_">';
        }
        if($pbar_madebypos == 'top'){
            $displaysds = 'none';
            $displaysds1 = 'inline';
        }else{
            $displaysds1 = 'none';
            $displaysds = 'inline';
        }
        $price_show = '<li class="qr_price_print" style="display:'.$display.';color:' . $pbar_price_color . ';font-size:'.$pbar_price_font.'px"">' . esc_html__("$20", 'product-barcode-generator') . '</li>';
   

    printf('<div class="loaderpsd">Loading...</div><div id="lpreviewwrap"><input class="form-control" id="userInput" type="hidden" value="'.$printSju.'" placeholder="Barcode" autofocus><ul id="prbpreviewpass" class="master_barcode djhfdhfuh" style="list-style:none;font-family:'.$qr_print_fontfamily.'; display: inline-block;margin-bottom:10px;margin-right: 10px;list-style: none;position:sticky;text-align: ' . $pbarcode_align . ';background:' . $qbarcode_bg_color . '"><div class="pbrbarcodetitrlshdgh">
                ' . $title_show .' '. $price_show . '</div><span id="madebytopswrap" style="display:'.$displaysds1.'"><span class="madebytops">'.$pbarcode_madeby.'</span></span><li>'.$pbarcode_typess.'</li><span id="madebytbtmsswrap" style="display:'.$displaysds.'"><span class="madebytbtms">'.$pbarcode_madeby.'</span></span>
        
</ul><div class="pbar_freeftcs_cont">
               <p class="pbar_ftcs__h"> Where can I find a barcode?<a id="pbr-find" video-url="https://www.youtube.com/watch?v=zoDVKlFRcBk" style="cursor: pointer;"><span title="video tutorial" id="docsides" class="dashicons dashicons-video-alt3"></span></a></p>
               <div>
                  <div class="parccintr">Go to <span class="dashicons-before dashicons-archive"></span>Products, then All Products, and then Edit a Product. Scroll down, you will see the "barcode" of the product                  </div>
               </div>
            </div></div>
    ');


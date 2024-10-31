<?php

    $options = get_option('pbarginerator_print_option');
    $Download = isset($options['pbarcode_downlaobtn']) ? $options['pbarcode_downlaobtn'] : 'Download';
    $pbarcode_madeby = isset($options['pbarcode_madeby']) ? $options['pbarcode_madeby'] : '';
    $pbar_madebypos = isset($options['pbar_madebypos']) ? $options['pbar_madebypos'] : 'bottom';
    $qrc_perPage = isset($options['qr_per_page']) ? $options['qr_per_page'] : 12;
    $barcode_perPage = isset($options['qr_per_page']) ? $options['qr_per_page'] : 12;
    $current_title = get_the_title(get_the_id());
    $pbarcode_types = isset($options['pbarcode_types']) ? $options['pbarcode_types'] : 'img';
    $qr_print_title_display = isset($options['qr_print_title_display']) ? $options['qr_print_title_display'] : 'yes';
    $qr_print_price_display = isset($options['qr_print_price_display']) ? $options['qr_print_price_display'] : 'yes';

    $qr_print_cat_type = isset($options['qr_print_cat_type']) ? $options['qr_print_cat_type'] : 'all';
    $qbarcode_display_color = isset($options['qbarcode_display_color']) ? $options['qbarcode_display_color'] : '#16267d';

    $qrc_print_orderby = isset($options['qrc_print_orderby']) ? $options['qrc_print_orderby'] : 'title';
    $pbarcode_value = isset($options['pbarcode_value']) ? $options['pbarcode_value'] : 'pbrnumber';
    $pbarcode_align = isset($options['pbarcode_align']) ? $options['pbarcode_align'] : 'center';
    $pbar_title_color = isset($options['pbar_title_color']) ? $options['pbar_title_color'] : '#000';
    $pbar_price_color = isset($options['pbar_price_color']) ? $options['pbar_price_color'] : '#000';

    $pbarcode_format = isset($options['pbarcode_format']) ? $options['pbarcode_format'] : 'CODE128';

    $barcode_height = isset($options['barcode_height_set_page']) ? $options['barcode_height_set_page'] : 40;

    $pbarcode_width = isset($options['pbarcode_width']) ? $options['pbarcode_width'] : '2';
    $qbarcode_bg_color = (isset($options['qbarcode_bg_color'])) ? $options['qbarcode_bg_color'] : '#ddd';
    $pbar_title_font = isset($options['pbar_title_font']) ? $options['pbar_title_font'] : '11';

    $pbar_price_font = isset($options['pbar_price_font']) ? $options['pbar_price_font'] : '11';

        $barcode_label_fontsize = isset($options['barcode_label_fontsize']) ? $options['barcode_label_fontsize'] : 12;

        $barcode_label_txtmargin = isset($options['barcode_label_txtmargin']) ? $options['barcode_label_txtmargin'] : 1;

        $pbar_fnt_option = isset($options['pbar_fnt_option']) ? $options['pbar_fnt_option'] : '';

        $pbar_fnt_txtalign = isset($options['pbar_fnt_txtalign']) ? $options['pbar_fnt_txtalign'] : 'center';

        $pbar_txtposition = isset($options['pbar_txtposition']) ? $options['pbar_txtposition'] : 'bottom';

        $barcode_label_fontfami = isset($options['barcode_label_fontfami']) ? $options['barcode_label_fontfami'] : 'sans-serif';

        $barcode_label_fontfamiown = isset($options['barcode_label_fontfamiown']) ? $options['barcode_label_fontfamiown'] : 'sans-serif';

        if( $barcode_label_fontfami == 'custom'){

        $barcode_label_fontfami =   $barcode_label_fontfamiown;
        }

        $qr_print_fontfamilyown = isset($options['qr_print_fontfamilyown']) ? $options['qr_print_fontfamilyown'] : 'sans-serif';

        $qr_print_fontfamily = isset($options['qr_print_fontfamily']) ? $options['qr_print_fontfamily'] : 'sans-serif';

        if( $qr_print_fontfamily == 'custom'){

        $qr_print_fontfamily =   $qr_print_fontfamilyown;
        }

         if($pbar_madebypos == 'top'){
            $madebytop = $pbarcode_madeby;
            $madebybtm = '';
        }else{
            $madebytop = '';
            $madebybtm = $pbarcode_madeby;
        }
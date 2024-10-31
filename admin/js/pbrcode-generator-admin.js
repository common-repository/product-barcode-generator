(function($) {

	$(window).on('load', function() {
		$(".loaderpsd").hide();
		$("#lpreviewwrap").css('display', 'block');
		$("div#pbrpbrtab-content").fadeIn(300);
	});


	$(document).ready(function() {
		"use strict";

		$("div#pbrtab-content").show();
		$('#pbarcode_madeby').on('input', function() {
			$('.madebytops').text($(this).val());
			$('.madebytbtms').text($(this).val());
		});
		jQuery('#pbar_madebyposition').change(function() {
			if ($(this).val() == 'top') {
				jQuery('#madebytbtmsswrap').hide();
				jQuery('#madebytopswrap').show();
			} else {
				jQuery('#madebytbtmsswrap').show();
				jQuery('#madebytopswrap').hide();

			}
		});
		$("#orderemail").videoPopup();
		$("#pbr-number").videoPopup();
		$("#pbr-vides").videoPopup();
		$("#pbr-prints").videoPopup();
		$("#pbr-shortcoe").videoPopup();
		$("#pbr-find").videoPopup();
		$("#pbr-oder").videoPopup();
		$("#pbr-pdf").videoPopup();
		$("#pbr-downl").videoPopup();
		$('.pbarcodeen13').on('change', function() {
			if (($(this).val() == 'EAN13') || ($(this).val() == 'UPC') || ($(this).val() == 'EAN8') || ($(this).val() == 'ITF') || ($(this).val() == 'MSI') || ($(this).val() == 'MSI10') || ($(this).val() == 'MSI11') || ($(this).val() == 'MSI1010') || ($(this).val() == 'MSI1110') || ($(this).val() == 'pharmacode') || ($(this).val() == 'CODE128C') || ($(this).val() == 'CODE128A')) {
				$('.pbarcodeautono').hide()
			} else {
				$('.pbarcodeautono').show()
			}
		});


		$('.pbarcodeen13').on('change', function() {
			$('.upcinfo').hide();
			$('.en13info').hide();
			$('.en8info').hide();
			$('.nuremics').hide();
			$('.nuremstatics').hide();
			if (($(this).val() == 'ITF') || ($(this).val() == 'MSI') || ($(this).val() == 'MSI10') || ($(this).val() == 'MSI11') || ($(this).val() == 'MSI1010') || ($(this).val() == 'MSI1110') || ($(this).val() == 'pharmacode') || ($(this).val() == 'CODE128C') || ($(this).val() == 'CODE128A')) {
				$('.nuremics').show()
			}
			if (($(this).val() == 'CODE128') || ($(this).val() == 'CODE39') || ($(this).val() == 'CODE128B')) {
				$('.nuremstatics').show()
			}
			if ($(this).val() == 'EAN13') {
				$('.en13info').show()
			}
			if ($(this).val() == 'EAN8') {
				$('.en8info').show()
			}
			if ($(this).val() == 'UPC') {
				$('.upcinfo').show()
			}
		});
		$('#barcode_label_fontfami').on('change', function() {
			if ($(this).val() == 'custom') {
				$('#barcode_label_fontfamiown').show()
			} else {
				$('#barcode_label_fontfamiown').hide()
			}
		});
		$('#qr_print_fontfamily').on('change', function() {
			if ($(this).val() == 'custom') {
				$('#qr_print_fontfamilyown').show()
			} else {
				$('#qr_print_fontfamilyown').hide()
			}
		})
	})
})(jQuery);
(function($) {
	$(document).ready(function() {
		"use strict";
		var defaultValues = {
			CODE128: "1234567",
			EAN13: "1234567890128",
			EAN8: "12345670",
			UPC: "123456789999",
		};
		$(document).ready(function() {
			$('#ordebarcodevalue').on('click', function() {
				if ($(this).val() == 'orderid') {
					$('#ordebarcodevalueprfixwrapper').show()
				} else {
					$('#ordebarcodevalueprfixwrapper').hide()
				}
			});
			$('#ordebarcodevalueprfix').on('change', function() {
				if ($(this).val() == 'yes') {
					$('#pbarcode_value_prefixyes').show()
				}
				if ($(this).val() == 'no') {
					$('#pbarcode_value_prefixyes').hide()
				}
			});
			$('#pbrbarcode_loaction').on('click', function() {
				if ($(this).val() == 'shop') {
					$('#imageselct1').show();
					$('#imageselct2').hide()
				}
				if ($(this).val() == 'note') {
					$('#imageselct2').show();
					$('#imageselct1').hide()
				}
			});
			$("#userInput").on('input', newBarcode);
			$("#barcodeType").change(function() {
				$("#userInput").val(defaultValues[$(this).val()]);
				newBarcode()
			});
			$('.qrc-bgcolor-picker').colorPicker({
				renderCallback: newBarcode
			});
			$('.pbr-picker').colorPicker({
				opacity: !1,
			});
			$("#pbarcode_align").change(function() {
				$(".master_barcode").css({
					"text-align": $(this).val()
				});
				newBarcode()
			});
			$("#qr_print_title_display").change(function() {
				$(".qr_title_print").css({
					"display": $(this).val()
				});
				newBarcode()
			});
			$("#qr_print_price_display").change(function() {
				if ($(this).val() == 'yes') {
					$(".qr_price_print").show();
				} else {
					$(".qr_price_print").hide();
				}
			});
			$("#qr_print_title_display").change(function() {
				if ($(this).val() == 'yes') {
					$(".qr_title_print").show();
				} else {
					$(".qr_title_print").hide();
				}
			});
			$('input[type="range"].rangesliderdfdf').rangeslider({
				polyfill: !1,
				rangeClass: 'rangeslider',
				fillClass: 'rangeslider__fill',
				handleClass: 'rangeslider__handle',
				onSlide: newBarcode,
				onSlideEnd: newBarcode
			});
			$("#barcode_label_fontfami").on('input', function() {
				$(this).val();
				newBarcode()
			});
			$("#pbar_fnt_option").change(function() {
				$(this).val();
				newBarcode()
			});
			$("#barcode_label_fontsize").change(function() {
				$(this).val();
				newBarcode()
			});
			$("#pbar_txtposition").change(function() {
				$(this).val();
				newBarcode()
			});
			$("#pbar_fnt_txtalign").change(function() {
				$(this).val();
				newBarcode()
			});
			$("#pbar_price_font").on('input', function() {
				$(".qr_price_print").css({
					"font-size": $(this).val() + "px"
				});
				newBarcode()
			});
			$("#qr_print_fontfamily").on('input', function() {
				$(".master_barcode").css({
					"font-family": $(this).val()
				});
				newBarcode()
			});
			$("#pbar_title_font").on('input', function() {
				$(".qr_title_print").css({
					"font-size": $(this).val() + "px"
				});
				newBarcode()
			});
			newBarcode()
		});
		var newBarcode = function() {
			$("#barcodedemo_").JsBarcode($("#userInput").val(), {
				"format": $("#barcodeType").val(),
				"background": $("#background-color").val(),
				"lineColor": $("#line-color").val(),
				"width": $("#pbarcode_width").val(),
				"height": $("#barcode_height_set_page").val(),
				"fontSize": $("#barcode_label_fontsize").val(),
				"fontOptions": $("#pbar_fnt_option").val(),
				"font": $("#barcode_label_fontfami").val(),
				"textPosition": $("#pbar_txtposition").val(),
				"textMargin": $("#barcode_label_txtmargin").val(),
				"textAlign": $("#pbar_fnt_txtalign").val(),
			});
			$("#bar-width-display").text($("#pbarcode_width").val());
			$("#bar-height-display").text($("#barcode_height_set_page").val());
			$("#bar-label-display").text($("#barcode_label_fontsize").val());
			$("#bar-txtmargin-display").text($("#barcode_label_txtmargin").val());
			$("#bar-fontSize-display").text($("#bar-fontSize").val());
			$("#bar-margin-display").text($("#bar-margin").val());
			$("#bar-text-margin-display").text($("#bar-text-margin").val());
			$("#orderbar_height-display").text($("#orderbar_height").val());
			$(".qr_title_print").css({
				"color": $("#pbar_title_color").val()
			});
			$(".qr_price_print").css({
				"color": $("#pbar_price_color").val()
			});
			$(".master_barcode").css({
				"text-align": $("#pbarcode_align").val()
			});
			$(".master_barcode").css({
				"background": $("#background-color").val()
			})
			$(".qr_title_print").css({
				"display": $("#pbarcode_inline").val()
			});
			$(".qr_title_print").css({
				"display": $("#qr_print_title_display").val()
			});
			$(".qr_price_print").css({
				"display": $("#pbarcode_inline").val()
			});
			$(".qr_title_print").css({
				"font-size": $("#pbar_title_font").val() + "px"
			});
			$(".qr_price_print").css({
				"font-size": $("#pbar_price_font").val() + "px"
			})
		}


		$('.parcode_hidemobi th').append("<p>Choose barcode color and background color. Use a light color for the background for better scans</p>");

		$('.parcode_format th').append("<p>Here you will get 14 formats, if you don't understand the code of the format, select CODE 128(Auto)</p>");


		$('.parcode_vakus th').append("<p>The barcode will be generated based on this option. if you select 'Barcode Number' it will automatically generate barcode number for each product.</p>");

		$('.pbarcode_values th').append("<p>The barcode will be generated based on this option. It will automatically generate barcode number for each order based on order id or transaction id.</p>");
		$('.orders_mail_product th').append("<p>	Click to turn off product barcode display in order mail</p>");


		$('.orders_page_orbarcode th').append("<p>Click to turn off automatic display of order barcode on the order page (WooCommerce > Order)</p>");
		$('.orders_page_product th').append("<p>Click to turn off automatic display of product barcodes on the order page (WooCommerce > Order)</p>");

		$('.barcode_print_css_labe th').append("<p> integrated <a href='https://wordpress.org/plugins/woocommerce-pdf-invoices-packing-slips/' target='_blank'>PDF Invoice and Packing Slip for WooCommerce plugin.</a> After the order is placed, the seller and the customer will receive the printed order barcode.</p>");

		$('.barcode_print_css_labess th').append("<p>After an order is completed the barcode will be printed on the order mail. Generate Barcode from Order ID/Transaction ID or Custom Number</p>");

		$('.orders_pdf_product th').append("<p>Click to turn off product barcode display in PDF</p>");


		$('.pdfshoes_types th').append("<p>Select this section to display the barcode in PDF Invoice. You can also turn off this functionality</p>");


		$('.orders_types th').append("<p>Select this section to display the barcode in the order email. You can turn off this functionality</p>");


		$('.parcode_tye th').append("<p>There are two types of barcodes, we recommend image</p>");

		$('.parcode_width th').append("<p>Select the width of the barcode bar. range 2-4 default:'2'</p>");

		$('.pbarcode_widths th').append("<p>Select the width of the barcode bar. range 1-1.6 default:'1'</p>");

		$('.parcode_height th').append("<p>Select the height of the barcode bar. range 10-100 default:'65'</p>");

		$('.orderbar_height th').append("<p>Select the height of the barcode bar. range 10-60 default:'40'</p>");


		$('.parcode_madeby th').append("<p>This is a field for writing a custom text. If the field is empty, the text will disappear</p>");
		$('.parcode_labeltaxonmy th').append("<p>Barcode label means the barcode number or the content of the barcode, customize the label's color, font, etc.</p>");


		$('.parcode_titcolor th').append("<p>This is the product title and price Typography section</p>");

		$('#pbardesingsubmit').submit(function() {
			$('.qrcintegrates').addClass("pbrfancyLoaderCss");
			$('.qrcintegrates_djkfhjhj').hide();
			var b = $(this).serialize();
			$.post('options.php', b).error(function() {
				alert('error')
			}).success(function() {
				$(".qrcintegrates").removeClass("pbrfancyLoaderCss");
				$('.qrcintegrates_djkfhjhj').show();
				$('.qrcintegrates_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
			});
			return false;
		});
	})
})(jQuery);


(function($) {

	jQuery(document).ready(function($) {
		
		$('#barcodeType').on('change', function () {
		if (($(this).val() == 'CODE128')&& ($('.pbarcodeautoyes').val() == 'pbrnumber')) {
		$('.pabrdigit').show();
		$('.manualnumner').hide();
		} else {
		$('.pabrdigit').hide();
		$('.manualnumner').show();
		}
		});
		if(($('#barcodeType').val() == 'CODE128')&& ($('.pbarcodeautoyes').val() == 'pbrnumber')){
		$('.pabrdigit').show();
		$('.manualnumner').hide();
		}else{
		$('.pabrdigit').hide();
		$('.manualnumner').show();
		}  
		$('.pbarcodeautoyes').on('change', function() {
		if(($(this).val() == 'pbrnumber') && ($('#barcodeType').val() == 'CODE128')){
		$('.pabrdigit').show();
		$('.manualnumner').hide();
		}else {
		$('.pabrdigit').hide()
		}
		});

		if(($('.pbarcodeautoyes').val() == 'pbrnumber') && ($('#barcodeType').val() == 'CODE128')){
		$('.pabrdigit').show();
		$('.manualnumner').hide();
		}else {
		$('.pabrdigit').hide()
		}

		
		

		// Suffix that will be used on the classes of the content divs.
		var tab_suffix = '-tab';

		// Not necessary, just to enable people to choose whatever tab_suffix they want.
		function escape_regexp(str) {
			return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
		}

		// Get the class ending with tab_suffix from an element.
		function get_tab_name_from_class(el) {
			var tab_class_pattern = new RegExp('\\S*' + escape_regexp(tab_suffix));
			if ($(el) && $(el).attr('class')) {
				return $(el).attr('class').match(tab_class_pattern)[0];
			}
		}

		// Update the dom with the selected tab.
		function hash_content_update() {

			var active_section,
				tab_names;

			// Get all classes ending with -tab from div elements directly inside #pbrtab-content.
			tab_names = $('div#pbrtab-content > div').map(function() {
				var tab_name = get_tab_name_from_class($(this));
				if (tab_name) {
					return tab_name.split(tab_suffix)[0];
				}
			}).get();

			if (tab_names.length > 0) {

				// Show first tab initially.
				active_section = tab_names[0];
				if (document.location.href.split('#')[1] && tab_names.indexOf(document.location.href.split('#')[1]) > -1) {
					active_section = document.location.href.split('#')[1];
				}
				$('div#pbrtab-content div.active').removeClass('active');
				$('div#pbrtab-content div.' + active_section + tab_suffix).addClass('active');
				$('div.pbrtabs ul li.active').removeClass('active');
				$('div.pbrtabs ul li a[href="#' + active_section + '"]').closest('li').addClass('active');

			}
		}

		$(window).bind('hashchange', function() {
			hash_content_update();
		});

		hash_content_update();

	});

}(jQuery));
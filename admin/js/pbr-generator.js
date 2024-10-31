(function($) {
    $(window).on('load', function() {
        $("#pbrloader").hide();
        $("#pbrbarcometabinov").css('display', 'block');

    });
    $(document).ready(function() {
        "use strict";

        function pbarcodemetabox() {

            jQuery("#pro_barqr_print_wrapepr").each(function() {
                var dkjfdf = $(this).data('sku');
                const formats = ["CODE128", pbrGrnerator.pbfformat];
                const dfdfdfd = formats.map(function(format) {
                    let value;
                    JsBarcode("#Probarcode_metabox", dkjfdf, {
                        format:format,
                        width: pbrGrnerator.width,
                        fontOptions: pbrGrnerator.fontOptions,
                        fontSize: pbrGrnerator.fontSize,
                        font: pbrGrnerator.font,
                        textPosition: pbrGrnerator.textPosition,
                        textAlign: pbrGrnerator.textAlign,
                        textMargin: pbrGrnerator.textMargin,
                        lineColor: pbrGrnerator.lineColor,
                        height: pbrGrnerator.height,
                        margin: 0,
                        background: pbrGrnerator.background,
                        valid: function(valid) {
                            if (valid) value = format;
                        },
                    });
                });

                jQuery("#download_Pbar_con").on("click", function() {

                    var node = document.getElementById("pro_barqr_print_wrapepr");
                    domtoimage.toPng(node).then(function(dataUrl) {
                        var anchorTag = document.createElement("a");
                        anchorTag.download = pbrGrnerator.cuurenttitle + '.png';
                        anchorTag.href = dataUrl;
                        anchorTag.target = "_blank";
                        anchorTag.click();

                    });
                })

                function printDiv() {
                    var printContents = document.getElementById("printarea").innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }

            });
        }
        pbarcodemetabox();
    })

})(jQuery)
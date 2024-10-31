(function($) {
    $(document).ready(function() {
        "use strict";

        function orderbarvode() {
            jQuery(".pbdorderbarcode").each(function() {

                var contents = $(this).data('ordercont');
                var firstName = $(this).attr('id');
                var OrdeName = '#' + firstName;
                JsBarcode(OrdeName, contents, {
                    format: "CODE128",
                    width: 1,
                    margin: 0,
                    height: 30,
                    fontSize: 13,
                    textMargin: 0,
                    font: 'sans-serif'
                });



            });
        }
        orderbarvode();
    })

})(jQuery)
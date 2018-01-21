/**
 * Start executing after dom is loaded.
 */
$(function(){
    conversionForm();
});

/**
 * Checking for changes in the form using jquery event handlers.
 */
function conversionForm() {
    var form = $('#conversion-form');

    $('#conversionform-amount').keyup(function(event) {
        updateConversionResult(form);
    });
    $('#conversionform-fromcurrencyid').change(function(event) {
        updateConversionResult(form);
    });
    $('#conversionform-tocurrencyid').change(function(event) {
        updateConversionResult(form);
    });
   
}

/**
 * Send the form data to the 'site/ajax-conversion' Controller using post method
 * and return a json object as a result with the converted amount and the currency code that it has been converted to.
 * Also update the values in the DOM
 * @param form
 */
function updateConversionResult(form){
    $.ajax({
        url: 'site/ajax-conversion',
        type: 'POST',
        data: form.serialize(),
        success: function(data) {
            $('#conversionResult .currency').html(data.currency);
            $('#conversionResult .amount').html(data.amount.toFixed(2));
        },
        dataType: 'json'
    })
}
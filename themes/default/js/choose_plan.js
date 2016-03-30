// selectize for category and location selects
$(function () {
    $('input[name="plan_enable_disable"]').click(function () {
        calculate_price();
    });
    $('select.plan_list').change(function () {
        calculate_price();
    });
    calculate_price();
});

function calculate_price() {
    var plan_price = 0;
    $('table#choose_plans tbody tr:not(.summary)').each(function () {
        that = $(this);
        if(that.find('[name="plan_enable_disable"]').is(':checked')){
            that.find('select.plan_list,input.website').removeAttr('disabled');
            row_price = parseFloat(that.find('.plan_list option:selected').data('price'));
            that.find('.plan_price').text(row_price);

            plan_price = parseFloat(plan_price) + row_price;
        }else{
            that.find('select.plan_list,input.website').attr('disabled','disabled');
            that.find('.plan_price').text('0.00');
            that.find('input.website').val('');
        }
    });
    total_price  = plan_price.toFixed(2);
    $('select.plan_list').trigger('chosen:updated');
    $('.total_price').text(total_price);

    if(total_price > 0){
        $('#skip-continue').addClass('uk-hidden');
        $('#proceed-checkout').removeClass('uk-hidden');
    }else{
        $('#proceed-checkout').addClass('uk-hidden');
        $('#skip-continue').removeClass('uk-hidden');
    }
}
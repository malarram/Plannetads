//settins scripts

// $('#allowed_formats option').each(function(){
// 	$(this).attr('selected', 'selected');
// });

// jQuery.validator with bootstrap integration
jQuery.validator.setDefaults({
    highlight: function(element) {
        jQuery(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'label label-danger',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$('.config').validate();

$('.plan-add').click(function() {
    title = $(this).data('plan').charAt(0).toUpperCase() + $(this).data('plan').slice(1);
    $("#modalplan input[name='plan_days']").val('');
    $("#modalplan input[name='plan_price']").val('');
    $("#modalplan input[name='plan_days_key']").val('');
    $("#modalplan input[name='plan_name']").val($(this).data('plan'));
    $("#modalplan .modal-title").text(title+' Plan');
});
$('.plan-edit').click(function() {
    title = $(this).data('plan').charAt(0).toUpperCase() + $(this).data('plan').slice(1);
    $('#modalplan').modal('show');
    $("#modalplan input[name='plan_days']").val($(this).data('days'));
    $("#modalplan input[name='plan_days_key']").val($(this).data('days'));
    $("#modalplan input[name='plan_price']").val($(this).data('price'));
    $("#modalplan input[name='plan_name']").val($(this).data('plan'));
    $("#modalplan .modal-title").text(title+' Plan');
});
$('.plan-delete').click(function(e) {
    e.preventDefault();
    $(this).closest('li').slideUp();
    $.ajax({url: $(this).attr('href')});
});
var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

$(function () {
//    $('.search-container select.selectric-select').selectric();
    $('#location-change').on('change', function () {
        _href = $(this).find(':selected').data('href');
        window.location.href = _href;
    });

    $('#lang-change a').on('click', function () {
        lang_id = $(this).data('lang-id');
        setGetParameter('language',lang_id);
    });

    if(userLang){
        $("#lang-change a[data-lang-id='"+userLang+"']").closest();
    }


    $.validator.setDefaults({
        'errorClass': 'uk-text-danger uk-form-help-block',
        'errorElement': 'p',
        highlight: function (element, errorClass, validClass) {
            console.log('highlight');
            $(element).removeClass(errorClass).addClass('uk-form-danger');
        },
        unhighlight: function (element, errorClass, validClass) {
            console.log('un highlight');
            $(element).removeClass('uk-form-danger').addClass(validClass);
        },
    });

    $(".categories-listing .disclaimer-popup").click(function () {
        var modal = UIkit.modal("#uk-disclaimer-modal");
        _linkURL = $(this).attr('href');
        $("#uk-disclaimer-modal").find('#disclaimer-agree-link').attr('href', _linkURL);
        modal.show();
        return false;
    });
});

$(".main-search").vegas({
    delay: 8000,
    timer: false,
    shuffle: true,
    transitionDuration: 2000,
    slides: [
        {src: baseURL + "themes/default/images/cover1.jpg"},
        {src: baseURL + "themes/default/images/cover2.jpg"},
        {src: baseURL + "themes/default/images/cover3.jpg"}

    ]

});


var cities = {
    url: "js/cities.json",
    theme: "square",
    getValue: "name",
    list: {
        match: {
            enabled: true
        }
    }
};

//$("#location-search").easyAutocomplete(cities);

function setGetParameter(paramName, paramValue)
{
    var url = baseURL;
    var hash = location.hash;
    url = url.replace(hash, '');
    if (url.indexOf(paramName + "=") >= 0)
    {
        var prefix = url.substring(0, url.indexOf(paramName));
        var suffix = url.substring(url.indexOf(paramName));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + paramName + "=" + paramValue + suffix;
    }
    else
    {
        if (url.indexOf("?") < 0)
            url += "?" + paramName + "=" + paramValue;
        else
            url += "&" + paramName + "=" + paramValue;
    }

    window.location.href = url + hash;
}
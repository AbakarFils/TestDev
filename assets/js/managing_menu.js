var menu_encours = null;
var id_div_container = 'div_container';

//fix bug menu
$('.waves-effect').click(function (a) {

    $('.waves-effect').each(function (a) {
        $(this).removeClass('active');
        $(this).closest('li').removeClass('active')
    });

    $(this).addClass('active');
    $(this).closest('li').addClass('active');

});


$("body").on("click", ".menu", function () {

    if($(this).attr('id') == undefined)
        return false;

    menu_encours = $(this).attr('id');

    $('.active').each(function (a) {
        $(this).removeClass('active');
        $(this).closest('li').removeClass('active');
        $(this).closest('li').removeClass('subdrop');
    });

    $(this).closest('li').addClass('active');
    $(this).addClass('active');
    $(this).addClass('subdrop');

    var lhref = $(this).attr('link');
    if(lhref == undefined || lhref == ''){
        $('#' + id_div_container).empty();
        return;
    }

    $('#' + id_div_container).empty().load(lhref).fadeIn('slow');

    //pour le mobile, fermer le box si le menu est clicker
    if($('body').hasClass('smallscreen') == true){
        $('.button-menu-mobile').click();
    }

    return false;
});

function callBack_menu(href){
    $('#' + id_div_container).empty().load(href).fadeIn('slow');
    return false;
}
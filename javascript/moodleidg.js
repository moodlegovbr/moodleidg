function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function contraste(evento){
    var contraste = getCookie("contraste");

    if (contraste!="") {
        if(evento=="click") {
            setCookie("contraste", "", 365);
            $('div.layout').removeClass('contraste');
            $('#menu-nav').addClass('navbar-light bg-faded');
            $('#menu-nav').removeClass('navbar-dark bg-dark');
        } else {
            $('div.layout').addClass('contraste');
            $('#menu-nav').addClass('navbar-dark bg-dark');
        }
        /* layout_classes = $.cookie('layout_classes');
        layout_classes = layout_classes.replace('contraste', ''); */
        // $.cookie('layout_classes', layout_classes );

    } else {
        if (evento == "click") {
            setCookie("contraste", "ligado", 365);
            $('div.layout').addClass('contraste');
            $('#menu-nav').removeClass('navbar-light bg-faded');
            $('#menu-nav').addClass('navbar-dark bg-dark');
        } else {
            $('div.layout').removeClass('contraste');
            $('#menu-nav').removeClass('navbar-dark bg-dark');
        }
        // layout_classes = $.cookie('layout_classes');
        // if( layout_classes != 'undefined' )
        //     layout_classes = layout_classes + ' contraste';
        // else
        //    layout_classes = 'contraste';
        // $.cookie('layout_classes', layout_classes );

    }
}

function init(){
    contraste("");
}

$(document).ready(function () {

    init();

    // Custom
    var stickyToggle = function (sticky, stickyWrapper, scrollElement, navdrawer) {
        var stickyHeight = sticky.outerHeight();
        var stickyTop = stickyWrapper.offset().top;
        if (scrollElement.scrollTop() >= stickyTop) {
            stickyWrapper.height(stickyHeight);
            sticky.addClass("is-sticky");
            navdrawer.addClass("nav-drawer-sticky");
        } else {
            sticky.removeClass("is-sticky");
            navdrawer.removeClass("nav-drawer-sticky");
            stickyWrapper.height('auto');
        }
    };

    // Find all data-toggle="sticky-onscroll" elements
    $('[data-toggle="sticky-onscroll"]').each(function () {
        var sticky = $(this);
        var navdrawer = $('.nav-drawer');
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');

        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
            stickyToggle(sticky, stickyWrapper, $(this), navdrawer);
        });

        // On page load
        stickyToggle(sticky, stickyWrapper, $(window), navdrawer);

    });

    // Alto contrast
    $('a.toggle-contraste').click(function () {
        contraste("click")
    });
    //fim acao botao de alto contraste

    //Facebook Plugin.
    $(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    //Fim Facebook Plugin.
});
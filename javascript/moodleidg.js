$(document).ready(function () {
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
        if (!$('#layout').hasClass('contraste')) {
            $('div.layout').addClass('contraste');
            // layout_classes = $.cookie('layout_classes');
            // if( layout_classes != 'undefined' )
            //     layout_classes = layout_classes + ' contraste';
            // else
            //    layout_classes = 'contraste';
            // $.cookie('layout_classes', layout_classes );
        } else {
            $('#layout').removeClass('contraste');
            layout_classes = $.cookie('layout_classes');
            layout_classes = layout_classes.replace('contraste', '');
            // $.cookie('layout_classes', layout_classes );
        }
    });

    //fim acao botao de alto contraste



});
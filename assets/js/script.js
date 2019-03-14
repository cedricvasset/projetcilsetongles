
$(function () {
    $('#onglePresta').hide();
    $('#cilPresta').hide();
    $('#presta').hover(function () {
        $('#onglePresta').show();
        $('#cilPresta').show();
    });
});
$(function () {
    $('#presentation').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });
});
$(function () {
    $('#galery').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });
});
$(function () {
    $('#goldBook').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });
});
$(function () {
    $('#accueil').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });
});
$(function () {
    $('#meeting').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });

$(function () {
    $('#registrationChoice').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });
    $(function () {
    $('#inscriptionLink').hover(function () {
        $('#onglePresta').hide();
        $('#cilPresta').hide();
    });
});
});
    $(document).ready(function () {
        $(window).on('load', function () {

            var elmt = $('.load-from-left, .load-from-right');
            var topImg = $('.load-from-left, .load-from-right').offset().top;
            var scroll = $(window).scrollTop();

            $(elmt).each(function () {

                var topImg = $(this).offset().top - 300;

                if (topImg < scroll) {

                    $(this).css("transform", "translate(0,0)");
                    $(this).css("opacity", "1");

                }
                ;
            });
        });
    });
     $(document).ready(function () {
        $(window).on('scroll', function () {

            var elmt = $('.from-left, .from-right');
            var topImg = $('.from-left, .from-right').offset().top;
            var scroll = $(window).scrollTop();

            $(elmt).each(function () {

                var topImg = $(this).offset().top - 300;

                if (topImg < scroll) {

                    $(this).css("transform", "translate(0,0)");
                    $(this).css("opacity", "1");

                }
                ;
            });
        });
    });
});
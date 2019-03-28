$('#search').keyup(function () {
    $.post('../../controllers/listClientCtrl.php', {
        searchAjax: $('#search').val()
    }, function (data) {
        var results = $.parseJSON(data);
        $('#searchResult').empty();
        $.each(results, function (key, clients) {
            console.log(clients);
            var display = '<tr class="table-secondary">'
                    + '<td>' + clients.lastname + '</td>'
                    + '<td>' + clients.firstname + '</td>'
                    + '<td>' + clients.birthdate + '</td>'
                    + '<td>' + clients.age + '</td>'
                    + '<td>' + clients.phone + '</td>'
                    + '<td><a class="btn btn-success btn-lg" href="clientInformationAndUpdateView.php?id='+ clients.id + '" >INFORMATIONS / MODIFICATIONS</a></td>'
                    + '<td><a class="btn btn-info btn-lg" href="newAppointmentView.php?id='+ clients.id + '" >AJOUT RENDEZ-VOUS</a></td>'
                    + '<td><a class="btn btn-danger btn-lg" href="eraseUserByAdmin.php?id='+ clients.id + '" >SUPPRIMER</a></td>'
                    + '</tr>';
            $('#searchResult').append(display);
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

$(function () {
    $('.prestationTypes').hide();
    $('#presta').hover(function () {
        $('.prestationTypes').show();
    });
});
$(function () {
    $('#presentation').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#galery').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#goldBook').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#accueil').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#meeting').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#registrationChoice').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#inscriptionLink').hover(function () {
        $('.prestationTypes').hide();
    });
});
$(function () {
    $('#navbar').hover(function () {
        $('.prestationTypes').hide();
    });
});
       
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
                    + '<td>' + clients.mail + '</td>'
                    + '<td><a class="btn btn-success btn-lg" href="clientInformationAndUpdateView.php?id=<?= $info->id ?>" >INFORMATIONS / MODIFICATIONS</a></td>'
                    + '<td><a class="btn btn-info btn-lg" href="newAppointmentView.php?id=<?= $info->id ?>" >AJOUT RENDEZ-VOUS</a></td>'
                    + '<td><a class="btn btn-danger btn-lg" href="eraseUserByAdmin.php?id=<?= $info->id ?>" >SUPPRIMER</a></td>'
                    + '</tr>';
            $('#searchResult').append(display);
        });
    });
});

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
$(function () {
    $('#navbar').hover(function () {
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
$(document).ready(function () {
    $.ajax({
        url: '../../controller/gestionService.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisissez un service !</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            $('#service_op').html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $('#date').change(function(){
        var secretaire = $('#doctor_op').val();
        //console.log(secretaire);
        $.ajax({
            url: '../../controller/gestionSecretaire.php',
            data: {op: '', secretaire:secretaire},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                
                for (var i = 0; i < data.length; i++) {
                    var time = data[i].time;
                    //console.log(time);
                    remplir(time);
                }
                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
        var date = $('#date').val();
        //console.log(date);
        function remplir(time){
            $.ajax({
            url: '../../controller/gestionTime.php',
            data: {op: 'date', secretaire:time, date:date},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var option = '<option selected>Choisissez le temps de votre rendez vous !</option>';
                for (var i = 0; i < data.length; i++) {
                    option += '<option value="' + data[i].id + '">' + data[i].temps + '</option>';
                }
                $('#time').html(option);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        }
        
    });
    $('#service_op').change(function(){
        var service = $('#service_op').val();
        $.ajax({
        url: '../../controller/gestionSpecialite.php',
        data: {op: 'by', service:service},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisissez une specialite !</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            $('#specialite_op').html(option);
            /*console.log(textStatus);
            console.log(jqXHR);
            console.log(data);*/
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    });
    $('#specialite_op').change(function(){
        var specialite = $('#specialite_op').val();
        $.ajax({
        url: '../../controller/gestionSecretaire.php',
        data: {op: 'ar', specialite:specialite},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisissez un secretaire !</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].nom + '</option>';
            }
            //document.getElementById('doctor_op').name.innerHTML = data[i].id;
            $('#doctor_op').html(option);
            /*console.log(textStatus);
            console.log(jqXHR);
            console.log(data);*/
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    });
    $('#rdv').click(function () {
        var patient = $("#patient");
        var date = $("#date");
        var time = $("#time");
        var secretaire = $("#doctor_op");
        var service = $("#service_op");
        var specialite = $("#specialite_op");
        var email = $("#email");
        $.ajax({
            url: '../../controller/gestionTime.php',
            data: {op: 'by', id:time.val()},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                    var time = data[0].temps;
                    console.log(textStatus);
                    console.log(data);
                    console.log(jqXHR);
                    console.log(time);
                    add(time);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
        $.ajax({
            url: '../../controller/gestionTime.php',
            data: {op: 'set', verify:time.val()+''+date.val()},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                    console.log(textStatus);
                    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
        function add(time){
            var id = $('#id').val();
            var datef = $('#datef').val();
            var timef = $('#timef').val();
        $.ajax({
            url: '../../controller/gestionRendezVous.php',
            data: {op: 'update', id: id, date: date.val(), time: time, datef: datef, timef: timef},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
                date.val('');
                $('#time').val('');
                service.val('choix de departement');
                secretaire.val('specialite first');
                specialite.val('departement first');
                /*$('#ind').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Prise de rendez-vous a été effectuer avec succès réussit!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');*/
                $('#ind').html('<div class="alert alert-success alert-dismissible fade show" role="alert">La modification de votre rendez-vous à été effectuer avec success !<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                console.log("ysf");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
    }

    });
    
        //var ser = $('#tt').val();
        //console.log(ser);
        $.ajax({
            url: '../../controller/gestionService.php',
            data: {op: ''},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
            var oo ='';
            for (var i = 0; i < data.length; i++) {
                oo+='<div id="ysf" class="col-lg-4 col-md-6 d-flex align-items-stretch"><div class="icon-box"><div class="icon"><i class="fas fa-heartbeat"></i></div><h4><a href="specialite.php?service='+data[i].id+'">'+data[i].libelle+'</a></h4><p>Voila une des specialités disponibles, Clicker pour choisir</p></div></div>';
                console.log(data[i].libelle);
            }
            $('#msati').html(oo);
            console.log("ysf");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
   
    
});
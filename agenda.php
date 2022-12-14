<?php

session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:index.html');
}

$logado = $_SESSION['login'];

include("functions.php");

$where= "email = " . "'" . $_SESSION['login'] . "';";

$dados_usuario = selectDB($dbName, $table, $campos = '*', $where);

$username = $dados_usuario[0]["username"];
$email = $dados_usuario[0]["email"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PetWash - Calendário</title>

    <!-- Import Bootstrap e Fullcalendar-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css">

    <!-- Ícone de import css -->
    <link rel="stylesheet" href="src/styles/main.css">
    <link rel="shortcut icon" type="image/png" href="src/img/logov2.png">
</head>

<body>

    <!-- Import Script Boostrap e Fullcalendar-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.jss"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales/pt-br.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.all.min.js"></script>

    <!-- Header com logo -->
    <div class="container-flex">
        <header class="d-flex px-1 py-3 mb-5 border-bottom justify-content-between align-items-center">
            <a href="agenda.php">
                <input type="image" src="src/img/logo_com_texto2.png" class="header-logo px-5 py-2" alt="PetWash Logo">
            </a>

            <a href="home.php">
                <input type="image" src="src/img/person-circle.svg" class="header-pficon px-5 py-2" alt="Profile Icon">
            </a>

        </header>
    </div>

    <div class="container my-3">
        <div id="calendar"></div>
    </div>

    <!-- Script calendario teste -->
    <script>
        var el = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(el, {
            plugins: ['interaction', 'dayGrid', 'bootstrap', 'timeGrid'],
            themeSystem: 'bootstrap',
            weekNumbers: true,
            eventLimit: true,
            allDaySlot: false,

            editable: true,
            selectable: true,
            eventClick: function(info){
                info.jsEvent.preventDefault();

                if(info.event.url){
                    window.open(info.event.url);
                } else {
                    Swal.fire(info.event.title, 'Começo: ' + info.event.start + ' - Fim: ' + info.event.end, 'question');
                }
            },

            events: [
                {
                    title: 'Teste',
                    start: '2022-11-12 12:00',
                    end: '2022-11-12 18:00'
                },
                {
                    title: 'Teste 2',
                    start: '2022-11-14 14:00',
                    end: '2022-11-14 16:00'
                },
                {
                    title: 'Teste 3',
                    start: '2022-11-14 16:30',
                    end: '2022-11-14 20:30'
                },
            ],
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            timeZone: 'local',
            locales: ['pt-brLocale'],
            locale: 'pt-br',
            views: {
                dayGridMonth: {
                    weekNumbers: false
                }
            }
        })
        calendar.render();
    </script>

</body>

</html>
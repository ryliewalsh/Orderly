
<head>

    <?php
    require_once "DAO.php";
    $dao = new DAO();
    $chores = $dao->getTodaysChores();
    $bills = $dao->getTodaysBills();


    ?>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2024-03-07',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: <?php echo json_encode($bills); ?> // Replace with dynamic PHP data
            });

            calendar.render();
        });
    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>

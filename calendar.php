
<head>

    <?php
    require_once "DAO.php";
    $dao = new DAO();
    $chores = $dao->getChores();
    $bills = $dao->getBills();
    $userEvents = $dao->getEvents();
    $events = array();

    foreach ($chores as $chore) {
        $events[] = array(
            'title' => 'Chore: ' . $chore['description'],
            'start' => $chore['due_date'],
            'url' => 'do.php'
        );
    }
    foreach ($bills as $bill) {
        $events[] = array(
            'title' => 'Bill: ' . $bill['description'],
            'start' => $bill['due_date'],
            'url' => 'pay.php'
        );
    }
    foreach ($userEvents as $event) {
        $events[] = array(
            'title' => 'Event: ' . $event['description'],
            'start' => $event['due_date'],
            'url' => 'plan.php'
        );
    }
    $allEvents = json_encode($events);

    ?>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2024-04-22',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: <?php echo $allEvents; ?>
            });

            calendar.render();
        });
    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>

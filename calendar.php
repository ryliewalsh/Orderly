<head>

    <?php
    require_once "DAO.php";
    $dao = new DAO();

    // Get today's chores and bills
    $chores = $dao->getTodaysChores();
    $bills = $dao->getTodaysBills();

    // Convert chore and bill data into FullCalendar event format
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

    // Encode all events as JSON
    $allEventsJson = json_encode($events);

    // Get the current date
    $date = getdate();
    ?>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '<?php echo $date['year'] . '-' . $date['mon'] . '-' . $date['mday']; ?>', // Set initial date to today
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: <?php echo $allEventsJson; ?> // Pass all events to FullCalendar
            });

            calendar.render();
        });
    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>

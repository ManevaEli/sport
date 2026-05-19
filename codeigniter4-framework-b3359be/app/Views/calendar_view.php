<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Emploi du Temps</title>
    <!-- On importe le CDN CSS de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet" />
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        #calendar { max-width: 1100px; margin: 0 auto; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Gestion de l'Emploi du Temps</h2>
    
    <!-- Conteneur où le calendrier va s'afficher -->
    <div id="calendar"></div>

    <!-- On importe le script de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // Vue par défaut en colonne (Semaine) idéale pour un emploi du temps
                locale: 'fr', // Traduction en français
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay' // Choix du format (Mois, Semaine, Jour)
                },
                slotMinTime: '08:00:00', // Heure de début de la journée (ex: 8h)
                slotMaxTime: '18:00:00', // Heure de fin (ex: 18h)
                
                // Route CodeIgniter pour charger les données dynamiquement
                events: '<?= base_url("calendar/loadEvents") ?>', 
                
                // Optionnel : Action au clic sur un événement de l'emploi du temps
                eventClick: function(info) {
                    alert('Événement : ' + info.event.title);
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
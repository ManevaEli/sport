<?= $this->extend('layouts/client_layout') ?> 

<?= $this->section('content') ?>

<style>

    .main-content {
        padding: 2rem;
        width: 100%;
    }
    .calendar-container {
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .legend {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }
    .legend-item { display: flex; align-items: center; gap: 0.5rem; }
    .dot { width: 12px; height: 12px; border-radius: 50%; }
    
    .fc { max-width: 100%; margin: 0 auto; }
    .fc-event { cursor: pointer; }
</style>

<div class="main-content">
    <h2>Planning & Réservations</h2>
    
    <div class="legend">
        <div class="legend-item"><span class="dot" style="background: #3788d8;"></span> Créneau Disponible (Cliquez pour réserver)</div>
        <div class="legend-item"><span class="dot" style="background: #28a745;"></span> Ma Réservation (Confirmée)</div>
        <div class="legend-item"><span class="dot" style="background: #6c757d;"></span> Complet</div>
    </div>

    <div class="calendar-container">
        <div id="calendar"></div>
    </div>
</div>

<!-- Inclusion locale de FullCalendar -->
<script src="<?= base_url('js/index.global.min.js.js') ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek', 
            locale: 'fr',               
            firstDay: 1,                
            slotMinTime: '06:00:00',    
            slotMaxTime: '22:00:00',   
            allDaySlot: false,         
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: "Aujourd'hui",
                week: "Semaine",
                day: "Jour"
            },
            events: '<?= base_url("/calendar/loadEvents") ?>',
            
            eventClick: function(info) {
                if (info.event.url) {
                    info.jsEvent.preventDefault(); 
                    if (info.event.extendedProps.type === 'dispo') {
                        if (confirm("Voulez-vous réserver le créneau : " + info.event.title + " ?")) {
                            window.location.href = info.event.url;
                        }
                    } else {
                        window.location.href = info.event.url;
                    }
                }
            }
        });
        
        calendar.render();
    });
</script>

<?= $this->endSection() ?> 
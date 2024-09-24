<style>
    #calendar {
        /* max-width: 600px; */
        margin: 0 auto;
    }

    .fc .fc-col-header-cell-cushion {
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        font-weight: normal;
        text-transform: uppercase;
    }

    .fc-toolbar-title {
        color: Balck;
    }

    .fc-scrollgrid-section-header {
        background-color: rgb(17, 82, 114, 1);
    }

    /* .fc-scrollgrid-section-body{
            background-color: pink;
        } */

    .fc-event-main {
        text-align: center;
    }
</style>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-main fw-semibold">
                        <i class="fas fa-calendar-week"></i> Calendar <small class="fw-normal fs-3"> (You schedule for next checkup) </small>
                    </h5>
                    <hr>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Message Modal -->
<div class="modal fade" id="confirm_sched" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content rounded-2">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">
                    <i class="fas fa-plus-circle"></i> Confirm Schedule
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <!-- <p id="selectedDateDisplay"></p> -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Date</label>
                        <input type="text" class="form-control shadow-none" name="sdate" id="sdate" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Time</label>
                        <input type="time" class="form-control shadow-none" name="stime" id="stime">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Event</label>
                        <input type="text" class="form-control shadow-none" name="event" id="event">
                    </div>
                </div>

                <div id="loadinggif" class="modal1">
                    <div class="modal-content1">
                        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abort</button> -->
                <button type="button" onclick="savesched()" class="btn btn-secondary">Save <i class="ti ti-save"></i> </button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var selectedDateInput = document.getElementById('selected_date');

        var eventDates = [
            <?php foreach ($schedule as $sched) : ?> '<?php print $sched->followUp_checkUp; ?>', <?php endforeach; ?>
        ];

        // Set the initial date to the first event date
        var initialDate = eventDates.length > 0 ? new Date(eventDates[0]) : new Date();

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: initialDate,
            defaultView: 'dayGridMonth',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true,
            events: [
                <?php foreach ($schedule as $sched) : ?> {
                        title: 'Next Checkup',
                        start: '<?php print $sched->followUp_checkUp; ?>',
                        backgroundColor: '#13DEB9',
                        borderColor: '#13DEB9',
                    },
                <?php endforeach; ?>
            ],

            eventRender: function(info) {
                var today = new Date();
                if (
                    info.event.start.getDate() === today.getDate() &&
                    info.event.start.getMonth() === today.getMonth() &&
                    info.event.start.getFullYear() === today.getFullYear()
                ) {
                    info.el.style.backgroundColor = 'rgb(17, 82, 114, 0.1)';

                }
            },

            selectAllow: function(info) {
                var selectedStartDate = info.start;
                var selectedEndDate = info.end;

                // Check if the selected range has an event date
                var isEventDate = eventDates.some(function(eventDate) {
                    var date = new Date(eventDate);
                    return selectedStartDate <= date && selectedEndDate >= date;
                });

                return isEventDate;
            },

            select: function(info) {
                var formattedDate = info.start.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });

                selectedDateInput.value = formattedDate;
            }
        });

        calendar.render();
    });
</script>
<style>
    #calendar {
        max-width: 600px;
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
                <div class="col-md-6">
                    <h5 class="text-main fw-semibold">
                        <i class="fas fa-calendar-week"></i> Calendar Scheduler
                    </h5>
                    <hr>
                    <div id='calendar'></div>
                </div>

                <div class="col-md-6">
                    <h5 class="text-main fw-semibold">
                        <i class="fas fa-calendar-week"></i> Event List
                    </h5>
                    <hr>
                    <div id='calendar2'></div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Create Message Modal -->
<div class="modal fade" id="schedule" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content rounded-2">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">
                    <i class="fas fa-plus-circle"></i> Create Schedule
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
                        <label for="" class="fw-bold">Start</label>
                        <input type="time" class="form-control shadow-none" name="stime" id="stime">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">End</label>
                        <input type="time" class="form-control shadow-none" name="end_stime" id="end_stime">
                    </div>

                    <!-- <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Time</label>
                        <select name="time" id="time" class="form-select shadow-none">
                            <option value="">00:00 AM - 00:00 PM</option>
                            <?php foreach ($gettime as $time) { ?>
                                <option value="<?= $time->id ?>"><?= $time->time ?></option>
                            <?php } ?>
                        </select>
                    </div> -->

                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Event Category</label>
                        <select name="event_cat" id="event_cat" class="form-select shadow-none">
                            <option value="">Select event category</option>
                            <?php foreach ($getschedcat as $sched) { ?>
                                <option value="<?= $sched->id ?>"><?= $sched->name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Event</label>
                        <input type="text" class="form-control shadow-none" name="event" id="event">
                    </div>
                </div>

                <div id="loadinggif" class="modal1">
                    <div class="modal-content1">
                        <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abort</button> -->
                <button type="button" onclick="savesched()" class="btn btn-success">Save <i class="fas fa-save"></i> </button>
            </div>
        </div>
    </div>
</div>

<script>
    function savesched() {
        var date = $('#sdate').val();
        var time = $('#stime').val();
        var end_stime = $('#end_stime').val();
        var event = $('#event').val();
        var event_cat = $('#event_cat').val();

        // alert(event_cat);

        $.ajax({
            url: '../chw/savesched',
            method: 'POST',
            data: {
                'date': date,
                'time': time,
                'end_stime': end_stime,
                'event': event,
                'event_cat': event_cat
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[type="button"]').prop('disabled', true);
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        $('#reply').val('');
                        $('button[type="button"]').prop('disabled', false);
                        $('#schedule').modal('hide');
                        location.reload();

                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Schedule saved successfully"
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });
    }
</script>

<script>
    var schedules = [
        <?php foreach ($schedules as $schedule) : ?>
            <?php if ($schedule->schedule_type_id == 1) { ?> {
                    date: '<?php echo $schedule->date; ?>',
                },
            <?php } ?>
        <?php endforeach; ?>
    ];

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var selectedDateDisplay = document.getElementById('selectedDateDisplay');
        var sdateInput = document.getElementById('sdate'); // Add this line

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: new Date(),
            defaultView: 'dayGridMonth',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true,
            events: [
                <?php foreach ($schedules as $schedule) : ?>
                    <?php if ($schedule->schedule_type_id == 3) { ?> {
                            title: '<?php print $schedule->name; ?>',
                            start: '<?php print $schedule->date; ?>',
                            backgroundColor: 'red',
                            borderColor: 'red',
                        },
                    <?php } elseif ($schedule->schedule_type_id == 2) { ?> {
                            title: '<?php print $schedule->name; ?>',
                            start: '<?php print $schedule->date; ?>',
                            backgroundColor: '#49BEFF',
                            borderColor: '#49BEFF',
                        },
                    <?php } ?>
                <?php endforeach; ?>
            ],

            select: function(info) {
                var formattedDate = info.start.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });

                // Display selected date in the modal
                // selectedDateDisplay.innerText = 'Selected Date: ' + formattedDate;

                // Set the value of the input field
                sdateInput.value = formattedDate;

                // Trigger the modal
                $('#schedule').modal('show');
            },
            dayCellDidMount: function(arg) {
                var date = arg.date;
                var currentDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2)
                for (var i = 0; i < schedules.length; i++) {
                    if (schedules[i].date === currentDate) {
                        var cellEl = arg.el;
                        cellEl.style.backgroundColor = '#13DEB9';
                    }
                }
            }
        });

        calendar.render();

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendar2El = document.getElementById('calendar2');

        var calendar2 = new FullCalendar.Calendar(calendar2El, {
            timeZone: 'UTC',
            initialView: 'listMonth',

            views: {
                listDay: {
                    buttonText: 'Today'
                },
                listWeek: {
                    buttonText: 'This Week'
                },
                listMonth: {
                    buttonText: 'This Month'
                }
            },

            headerToolbar: {
                left: 'title',
                center: '',
                right: 'listDay,listWeek,listMonth'
            },

            // Include events from the first calendar
            events: [
                <?php foreach ($schedules as $schedule) : ?>
                    <?php if ($schedule->schedule_type_id == 1) { ?> {
                            title: '<?php print $schedule->name; ?> - <?php print $schedule->event; ?>',
                            start: '<?php print $schedule->date; ?>',
                            backgroundColor: '#13DEB9',
                            borderColor: '#13DEB9',
                        },
                    <?php } elseif ($schedule->schedule_type_id == 3) { ?> {
                            title: '<?php print $schedule->name; ?> - <?php print $schedule->event; ?>',
                            start: '<?php print $schedule->date; ?>',
                            backgroundColor: 'red',
                            borderColor: 'red',
                        },
                    <?php } elseif ($schedule->schedule_type_id == 2) { ?> {
                            title: '<?php print $schedule->name; ?> - <?php print $schedule->event; ?>',
                            start: '<?php print $schedule->date; ?>',
                            backgroundColor: '#49BEFF',
                            borderColor: '#49BEFF',
                        },
                    <?php } ?>
                <?php endforeach; ?>
            ]
        });

        calendar2.render();
    });
</script>
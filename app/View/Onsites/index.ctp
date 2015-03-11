<script>
    var path='<?PHP echo Router::url('/Onsites',true); ?>';
</script>            
            
            <h1>
                                <i class="fa fa-calendar"></i>On Site Schedule
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('On Site Schedule',array('controller'=>'Onsites','action'=>'index')); ?></li>
                    </ul>
                    <!-- END Calendar Header -->

                    <!-- FullCalendar Content -->
                    <div class="block block-alt-noborder full">
                        <div class="block-title">
                            <h2 style="float:right;">
                                <?php if($user_role['job_onsite']['add'] == 1){  echo $this->Html->link('Add Onsite Schedule',array('controller'=>'Onsites','action'=>'add'),array('class'=>'btn btn-xs btn-success','data-toggle'=>'tooltip','tile'=>'Add Onsite Schedule')); } ?>
                            </h2>
                        </div>
                        <div class="row">
<!--                            <div class="col-md-2">
                                <div class="block-section">
                                     Add event functionality (initialized in js/pages/compCalendar.js) 
                                    <form>
                                        <div class="input-group">
                                            <input type="text" id="add-event" name="add-event" class="form-control" placeholder="Add Event">
                                            <div class="input-group-btn">
                                                <button type="submit" id="add-event-btn" class="btn btn-primary"><i class="gi gi-plus"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="block-section">
                                    <div class="block-section text-center text-muted">
                                        <small><em><i class="fa fa-arrows"></i> Drag and Drop Events on the Calendar</em></small>
                                    </div>
                                    <ul class="calendar-events">
                                        <li style="background-color: #1abc9c">Work</li>
                                        <li style="background-color: #9b59b6">Vacation</li>
                                        <li style="background-color: #3498db">Cinema</li>
                                        <li style="background-color: #e74c3c">Gym</li>
                                        <li style="background-color: #f39c12">Shopping</li>
                                    </ul>
                                </div>
                            </div>-->
                            <div class="col-md-12">
                                <!-- FullCalendar (initialized in js/pages/compCalendar.js), for more info and examples you can check out http://arshaw.com/fullcalendar/ -->
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END FullCalendar Block -->
                    <!-- END FullCalendar Content -->
                </div>
                <!-- END Page Content -->

           
<script>
    $(function(){ 
        CompCalendar.init();  });
                
    var CompCalendar = function() {
    var calendarEvents  = $('.calendar-events');

    /* Function for initializing drag and drop event functionality */
    var initEvents = function() {
        calendarEvents.find('li').each(function() {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            var eventObject = { title: $.trim($(this).text()), color: $(this).css('background-color') };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({ zIndex: 999, revert: true, revertDuration: 0 });
        });
    };

    return {
        init: function() {
            /* Initialize drag and drop event functionality */
            initEvents();

            /* Add new event in the events list */
            var eventInput      = $('#add-event');
            var eventInputVal   = '';

            // When the add button is clicked
//            $('#add-event-btn').on('click', function(){
//                // Get input value
//                eventInputVal = eventInput.prop('value');
//
//                // Check if the user entered something
//                if ( eventInputVal ) {
//                    // Add it to the events list
//                    calendarEvents.append('<li class="animation-slideDown">' + $('<div />').text(eventInputVal).html() + '</li>');
//
//                    // Clear input field
//                    eventInput.prop('value', '');
//
//                    // Init Events
//                    initEvents();
//                }
//
//                // Don't let the form submit
//                return false;
//            });

            /* Initialize FullCalendar */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                firstDay: 1,
                editable: false,
                droppable: false,
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // remove the element from the "Draggable Events" list
                    $(this).remove();
                },
                events: path+'/calendar/'
//                 [
//                    {
//                        title: 'Live Conference',
//                        start: new Date(y, m, 3)
//                    },
//                    {
//                        title: 'Top Secret Project',
//                        start: new Date(y, m, 4),
//                        end: new Date(y, m, 8),
//                        color: '#1abc9c'
//                    },
//                    {
//                        title: 'Job Meeting',
//                        start: new Date(y, m, d, 16, 00),
//                        allDay: false,
//                        color: '#f39c12'
//                    },
//                    {
//                        title: 'Awesome Job',
//                        start: new Date(y, m, d, 9, 0),
//                        end: new Date(y, m, d, 12, 0),
//                        allDay: false,
//                        color: '#d35400'
//                    },
//                    {
//                        title: 'Invoice',
//                        start: '2015-02-09',
//                        end: '2015-02-10',
//                        allDay: false
//                    }
//                ]
            });
        }
    };
}();
                
                
              </script>
       <?php //echo $this->Html->script('pages/compCalendar'); ?>
<!--     <script>$(function(){ CompCalendar.init(); });</script>-->
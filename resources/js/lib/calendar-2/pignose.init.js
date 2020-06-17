$(function() {
    "use strict";
    $('.year-calendar').pignoseCalendar({
        theme: 'blue',  // light, dark, blue
        select: function(date, context) {
            var $this = $(this);
    
            var $element = context.element;
            var $calendar = context.calendar;
            var text = ( date[0] === null ? 'null' : date[0].format('YYYY-MM-DD') );
           
            $(".tooltip-date").removeClass('show');
            if(date[0] !== null){
                var x = $(".pignose-calendar-unit-active").position();
                var tooltip_position_top = (x.top - 135) + 'px';
                var tooltip_position_left = (x.left - 107) + 'px';
                $(".tooltip-date").css({ 'top' : tooltip_position_top, 'left' : tooltip_position_left })
                
                $.ajax({
                    url: base_url +'statisticOfDay/' + text,
                    type: 'GET',
                    success: function(res) {
                        $(".tooltip-date").addClass('show');
                        $("#tooltip-day").html(res.now)

                        if(!res.isEmpty){
                            $("#tooltip-car").html("Ô tô: " + res.data.car)
                            $("#tooltip-motobike").html("Xe máy: "  + res.data.motobike)
                            $("#tooltip-bike").html("Xe đạp: " + res.data.bike)
                            $("#tooltip-revenue").html("Doanh thu: " + (res.revenue != null ? convertNumberToCurrency(res.revenue) : 0))
                        }else{
                            $("#tooltip-car").html(res.message)
                            $("#tooltip-motobike").html('')
                            $("#tooltip-bike").html('')
                            $("#tooltip-revenue").html('')
                        }
                    }
                });
            }
        },
        
        next: function(info, context) {
            /**
         * @params context PignoseCalendarPageInfo
         * @params context PignoseCalendarContext
         * @returns void
         */

         // This is clicked arrow button element.
         var $this = $(this);

         // `info` parameter gives useful information of current date.
         var type = info.type; // it will be `prev`.
         var year = info.year; // current year (number type), ex: 2017
         var month = info.month; // current month (number type), ex: 6
         var day = info.day; // current day (number type), ex: 22

         // You can get target element in `context` variable.
         var $element = context.element;

         // You can also get calendar element, It is calendar view DOM.
         var $calendar = context.calendar;
        }
    });

    

    $('input.calendar').pignoseCalendar({
        format: 'YYYY-MM-DD' // date format string. (2017-02-02)
    });
});


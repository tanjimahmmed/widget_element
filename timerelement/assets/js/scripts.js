;(function($) {
    $(window).on("elementor/frontend/init", function(){
        elementorFrontend.hooks.addAction("frontend/element_ready/timerWidget.default",function(scope, $){
            var clockElement = $(scope).find(".clock");
            var displayType = clockElement.data('display-type');
            var clockFormat = clockElement.data('clock-format');
            if( 'clock' == displayType){
                clockFace = '12' == clockFormat ? 'TwelveHourClock' : 'TwentyFourHourClock';
                clockElement.FlipClock({
                    clockFace: clockFace
                });
            }else if('timerc'==displayType){
                var now = new Date();
                var targetTime = clockElement.data('target_time');
                var targetDateObject = new Date(targetTime);
                var difference = (targetDateObject.getTime() - now.getTime())/1000;
                clockFace = 'HourlyCounter';
                if(difference>24*60*60){
                    clockFace = 'DailyCounter';
                }
                var clock = clockElement.FlipClock({
                    clockFace: clockFace,
                });
                clock.setTime(difference);
                clock.setCountdown(true);
            }else if('genericc' == displayType){
                var now = new Date();

                var clockFace = 'Counter';
                var countDownValue = clockElement.data('countdown');
                var decrement = clockElement.data('decrement');
                var clock = clockElement.FlipClock(countDownValue, {
                    countdown: true,
                    clockFace: clockFace,
                });
                setInterval(function() {
                    clock.decrement();
                }, decrement);
            }
        });
    });
})(jQuery);
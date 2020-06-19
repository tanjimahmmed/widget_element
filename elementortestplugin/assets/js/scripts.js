;(function($){
    $(window).on("elementor/frontend/init", function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/ProgressbarWidget.default',function(){
            $(".progress").each(function(){
                var progressdone = $(this).data('progress-done');
                if(!progressdone){
                    $(this).data('progress-done', 1);

                    var element = $(this)[0];
                    var bar_color = $(this).data("bar_color");
                    var bar_fill = $(this).data("bar_fill");
                    var bar_height = $(this).data("bar_height");
                    if(element){
                    var bar = new ProgressBar.Line(element, {
                        strokeWidth: 4,
                        easing: 'easeInOut',
                        duration: 1400,
                        color: bar_color,
                        trailColor: '#eee',
                        trailWidth: 1,
                        svgStyle: {width: '95%', height: bar_height},
                        text: {
                            style: {
                                color: '#999',
                                position: 'absolute',
                                right: '0',
                                top: '0px',
                                padding: 0,
                                margin: 0,
                                transform: null
                            },
                            autoStyleContainer: false
                        },
                        step: (state, bar) => {
                            bar.setText(Math.round(bar.value() * 100) + '%');
                        }
                      });
                      
                      bar.animate(bar_fill);  // Number from 0.0 to 1.0  
                }
            }
            });
            
        });
    });
    $(document).ready(function(){
       
        
        
    });
})(jQuery);

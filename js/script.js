;(function($) {
    "use strict";
  
    jQuery(function($){
        var FEED = window.FEED||{};

        FEED.TWEET= function(){
            $('.tweets_feed').twittie({
                dateFormat: '%d %b, %Y',
                count: 2,
                template: 
                    '<div class="media twitter_item">'
                        +'<div class="media-left"><a href="{{url}}"><i class="fa fa-twitter"></i></a></div>'
                        +'<div class="media-body">'+'{{tweet}}, {{date}}'+'</div>'
                    +'</div>'
            },
            function(){
                
            })
        }

        $(document).ready(function(){FEED.TWEET();})
    })
    
    
})(jQuery)
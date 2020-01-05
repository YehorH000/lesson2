define(
    ['jquery'],
    function ($) {
        return function () {
            var tag =$('<p></p>').html('Some message');
            $('#js-demo').append(tag);
        }
    }
)
/* 
 * Ucard
 * @author RainaStudio
 * @version 1.0.1
 * @package ucard
*/

(function( $ ) {
    // Templates Demo 1
    $('.post-col .entry').hover(function() {
        $(this).find('.description').stop().animate({
            height: "toggle",
            opacity: "toggle"
        }, 300);
    });
    $('.like-button').click(function(event){
        event.preventDefault();
        $(this).toggleClass('is-active');
    })
})( jQuery );
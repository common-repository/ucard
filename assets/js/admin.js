/* 
 * Ucard
 * @author RainaStudio
 * @version 1.0.1
 * @package ucard
*/
(function( $ ) {
    function checkNall(){
        $(document).on('change', '.ant-checkbox-group input.checkbox', function() { 
            var el = $('.checkbox-all-wrapper .checkbox'),
                elrel = $('.ant-checkbox-group .checkbox:checked');     
            if( elrel.length >= 1 && elrel.length < 2 ) {
                el.parent().addClass('ant-checkbox-indeterminate');
                el.parent().removeClass('ant-checkbox-checked');
                el.prop("checked", false);
            } else if( elrel.length >= 2 && elrel.length != 0 ){
                el.parent().removeClass('ant-checkbox-indeterminate');
                el.parent().addClass('ant-checkbox-checked');                
                el.prop("checked", true);
            } else {
                el.parent().removeClass('ant-checkbox-checked');
                el.parent().removeClass('ant-checkbox-indeterminate');
            }
        });
        $(".checkbox-all-wrapper .checkbox").click(function(){
            $(".ant-checkbox-group .checkbox").prop('checked', $(this).prop('checked'));
        });
    
    }
    if( $('body').has('.ucard') ){
        checkNall();
    }
    if( $('.ant-checkbox-group .checkbox:checked').length >= 1 && $('.ant-checkbox-group .checkbox:checked').length < 2 ){
        $('.checkbox-all-wrapper .checkbox').parent().addClass('ant-checkbox-indeterminate');
    }
    $('#enable_excerpt_l').on('input', function() {
        text = $('#enable_excerpt_l').val();
        $('#sliderval').html(text);
    });
    $(".ucard #s_ucard").click(function(event){
        event.preventDefault();
        $('.ucard #submit').click();
    });
})( jQuery );


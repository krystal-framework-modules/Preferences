$(function(){
    $radios = $('input[type="radio"]');
    $radios.on('change', function() {
        $radios.not(this).prop('checked', false);
    });
});

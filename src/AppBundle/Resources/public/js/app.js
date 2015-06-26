var UNRTECH_APP = function (){

    return {
        init: function(){
            drawForm();
        }
    };

    function drawForm(){
        //var columnables = [
        //    'featuredPicture',
        //    'gallery',
        //    'status',
        //    'startPublicationDate',
        //    'endPublicationDate',
        //    'categories',
        //    'tags'
        //];
        //var uniqId = $('form.form-edit_form').attr('data-uniqid');
        //if (uniqId && uniqId !== '') {
        //    for (var i in columnables) {
        //        var object = columnables[i];
        //        var $formRow = $('#sonata-ba-field-container-' + uniqId + '_' + object);
        //        $formRow.detach();
        //        $formRow.select2('destroy');
        //        $('.column-blocs').append($formRow);
        //    }
        //}
    }
    
}();


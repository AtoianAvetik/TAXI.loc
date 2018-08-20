$(document).ready(function(){
    $('*[data-js=select2]').select2({
        placeholder: $(this).data('placeholder')
    });

    $('[data-select]').select2({
        width: '100%',
        language: {
            noResults: function(){
                return 'Совпадений не найдено';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });
});
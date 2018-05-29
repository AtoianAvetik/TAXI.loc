$(function () {
    $('[data-toggle="datepicker"]').datepicker({
        language: (window.navigator.languages) ? window.navigator.languages[0] : window.navigator.language,
        format: 'yyyy-mm-dd',
        startDate: new Date()
    });
    $('[data-toggle="wickedpicker"]').wickedpicker({
        twentyFour: true,
        title: ''
    });
    $('.tipso').tipso({
        speed: 100,
        position: 'right',
        background: '#ffffff',
        titleBackground: '#ffffff',
        color: '#262A2C',
        titleColor: '#246caa',
        tooltipHover: 'true'
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
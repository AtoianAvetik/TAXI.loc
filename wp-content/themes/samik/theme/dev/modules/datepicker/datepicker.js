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
});
$(function () {
    $("#start_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: "1920:+0", //Year 1900 to Current Year.
    });
});

$(function () {
    $("#end_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: "1920:+0", //Year 1900 to Current Year.
    });
});

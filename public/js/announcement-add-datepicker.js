$(function () {
    $("#start_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "mm-dd-yy",
        yearRange: "1920:+0", //Year 1900 to Current Year.
    });
});

$(function () {
    $("#end_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "mm-dd-yy",
        yearRange: "1920:+0", //Year 1900 to Current Year.
    });
});

$(function () {
    $("#editBirthday").datepicker({
        onSelect: function (value, ui) {
            var today = new Date(),
                age2 = today.getFullYear() - ui.selectedYear;
            age3 = today.getFullYear() - ui.selectedYear;
            $("#age2").val(age2);
            $("#age3").val(age3);
        },

        changeMonth: true,
        changeYear: true,
        dateFormat: "mm-dd-yy",
        yearRange: "1920:+0", //Year 1900 to Current Year.
    });
});

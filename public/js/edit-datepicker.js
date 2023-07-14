$(function () {
    $("#editBirthday").datepicker({
        onSelect: function (value, ui) {
            var today = new Date(),
                age = today.getFullYear() - ui.selectedYear;
            $("#age2").val(age);
        },

        changeMonth: true,
        changeYear: true,
        dateFormat: "mm/dd/yy",
        yearRange: "1920:+0", //Year 1900 to Current Year.
    });
});

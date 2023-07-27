$(document).ready(function () {
    $("#change-password-button").on("click", function (e) {
        e.preventDefault();

        // * GET THE USER    ID FROM THE BUTTON'S DATA-ID ATTRIBUTE * //
        var userID = $(this).data("id");

        // * ADD CSRF TOKEN * //
        const csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        ).content;

        // * GET THE NEW PASSWORD INPUT VALUES * //
        var newPassword = $("#new-password-input").val();
        var confirmPassword = $("#confirm-password-input").val();

        // * ADD VALIDATION TO ENSURE BOTH PASSWORDS MATCH AND ARE NOT EMPTY * //
        if (newPassword !== confirmPassword) {
            // * SHOW SWEETALERT ERROR NOTIFICATION * //
            Swal.fire({
                title: "Error",
                text: "Passwords do not match.",
                icon: "error",
            });
            return;
        }

        if (newPassword.trim() === "") {
            Swal.fire({
                title: "Error",
                text: "Please enter a new password.",
                icon: "error",
            });
            return;
        }

        // * MAKE THE AJAX REQUEST * //
        $.ajax({
            url: "/update-user-account/" + userID,
            type: "POST",
            data: {
                _token: csrfToken,
                password: newPassword,
                confirm_password: confirmPassword,
            },
            success: function (response) {
                // * SHOW SWEETALERT NOTIFICATION ON SUCCESS * //
                Swal.fire({
                    title: "Success!",
                    text: "Password updated successfully.",
                    icon: "success",
                }).then(function () {
                    // * REDIRECT TO THE "STUDENT-ACCOUNT-SETTINGS" ROUTE AFTER THE SWEETALERT IS CLOSED * //
                    window.location.href = "/a/account-settings/" + userID;
                });
            },
            error: function (xhr, status, error) {
                // * HANDLE ERROR RESPONSE * //
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;

                    // * FORMAT ERROR MESSAGES * //
                    var errorMessages = "";
                    $.each(errors, function (field, messages) {
                        $.each(messages, function (index, message) {
                            errorMessages += message + "<br>";
                        });
                    });

                    // * DISPLAY ERROR MESSAGES USING SWEETALERT * //
                    Swal.fire({
                        title: "Error",
                        html: errorMessages,
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                } else {
                    // * HANDLE OTHER ERROR CASES * //
                    Swal.fire({
                        title: "Error",
                        text: "An error occurred.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
        });
    });
});

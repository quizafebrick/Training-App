// * FUNCTION TO SHOW THE CHANGE PASSWORD SECTION * //
function showChangePasswordSection() {
    document.getElementById('change-password-section').style.display = 'block';
    document.getElementById('change-password-button').style.display = 'block';
}

// * FUNCTION TO HIDE THE CHANGE PASSWORD SECTION * //
function hideChangePasswordSection() {
    document.getElementById('change-password-section').style.display = 'none';
    document.getElementById('change-password-button').style.display = 'none';
}

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // * AJAX FUNCTION TO VERIFY THE OLD PASSWORD * //
    function verifyOldPassword() {
        const oldPassword = document.getElementById('old-password-input').value;
        const emailAddress = document.querySelector('input[name="email_address"]').value;

        // * CHECK IF THE OLD PASSWORD IS EMPTY * //
        if (oldPassword.trim() === '') {
            // * SHOW A SWEETALERT FOR THE ERROR * //
            Swal.fire({
                icon: 'error',
                title: 'Password Verification Failed',
                text: 'You must enter your current password to be able to make a new one.',
            });
            return; // * EXIT THE FUNCTION TO PREVENT THE AJAX REQUEST * //
        }

        // * MAKE AN AJAX POST REQUEST TO VERIFY THE OLD PASSWORD * //
        fetch("/verify-old-password", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken, // * USE THE CSRFTOKEN VARIABLE HERE * //
            },
            body: JSON.stringify({ old_password: oldPassword, email_address: emailAddress }),
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .then((data) => {
            // * CHECK THE RESPONSE FROM THE SERVER * //
            if (data.show_change_password) {
                // * PASSWORD VERIFIED, SHOW THE CHANGE PASSWORD SECTION * //
                showChangePasswordSection();

                const oldPasswordInput = document.getElementById('old-password-input');
                oldPasswordInput.disabled = true,
                oldPasswordInput.className = 'bg-gray-200 cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5';

                const verifyBtn2 = document.getElementById('verify-btn');
                verifyBtn2.className = 'hidden';
            } else {
                // * PASSWORD VERIFICATION FAILED, HIDE THE CHANGE PASSWORD SECTION * //
                hideChangePasswordSection();

                // * SHOW A SWEETALERT FOR THE MISTAKE * //
                Swal.fire({
                    icon: 'error',
                    title: 'Password Verification Failed',
                    text: 'Please make sure you entered the correct current password.',
                });
            }

            // * ACCESS THE STUDENT EMAIL FROM THE RESPONSE AND USE IT AS NEEDED * //
            const studentEmail = data.student_email;
            console.log(studentEmail);
        })
        .catch((error) => {
            // * PASSWORD VERIFICATION FAILED, HIDE THE CHANGE PASSWORD SECTION * //
            hideChangePasswordSection();
            console.error(error);
        });
    }

// * EVENT LISTENER FOR THE VERIFY BUTTON * //
document.getElementById('verify-btn').addEventListener('click', function(event) {
    event.preventDefault();
    verifyOldPassword();
});

// * HIDE THE CHANGE PASSWORD SECTION INITIALLY (FIRST LOAD) * //
hideChangePasswordSection();




<div class="mt-10">
    <div class="p-3 bg-blue-800 rounded-lg">
        <div class="my-3 text-3xl font-semibold text-center text-white">
            VERIFY OLD PASSWORD
        </div>
        <div class="mt-5 bg-white">
            <div class="mx-5">
                @csrf
                <div class="grid grid-cols-1">
                    <div class="p-2 mt-3 md:mt-0 md:p-5">
                        <div class="mb-6">
                            <label for="old-password-input" class="block mb-2 text-lg font-medium text-gray-900">
                                Current Password
                            </label>
                            <input type="password" id="old-password-input" name="old_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg block w-full p-2.5"
                                placeholder="••••••••">
                            <input type="hidden" name="email_address" value="{{ $studentDetails->email_address }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- * BUTTON * --}}
    <div class="mt-5">
        <button type="submit" id="verify-btn"
            class="w-full px-4 py-2 mr-2 text-white bg-blue-700 rounded hover:bg-blue-800 hover:duration-300">
            <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                    <path
                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                </svg> &nbsp;
                Verify Password
            </div>
        </button>

        {{-- <form action="{{ route('student-change-password', $studentDetails->id) }}" method="POST">
            @method('PUT')
            @csrf --}}
            <div class="p-3 mt-5 bg-blue-800 rounded-lg" id="change-password-section">
                <div class="my-3 text-3xl font-semibold text-center text-white">
                    CHANGE NEW PASSWORD
                </div>
                <div class="mt-5 bg-white">
                    <div class="mx-5">
                        <div class="grid grid-rows-1 gap-3">
                            <div class="p-2 mt-3 md:mt-0 md:p-5">
                                <div class="mb-6">
                                    <label for="new-password-input"
                                        class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                        New Password
                                    </label>
                                    <input type="password" id="new-password-input" name="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg block w-full p-2.5"
                                        placeholder="••••••••">
                                </div>
                                <div class="mb-6">
                                    <label for="confirm-password-input"
                                        class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                        Confirm Password
                                    </label>
                                    <input type="password" id="confirm-password-input" name="confirm_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg block w-full p-2.5"
                                        placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- * BUTTON * --}}
            <div class="mt-5">
                <button type="submit" id="change-password-button" data-id={{ $studentDetails->id }}
                    class="w-full px-4 py-2 mr-2 text-white bg-blue-700 rounded hover:bg-blue-800 hover:duration-300">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                            <path
                                d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                        </svg> &nbsp;
                        Change Password
                    </div>
                </button>
            </div>
        {{-- </form> --}}
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#change-password-button').on('click', function(e) {
            e.preventDefault();

            // Get the student ID from the button's data-id attribute
            var studentId = $(this).data('id');

            // Get the new password input values
            var newPassword = $('#new-password-input').val();
            var confirmPassword = $('#confirm-password-input').val();

            // Add validation to ensure both passwords match and are not empty
            if (newPassword !== confirmPassword) {
                $('#response-message').text('Passwords do not match.');
                return;
            }

            if (newPassword.trim() === '') {
                $('#response-message').text('Please enter a new password.');
                return;
            }

            // Make the AJAX request
            $.ajax({
                url: '{{ route("student-change-password", $studentDetails->id) }}', // Correct route name
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Add the CSRF token for Laravel
                    password: newPassword,
                    confirm_password: confirmPassword,
                },
                success: function(response) {
                    // Redirect to the "student-account-settings" route on success
                    window.location.href = '{{ route("student-account-settings", $studentDetails->id) }}';
                },
                error: function(xhr) {
                    // Handle any errors here (e.g., show an error message)
                    // For example, you can show an error message in a div with the id "response-message"
                    $('#response-message').text('An error occurred while updating the password.');
                }
            });

        });
    });
</script>








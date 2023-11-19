<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<style>
    /* Include your custom styles here */

    body {
        font-family: 'Poppins', sans-serif;
        background: #ececec;
    }

    /* Add any additional custom styles for the registration page */

    .box-area {
        width: 600px;
    }

    .right-box {
        padding: 50px 30px 50px 50px;
    }

    @media only screen and (max-width: 768px) {
        .box-area {
            margin: 0 10px;
        }

        .right-box {
            padding: 20px;
        }
    }
</style>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!-- Right Box - Registration -->
            <div class="col-md-11 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h2 class="fw-bold">Create an Account</h2>
                        <p>Join us to explore amazing features.</p>
                    </div>

                    <form id="registrationForm" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="full_name" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Full Name" value="{{ old('full_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="email" id="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email address" value="{{ old('email') }}" required>
                                <small class="text-danger" id="emailWarning"></small>
                            </div>

                        <div class="mb-3">
                            <input type="tel" name="phone_number" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Phone Number" value="{{ old('phone_number') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password" required>
                            <small class="text-danger" id="passwordWarning"></small>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Confirm Password" required>
                            <small class="text-danger" id="confirmPasswordWarning"></small>
                        </div>

                        <div class="mb-4">
                            <button type="button" class="btn btn-lg btn-primary w-100 fs-6" onclick="validateForm()">Register</button>
                        </div>
                    </form>

                    <div class="row">
                        <small>Already have an account? <a href="{{ url('/login') }}" style="text-decoration: none; color: #164bec;">Login</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function validateForm() {
            var email = $('#email').val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                $('#emailWarning').text('Please enter a valid email address.');
                return;
            } else {
                $('#emailWarning').text('');
            }

            var password = $('#password').val();
            var minLength = 8; 

            if (password.length < minLength) {
                $('#passwordWarning').text('Password must be at least ' + minLength + ' characters.');
                return;
            } else {
                $('#passwordWarning').text('');
            }

            var confirmPassword = $('#password_confirmation').val();

            if (password !== confirmPassword) {
                $('#confirmPasswordWarning').text('Passwords do not match.');
                return;
            } else {
                $('#confirmPasswordWarning').text('');
            }

            $('#registrationForm').submit();
        }
    </script>

</body>

</html>

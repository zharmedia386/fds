<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .otp-container {
            text-align: center;
        }

        .otp-input {
            width: 40px;
            height: 40px;
            font-size: 24px;
            text-align: center;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .otp-input:focus {
            border-color: #007bff;
        }

        .otp-error {
            color: red;
            margin-top: 10px;
        }

        .otp-description {
            color: #333; 
            margin-top: 10px;
        }
    </style>
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- <link href="{{ asset('frontend/css/custom-style.scss') }}" rel="stylesheet" type="text/css" media="all" /> -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <div class="otp-container">
        <div class="toast-container position-fixed top-0 end-0 p-3">

            @if (Session::has('otpError'))
            <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ Session::get('otpError') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            @endif
        </div>
        <h1>OTP Verification</h1>

        <div class="otp-description">
            Silakan cek kode OTP anda di WhatsApp dengan nomor telepon <strong>{{ session('phone_number') }}</strong>
        </div>

        <div class="otp-timer">
            <span id="countdown">60</span> detik tersisa
        </div>
        
        @if ($errors->any())
        <div class="otp-error">
            {{ $errors->first('otp') }}
        </div>
        @endif

        <form id="otp-form" method="POST" action="{{ route('otp-verification') }}">
            @csrf
            <label for="otp">Enter OTP:</label>
            <div>
                <input class="otp-input" type="text" id="otp1" name="otp1" maxlength="1" required>
                <input class="otp-input" type="text" id="otp2" name="otp2" maxlength="1" required>
                <input class="otp-input" type="text" id="otp3" name="otp3" maxlength="1" required>
                <input class="otp-input" type="text" id="otp4" name="otp4" maxlength="1" required>
                <input class="otp-input" type="text" id="otp5" name="otp5" maxlength="1" required>
                <input class="otp-input" type="text" id="otp6" name="otp6" maxlength="1" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Verify OTP</button>
        </form>
    </div>
    <script>
        // Function to handle OTP input
        function handleOTPInput(event, index, inputs) {
        const inputValue = event.target.value;
        const isBackspace = event.key === 'Backspace';
        
        // Remove non-numeric characters
        const numericValue = inputValue.replace(/\D/g, '');

        // Update the input value with numeric characters only
        event.target.value = numericValue;

        if (isBackspace) {
            // If Backspace key is pressed, move the cursor one position to the left
            if (index > 0) {
            inputs[index - 1].focus();
            }
        } else if (inputValue.length === 1 && index < inputs.length - 1) {
            // If a numeric key is pressed and not in the last input box, move the cursor one position to the right
            inputs[index + 1].focus();
        }
        }

        // Add event listeners to OTP input fields
        document.querySelectorAll('.otp-input').forEach(function (input, index, inputs) {
            input.addEventListener('input', function (event) {
                handleOTPInput(event, index, inputs);
            });

            // Handle arrow key navigation
            input.addEventListener('keydown', function (event) {
                if (event.key === 'ArrowLeft' && index > 0) {
                // ArrowLeft: Move cursor one position to the left
                inputs[index - 1].focus();
                } else if (event.key === 'ArrowRight' && index < inputs.length - 1) {
                // ArrowRight: Move cursor one position to the right
                inputs[index + 1].focus();
                } else if (event.key === 'Backspace' && index > 0) {
                // Backspace: If Backspace key is pressed, move cursor one position to the left
                inputs[index - 1].focus();
                }
            });
        });

        // TIMER OTP
    </script>

    <script src="{{ asset('frontend/js/bootstrap.bundle.js') }}"></script>
</body>
</html>

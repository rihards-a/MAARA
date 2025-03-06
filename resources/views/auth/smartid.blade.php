<!-- resources/views/auth/smartid.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart-ID Authentication</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .verification-code {
            font-size: 24px;
            letter-spacing: 2px;
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
        }
        .auth-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-control-lg {
            height: 50px;
            font-size: 16px;
        }
        .hidden {
            display: none;
        }
        .status-message {
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
        }
        .status-waiting {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
        }
        .status-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }
        .status-error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="auth-container">
            <h2 class="mb-4 text-center">Smart-ID Authentication</h2>
            
            <!-- Authentication Form -->
            <div id="authForm">
                <form id="smartIdAuthForm">
                    <div class="mb-3">
                        <label for="semanticsType" class="form-label">Document Type</label>
                        <select class="form-select form-control-lg" id="semanticsType" name="semantics_identifier_type" required>
                            <option value="PNO">National Identity Number (PNO)</option>
                            <option value="IDC">National Identity Card Number (IDC)</option>
                            <option value="PAS">Passport Number (PAS)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="countryCode" class="form-label">Country</label>
                        <select class="form-select form-control-lg" id="countryCode" name="country_code" required>
                            <option value="EE">Estonia (EE)</option>
                            <option value="LV">Latvia (LV)</option>
                            <option value="LT">Lithuania (LT)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="identifier" class="form-label">Identifier</label>
                        <input type="text" class="form-control form-control-lg" id="identifier" name="identifier" placeholder="e.g., 10101010005" required>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="usePolling" name="use_polling" checked>
                        <label class="form-check-label" for="usePolling">
                            Use polling for authentication (recommended)
                        </label>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Authenticate with Smart-ID</button>
                    </div>
                </form>
            </div>
            
            <!-- Verification Code Section (displayed during authentication) -->
            <div id="verificationSection" class="hidden text-center">
                <h4 class="mb-3">Verification Code</h4>
                <p>Please check that this verification code appears in your Smart-ID app:</p>
                <div class="verification-code mb-3" id="verificationCode"></div>
                <div class="status-message status-waiting" id="statusMessage">
                    Waiting for authentication...
                </div>
                <button id="cancelAuthButton" class="btn btn-outline-secondary mt-3">Cancel Authentication</button>
            </div>
            
            <!-- Success Section -->
            <div id="successSection" class="hidden">
                <div class="status-message status-success">
                    <h4>Authentication Successful!</h4>
                    <p>You have been successfully authenticated.</p>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Name:</th>
                                <td id="userName"></td>
                            </tr>
                            <tr>
                                <th>Country:</th>
                                <td id="userCountry"></td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td id="userDateOfBirth"></td>
                            </tr>
                            <tr>
                                <th>Document Number:</th>
                                <td id="userDocumentNumber"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="d-grid gap-2 mt-4">
                    <button id="logoutButton" class="btn btn-warning">Logout</button>
                </div>
            </div>
            
            <!-- Error Section -->
            <div id="errorSection" class="hidden">
                <div class="status-message status-error">
                    <h4>Authentication Failed</h4>
                    <p id="errorMessage"></p>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button id="retryButton" class="btn btn-primary">Try Again</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // CSRF token for Ajax requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            // Check if already authenticated
            checkAuthStatus();
            
            // Configuration
            const pollInterval = {{ config('services.smartid.poll_interval', 5) }} * 1000; // in milliseconds
            const maxPollAttempts = {{ config('services.smartid.max_poll_attempts', 24) }};
            
            // Form submission
            $('#smartIdAuthForm').on('submit', function(e) {
                e.preventDefault();
                
                // Hide any previous errors
                hideSection('errorSection');
                
                // Show loading state
                $('#authForm button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Initiating...');
                
                // Get form data
                const formData = {
                    semantics_identifier_type: $('#semanticsType').val(),
                    country_code: $('#countryCode').val(),
                    identifier: $('#identifier').val(),
                    use_polling: $('#usePolling').is(':checked') ? 1 : 0,
                    display_text: 'Authentication Request'
                };
                
                // Initiate authentication
                $.ajax({
                    url: '{{ route("smartid.authenticate") }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            if (formData.use_polling) {
                                // Display verification code
                                $('#verificationCode').text(response.verification_code);
                                hideSection('authForm');
                                showSection('verificationSection');
                                
                                // Start polling for status
                                let attempts = 0;
                                const pollTimer = setInterval(function() {
                                    attempts++;
                                    if (attempts > maxPollAttempts) {
                                        clearInterval(pollTimer);
                                        showError('Authentication timed out. Please try again.');
                                        return;
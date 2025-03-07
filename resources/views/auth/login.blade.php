@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Smart-ID Login</div>

                <div class="card-body">
                    <div id="smartid-form">
                        <div class="mb-3">
                            <label for="country_code" class="form-label">Country</label>
                            <select id="country_code" class="form-control">
                                <option value="EE">Estonia</option>
                                <option value="LV">Latvia</option>
                                <option value="LT">Lithuania</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="identifier" class="form-label">Personal ID Number</label>
                            <input type="text" id="identifier" class="form-control" placeholder="Enter your national ID number">
                        </div>
                        
                        <button type="button" id="login-button" class="btn btn-primary">Login with Smart-ID</button>
                    </div>
                    
                    <div id="verification-code-container" style="display: none;">
                        <h4>Verification Code</h4>
                        <div class="alert alert-info" id="verification-code"></div>
                        <p>Please check that this code matches what you see in your Smart-ID app.</p>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    
                    <div id="error-container" style="display: none;">
                        <div class="alert alert-danger" id="error-message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginButton = document.getElementById('login-button');
    const smartidForm = document.getElementById('smartid-form');
    const verificationCodeContainer = document.getElementById('verification-code-container');
    const verificationCodeElement = document.getElementById('verification-code');
    const errorContainer = document.getElementById('error-container');
    const errorMessage = document.getElementById('error-message');
    
    loginButton.addEventListener('click', initiateSmartID);
    
    async function initiateSmartID() {
        const countryCode = document.getElementById('country_code').value;
        const identifier = document.getElementById('identifier').value;
        
        if (!identifier) {
            showError('Please enter your ID number');
            return;
        }
        
        try {
            const response = await fetch('/auth/smartid/init', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    semantics_identifier_type: 'PNO',
                    country_code: countryCode,
                    identifier: identifier,
                    display_text: 'Login to Application'
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                smartidForm.style.display = 'none';
                verificationCodeContainer.style.display = 'block';
                verificationCodeElement.textContent = data.verification_code;
                
                pollAuthStatus(data.auth_session_id);
            } else {
                showError(data.error || 'Authentication failed');
            }
        } catch (error) {
            showError('Network error occurred');
            console.error(error);
        }
    }
    
    async function pollAuthStatus(authSessionId) {
        try {
            const response = await fetch('/auth/smartid/poll', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    auth_session_id: authSessionId
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                if (data.complete) {
                    // Store token in localStorage
                    localStorage.setItem('auth_token', data.token);
                    
                    // Redirect to dashboard or home page
                    window.location.href = '/dashboard';
                } else {
                    // Continue polling
                    setTimeout(() => pollAuthStatus(authSessionId), 2000);
                }
            } else {
                showError(data.error || 'Authentication failed');
                verificationCodeContainer.style.display = 'none';
                smartidForm.style.display = 'block';
            }
        } catch (error) {
            showError('Network error occurred');
            console.error(error);
            verificationCodeContainer.style.display = 'none';
            smartidForm.style.display = 'block';
        }
    }
    
    function showError(message) {
        errorMessage.textContent = message;
        errorContainer.style.display = 'block';
        setTimeout(() => {
            errorContainer.style.display = 'none';
        }, 5000);
    }
});
</script>
@endsection
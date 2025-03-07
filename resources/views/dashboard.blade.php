@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h4>Welcome, <span id="user-name">User</span>!</h4>
                    <p>You have successfully authenticated with Smart-ID.</p>
                    
                    <button type="button" id="logout-button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const token = localStorage.getItem('auth_token');
    
    // Fetch user data
    fetch('/user', {
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Authentication failed');
        }
        return response.json();
    })
    .then(user => {
        document.getElementById('user-name').textContent = user.name;
    })
    .catch(error => {
        console.error(error);
        window.location.href = '/login';
    });
    
    // Logout handler
    document.getElementById('logout-button').addEventListener('click', function() {
        fetch('/auth/smartid/logout', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(() => {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        })
        .catch(error => {
            console.error(error);
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        });
    });
});
</script>
@endsection
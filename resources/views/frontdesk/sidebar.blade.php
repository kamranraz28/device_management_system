@php
    // Get the current route name
    $currentRoute = Route::currentRouteName();
@endphp

<div class="profile-sidebar" style="background-color: #e8146c; min-height: 600px; color: white;">
    <nav class="dashboard-menu">
        <!-- Your menu items go here -->
        <ul class="navbar-nav">
            <li class="nav-item" style="{{ $currentRoute == 'dashboard' ? 'background-color: white;' : '' }}">
                <a href="{{ route('dashboard') }}" style="{{ $currentRoute == 'dashboard' ? 'color: #e8146c;' : 'color: white;' }}">
                    <span>Dashboard</span>
                </a>
            </li>

            
            <li class="nav-item" style="{{ $currentRoute == 'total_visitor' ? 'background-color: white;' : '' }}">
                <a href="{{ route('total_visitor') }}" style="{{ $currentRoute == 'total_visitor' ? 'color: #e8146c;' : 'color: white;' }}">
                    <span>Registered Device List</span>
                </a>
            </li>
            
            <li class="nav-item" style="{{ $currentRoute == 'new_visitor' ? 'background-color: white;' : '' }}">
                <a href="{{ route('new_visitor') }}" style="{{ $currentRoute == 'new_visitor' ? 'color: #e8146c;' : 'color: white;' }}">
                    <span>New Device Upload</span>
                </a>
            </li>

            <li class="nav-item" style="{{ $currentRoute == 'real_list' ? 'background-color: white;' : '' }}">
                <a href="{{ route('real_list') }}" style="{{ $currentRoute == 'real_list' ? 'color: #e8146c;' : 'color: white;' }}">
                    <span>Real List</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ in_array($currentRoute, ['device_activation_report', 'warranty_check_report']) ? 'true' : 'false' }}" style="color: white;">
                    Reports
                </a>
                <div class="dropdown-menu {{ in_array($currentRoute, ['device_activation_report', 'warranty_check_report']) ? 'show' : '' }}" aria-labelledby="navbarDropdown" style="{{ in_array($currentRoute, ['device_activation_report', 'warranty_check_report']) ? 'background-color: white;' : '' }}">
                    <a class="dropdown-item" href="{{ route('device_activation_report') }}" style="{{ $currentRoute == 'device_activation_report' ? 'color: #e8146c;' : 'color: #e8146c;' }}">Device Activation Report</a>
                </div>
            </li>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

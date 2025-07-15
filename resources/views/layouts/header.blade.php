<header class="header header-fixed header-one">
    <style>
        .header {
            background: rgba(0, 0, 0, 0.8);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            transition: all 0.4s ease;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            margin-right: 20px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #e8146c !important;
        }

        .bar-icon span {
            display: block;
            height: 3px;
            width: 25px;
            background-color: white;
            margin: 4px 0;
            border-radius: 3px;
        }

        @media (max-width: 991px) {
            .main-menu-wrapper {
                background: #000;
                padding: 20px;
            }
        }
    </style>

    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);" class="d-lg-none">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ url('/') }}" class="navbar-brand logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="filter: brightness(0) invert(1); height: 40px;">
                </a>
            </div>

            <!-- <div class="main-menu-wrapper collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                </ul>
            </div> -->
        </nav>
    </div>
</header>

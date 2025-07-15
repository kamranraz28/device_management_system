<footer class="footer footer-one mt-5">
    <style>
        .footer {
            background: #111;
            color: #fff;
            padding: 40px 0 20px;
            font-size: 14px;
            animation: fadeInUp 1s ease;
        }

        .footer-logo img {
            width: 120px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .footer-logo img:hover {
            transform: scale(1.1);
        }

        .footer-bottom {
            background: #000;
            padding: 15px 0;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .copyright-text {
            color: #bbb;
            font-size: 13px;
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .footer-logo img {
                width: 80px;
            }
        }
    </style>

    <div class="footer-top text-center">
        <div class="container">
            <div class="footer-widget footer-about">
                <div class="footer-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Lab Quest Limited" style="filter: brightness(0) invert(1);">
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom text-center">
        <div class="container">
            <p class="mb-0">
                © 2024 <a href="#" style="color: #fff;">Salextra Limited</a>. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DMS - Device Management System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .top-space {
            padding-top: 30px;
        }

        .account-content {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            max-width: 900px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1.text-center {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
            align-items: center;
            justify-content: center;
        }

        .col-md-5,
        .col-md-7 {
            padding: 0 15px;
            box-sizing: border-box;
        }

        .col-md-5 {
            flex: 0 0 41.6667%;
            max-width: 41.6667%;
            text-align: center;
            margin-bottom: 30px;
        }

        .col-md-7 {
            flex: 0 0 58.3333%;
            max-width: 58.3333%;
        }

        .login-left img {
            max-width: 250px;
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .login-header h3 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 25px;
            animation: slideInDown 0.6s ease;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input.form-control {
            width: 100%;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            border: 1.5px solid #ccc;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input.form-control:focus {
            border-color: #e8146c;
            box-shadow: 0 0 0 0.2rem rgba(232, 20, 108, 0.25);
            outline: none;
        }

        button.btn-primary {
            width: 100%;
            padding: 12px 0;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #e8146c;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn-primary:hover {
            background-color: #c3115d;
        }

        .text-center {
            text-align: center;
        }

        a {
            color: #e8146c;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 767px) {
            .col-md-5 {
                display: none;
            }

            .col-md-7 {
                flex: 1 0 100%;
                max-width: 100%;
            }

            .top-space {
                padding-top: 100px;
            }

            .account-content {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="content top-space">
        <div class="account-content">
            <h1 class="text-center">Device Management System</h1>
            <div class="row">
                <div class="col-md-5 login-left">
                    <img src="assets/img/logo1.png" alt="DMS Logo" />
                </div>

                <div class="col-md-7 login-right">
                    <div class="login-header text-center">
                        <h3>Login <span>Admin</span></h3>
                    </div>

                    <form method="POST" action="{{ route('log_in') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="text" name="email" required autofocus />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required />
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-primary">Log In</button>
                        </div>

                        <div class="text-center" style="margin-top: 15px;">
                            <a href="/password/request">Forgot Your Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="ZVXin6WG4A6QNg9qihcY0otTQPySdiho0LAQDc21">
    <title>Online Khabar Hub | Login</title>
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
</head>
<style>
    .login-wrapper {
        padding: 10px;
    }
    .login-area {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }
    .container-center {
        max-width: 400px;
        margin: 8% auto 0;
        padding: 20px;
    }
    .panel {
        box-shadow: none;
        border-radius: 0px;
        border: none;
    }
    .panel-custom > .panel-heading {
        color: #fff;
        background-color: #000000;
        border-color: #000000;
    }
    .view-header {
        margin: 10px 0;
    }
    .view-header .header-icon {
        font-size: 60px;
        color: #009688;
        width: 68px;
        float: left;
        margin-top: -8px;
        line-height: 0;
    }
    .view-header .header-title {
        margin-left: 68px;
    }
    .view-header .header-title h3 {
        margin-bottom: 2px;
    }
    small, .small {
        font-size: 85%;
    }
    .panel-body {
        padding: 15px;
    }
    .btn-add {
        background: #000000;
        color: #fbfbfb !important;
        border: 1px solid #000000;
    }
    .btn-warning {
        background-color: #FFB61E;
        border-color: #E1A21E;
    }
    .panel .panel-heading h3{
        margin: 0;
        line-height: 26px;
        letter-spacing: .5px;
        color: #fff;
        font-weight: 600;
    }
    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
</style>
<body>
    <div id="app">
        <main class="py-4">
                <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock text-white"></i>
                            </div>
                            <div class="header-title">
                                <h3>Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf                            
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                
                                <input id="email" placeholder="example@gmail.com" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
                                                                
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input id="password" title="Please enter your password" type="password" placeholder="******" class="form-control " name="password" required autocomplete="current-password">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-add">
                                Login
                            </button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
        </main>
    </div>
</body>
</html>
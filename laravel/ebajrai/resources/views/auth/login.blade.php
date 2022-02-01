<!DOCTYPE html>
    <html>
        
        <head>
            
            <title> E-Bajrai | Login </title>
            <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
            <link rel="stylesheet" href="css/base_style.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
            <script src="https://kit.fontawesome.com/a7b35074e7.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="css/astyle.css">
            
            <style>
                
                body {
                    background-color: #F5F8F2;
                    color: darkslategray;
                    font-size: 15px;
                }

                .Signup .btn {
                    width: 100%;
                    margin: 10px 0px;
                    font-size: 18px;
                    background-color: #53B175;
                    border: none;
                }
                
                .user_card{
                    height: 25%;
                    width: 500px;
                    padding: 80px;
                }

            </style>
            
        </head>

        <body>

        <x-guest-layout>
        <br><br>
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">
                        <form action="{{route('login')}}" method="POST" name="frm-login" class="Signup">
                            @csrf
                            <div class="container">
                                <div class="row"> 
                                    <div class="col-sm">

                                        <h2 style="text-align: center"> Login </h2>
                                        <p style="text-align: center; color: gray"> Enter your credentials to continue </p>
                                        <hr class="mb-3"><br>

                                        <label for="email"> <b>Email Address</b> </label>
                                        <input class="form-control" type="email" name="email" id="frm-login-uname" placeholder="Email address" :value="old('email')" required autofocus>
                                        <br>
                                        <label for="password"> <b>Password</b> </label>
                                        <input class="form-control" type="password" name="password" placeholder="*******" required autocomplete="current-password">
                                        <br>
                                        

                                        <x-jet-validation-errors class="mb-4" />
                                        
                                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Login"><br>
                                        <a class="link-function" href="{{ route('password.request') }}" title="Forgotten password?" style="color: #53B175; text-decoration:none"> Forgotten password? </a>
                                        <hr class="mb-3">
                                        <div class="mt-4">
                                            <div class="d-flex justify-content-center links">
                                                Don't have an account? &nbsp; <a href="{{route('register')}}" style="color: #53B175; text-decoration: none">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </x-guest-layout>

        </body>
        
    </html>


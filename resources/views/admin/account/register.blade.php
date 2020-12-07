s<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png">
    <!--Page title-->
    <title>Admin DIT</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('public/admins/css/bootstrap.min.css')}}">
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('public/admins/css/style.css')}}">
</head>

<body id="page-top">
    <!-- preloader -->
    <div class="preloader">
        <img src="{{asset('public/admin/images/preloader.gif')}}" alt="preloader">
    </div>
    <!-- wrapper -->
    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">
            <!-- page content -->
            <div class="login_page center_container" style="background: url('{{asset('public/admins/images/inventory-bg.jpg')}}');">
                <div class="center_content">
                    <div class="logo">
                        <!-- <img src="assets/images/logo.png" alt="" class="img-fluid"> -->
                        <h3>USER REGISTRATION</h3>
                        <div class="admin">
                            <span class="display-3 text-white"><i class="fas fa-user"></i></span>
                            <p class="text-left">Fill with your mail to receive instructions on how to reset your
                                password.</p>
                        </div>
                    </div>
                    <form action="{{route('admin.register')}}" method="post">
                        @csrf
                        <div class="form-group icon_parent">
                            <input type="text" placeholder="Name" class="form-control bg-transparent border-0 pl-5" name="name" value="{{old('name')}}">
                            <span class="icon_soon_bottom_left"><i class="fas fa-user"></i></span>
                        </div>
                        @error('name')
                            <span class="d-block p-0" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror


                        <div class="form-group icon_parent">
                            <input type="email" placeholder="E-mail" class="form-control bg-transparent border-0 pl-5" name="email" value="{{old('email')}}">
                            <span class="icon_soon_bottom_left"><i class="fas fa-envelope"></i></span>
                            @error('email')
                            <span class="d-block p-0" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group icon_parent">
                            <input type="text" placeholder="Pnone" class="form-control bg-transparent border-0 pl-5" name="phone" value="{{old('phone')}}">
                            <span class="icon_soon_bottom_left"><i class="fas fa-envelope"></i></span>
                            @error('phone')
                            <span class="d-block p-0" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group icon_parent">
                            <input type="password" class="form-control bg-transparent border-0 pl-5" placeholder="Password" name="password">
                            <span class="icon_soon_bottom_left"><i class="fas fa-unlock"></i></span>
                            @error('password')
                                <span class="d-block p-0" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon_parent">
                            <input type="password" class="form-control bg-transparent border-0 pl-5" placeholder="Re-type Password" name="password_confirmation">
                            <span class="icon_soon_bottom_left"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group">
                            <label class="chech_container fs-14">I agree with <a href="#" class="text-white">terms of
                                    service</a>
                                <input type="checkbox">
                                <span class="checkmark bg-transparent"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-blue btn-block border-0">Register</button>
                        </div>
                    </form>
                    <div class="container">
                        <div class="text-center my-2">
                            <p class="text-white">Already Have an Account? </p>
                            <a href="login.html" class="text-white">Login</a>

                        </div>
                    </div>
                    <div class="footer">
                        <p>Copyright &copy; 2019 <a href="https://durbarit.com/">Durbar IT</a>. All rights reserved.</p>
                    </div>

                </div>
            </div>
        </div>
        <!--/ content wrapper -->
    </div>
    <!--/ wrapper -->
    <!-- click to top -->
    <a href="javascript:void(0);" class="click_to_top" title="Scroll to Top" style="display: none;"><span>top</span></a>
    <!-- jquery -->
    <script src="{{asset('public/admins/js/jquery.min.js')}}"></script>
    <!-- popper Min Js -->
    <script src="{{asset('public/admins/js/popper.min.js')}}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{asset('public/admins/js/bootstrap.min.js')}}"></script>
    <!-- Fontawesome-->
    <script src="{{asset('public/admins/js/all.min.js')}}"></script>
    <!-- Main js -->
    <script src="{{asset('public/admins/js/main.js')}}"></script>

</body>

</html>

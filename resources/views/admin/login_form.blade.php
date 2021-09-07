<!DOCTYPE html>
<html lang="en">

<head>
   @include('layouts.admin._head')
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <h2 class="text-center">Welcome</h2>
                        <h3 class="text-center">Happy to see you again!</h3>
                        @include('layouts.admin._alert')
                        <form class="pt-3" action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                                    </div>
                                    <input value="{{old('email')}}" name="email" type="email" class="form-control form-control-lg border-left-0" id="email" placeholder="User Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                                    </div>
                                    <input value="{{old('password')}}" name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                                </div>
                            </div>

                            <div class="my-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row" style='background-image: url("{{asset('images/login.jpg')}}")'>
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
            </div>
        </div>

    </div>

</div>
@include('layouts.admin._script')
</body>

</html>


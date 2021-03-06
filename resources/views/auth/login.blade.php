@include('essentials.navbar')

<title>Shopwayy | Login</title>

<style>
    /* container padding from top aligned center*/
    .container {
        padding-top: 12%;
        float: right;
        width: 70%;
    }

    /* add jumbotron to the left side of container */
    .jumbotron {
        float: left;
        background: #ffc1cc;
        color: ;
        width: 25%;
        margin-top: 10%;
        border-radius: 0;
        border: 1px solid #ddd;
        margin-bottom: 0;
    }
    .btn-lgn{
        /* width similar to parent */
        width: 70%;
    }
</style>


<div class="jumbotron">
    <h1 class="display-5">Hello, Guest!</h1>
    <h3> Get access to your Orders, Wishlist and Recommendations</h3>
    <hr class="my-4">
    <h4>It is super easy and free.</h4>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <!-- 
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->
                                <br><br>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    New to Shopwayy? Sign Up...!!
                                </a>
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
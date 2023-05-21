@include('auth.layouts.header')


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center text-white m-t-10"> Sign In to <strong>POS</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg " type="email" name="email" id="email" placeholder="Email">
                            @error('email')
                                 <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="password" id="password" placeholder="Password">
                            @error('password')
                                 <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" name="remember">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>

                   
                    
                    <div class="text-center form-group m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        @if (Route::has('password.request'))
                        <div class="col-sm-7">
                            <a  href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i>
                                Forgot your password?
                            </a>
                        </div> 
                        @endif
                         
                            
                        
                        <div class="text-right col-sm-5">
                            <a href="{{ route('register') }}">Create an account</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

@include('auth.layouts.footer')
    
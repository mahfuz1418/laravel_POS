
@include('auth.layouts.header')


<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img"> 
            <div class="bg-overlay"></div>
           <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
        </div> 


        <div class="panel-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control input-lg" type="text"  placeholder="Name" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                       <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" type="email"  placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                       <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" type="password" name="password"  placeholder="Password" required>
                    @error('password')
                       <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control input-lg" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                       <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox-signup" type="checkbox" checked="">
                        <label for="checkbox-signup">
                            I accept <a href="#">Terms and Conditions</a>
                        </label>
                    </div>
                    
                </div>
            </div>
            
            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                </div>
            </div>

            <div class="form-group m-t-30">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('login') }}">Already have account?</a>
                </div>
            </div>
        </form> 
        </div>                                 
        
    </div>
</div>




@include('auth.layouts.footer')
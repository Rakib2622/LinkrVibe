@include('frontend.partial.header')

<!--Body Content--> 
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center" >
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Reset Password</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

                <div class="mb-4">
                   <form method="POST" action="{{ route('password.email') }}" accept-charset="UTF-8" class="contact-form">    
                      @csrf
                      
                      <!-- Email Address -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="" id="email" class="form-control" :value="old('email')" required autofocus>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="text-center col-12">
                            <!-- Submit Button -->
                            <button type="submit" class="btn mb-3">{{ __('Email Password Reset Link') }}</button>
                        </div>
                     </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Body Content-->

@include('frontend.partial.footer')

@include('frontend.partial.header')

<!--Body Content--> 
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center" >
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Login</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                   <form method="POST" action="{{ route('login') }}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">    
                      @csrf
                      <div class="row">
                        <!-- Email Address -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="CustomerEmail">Email</label>
                                <input type="email" name="email" placeholder="" id="CustomerEmail" class="form-control" :value="old('email')" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        
                        <!-- Password -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="CustomerPassword">Password</label>
                                <input type="password" name="password" placeholder="" id="CustomerPassword" class="form-control" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                      </div>

                      <!-- Remember Me -->
                      <div class="form-group">
                          <label for="remember_me" class="inline-flex items-center">
                              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                              <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                          </label>
                      </div>
                      
                      <div class="row">
                        <div class="text-center col-12">
                            <!-- Submit Button -->
                            <button type="submit" class="btn mb-3">{{ __('Sign In') }}</button>

                            <!-- Forgot Password and Register Links -->
                            <p class="mb-4">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" id="RecoverPassword">Forgot your password?</a> &nbsp; | &nbsp;
                                @endif
                                <a href="{{ route('register') }}" id="customer_register_link">Create account</a>
                            </p>
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

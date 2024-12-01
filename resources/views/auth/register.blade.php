@include('frontend.partial.header')

<!--Body Content--> 
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Register</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                   <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" class="contact-form">    
                      @csrf
                      <div class="row">
                        <!-- Name -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="" id="name" class="form-control" :value="old('name')" required autofocus autocomplete="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="" id="email" class="form-control" :value="old('email')" required autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="" id="password" class="form-control" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="" id="password_confirmation" class="form-control" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="text-center col-12">
                            <!-- Submit Button -->
                            <button type="submit" class="btn mb-3">{{ __('Register') }}</button>

                            <!-- Login Link -->
                            <p class="mb-4">
                                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Already registered?') }}
                                </a>
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

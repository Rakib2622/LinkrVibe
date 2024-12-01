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
                <div class="mb-4">
                   <form method="POST" action="{{ route('password.store') }}" accept-charset="UTF-8" class="contact-form">    
                      @csrf
                      
                      <!-- Password Reset Token -->
                      <input type="hidden" name="token" value="{{ $request->route('token') }}">

                      <!-- Email Address -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="" id="email" class="form-control" :value="old('email', $request->email)" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                      </div>

                      <!-- Password -->
                      <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="" id="password" class="form-control" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                      </div>

                      <!-- Confirm Password -->
                      <div class="row mt-4">
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
                            <button type="submit" class="btn mb-3">{{ __('Reset Password') }}</button>
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

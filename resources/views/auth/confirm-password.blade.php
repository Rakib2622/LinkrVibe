@include('frontend.partial.header')

<!--Body Content--> 
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Confirm Password</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <div class="mb-4">
                   <form method="POST" action="{{ route('password.confirm') }}" accept-charset="UTF-8" class="contact-form">    
                      @csrf
                      
                      <!-- Password -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="" id="password" class="form-control" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="text-center col-12">
                            <!-- Confirm Button -->
                            <button type="submit" class="btn mb-3">{{ __('Confirm') }}</button>
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

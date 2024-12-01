@include('frontend.partial.header')

<!--Body Content--> 
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center" >
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Email Verification</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4 text-center text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-center text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4">
                    <div class="text-center">
                        <!-- Resend Verification Email Button -->
                        <form method="POST" action="{{ route('verification.send') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn">{{ __('Resend Verification Email') }}</button>
                        </form>

                        <!-- Log Out Button -->
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-secondary">{{ __('Log Out') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Body Content-->

@include('frontend.partial.footer')

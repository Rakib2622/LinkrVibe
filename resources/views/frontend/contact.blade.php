@include('frontend.partial.header')

<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Contact Us</h1></div>
          </div>
    </div>
    <!--End Page Title-->
    <div class="map-section map">
        <iframe src="https://www.google.com/maps/embed?pb=" height="350" allowfullscreen></iframe>
        <div class="container">
            <div class="row">
                <div class="map-section__overlay-wrapper">
                    <div class="map-section__overlay">
                        
                        <p><a href="https://maps.google.com/?daddr=80%20Spadina%20Ave,%20Toronto" class="btn btn--secondary btn--small" target="_blank">Get directions</a></p>
                    </div>
                   </div>
            </div>
        </div>
    </div>
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Contact Us</span>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                <h2>Drop Us A Line</h2>
                <p>"We would love to hear from you! Whether you have a question, feedback, or need assistance, our team is here to help."</p>
                <div class="formFeilds contact-form form-vertical">
                    <!-- Display success message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                
                    <!-- Display validation errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <form action="{{ route('contact.submit') }}" method="post" id="contact_form" class="contact-form">	
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="ContactFormName" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" id="ContactFormEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>                        	
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="tel" id="ContactFormPhone" name="phone" pattern="[0-9\-]*" placeholder="Phone Number" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="ContactSubject" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <textarea rows="10" id="ContactFormMessage" name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="open-hours">
                    <strong>Opening Hours</strong><br>
                    Mon - Sat : 9am - 11pm<br>
                    Sunday: 11am - 5pm
                </div>
                <hr />
                <ul class="addressFooter">
                    <li><i class="icon anm anm-map-marker-al"></i><p>55 Gallaxy Enque</p></li>
                    <li class="phone"><i class="icon anm anm-phone-s"></i><p>+353833421958</p></li>
                    <li class="email"><i class="icon anm anm-envelope-l"></i><p>info@linkrvibe.com</p></li>
                </ul>
                <hr />
                <ul class="list--inline site-footer__social-icons social-icons">
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon icon-facebook"></i></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    
</div>


@include('frontend.partial.footer')
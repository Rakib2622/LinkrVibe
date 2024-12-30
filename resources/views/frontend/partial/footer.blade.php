 <!--Footer-->
 <footer id="footer">
    <div class="newsletter-section">
        <div class="container">
            
            <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                        <div class="display-table">
                            <div class="display-table-cell footer-newsletter">
                                <div class="section-header text-center">
                                    <label class="h2"><span>Sign up for </span>Newsletter</label>
                                </div>
                                <!-- Display Success Message -->
                        
                                <form action="{{ route('newsletter.subscribe') }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="email" class="input-group__field newsletter__input" name="email" value="" placeholder="Email address" required>
                                        <span class="input-group__btn">
                                            <button type="submit" class="btn newsletter__submit" name="commit" id="Subscribe">
                                                <span class="newsletter__submit-text--large">Subscribe</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                        <div class="footer-social">
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
    </div>
    <div class="site-footer">
        <div class="container">
             <!--Footer Links-->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Quick Shop</h4>
                        <ul>
                            <li><a href="{{ route('services.nfc') }}">Digital Business Card</a></li>
                            <li><a href="{{ route('services.qrPos') }}">NFC &amp; QR Menu</a></li>
                            <li><a href="{{ route('services.gRC') }}">Google Review Card</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Informations</h4>
                        <ul>
                            <li><a href="{{ route('about') }}">About us</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy policy</a></li>
                            <li><a href="{{ route('terms') }}">Terms &amp; condition</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Customer Services</h4>
                        <ul>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="{{ route('support') }}">Support Center</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        <h4 class="h4">Contact Us</h4>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i><p>55 Gallaxy Enque</p></li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i><p>+353833421958</p></li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i><p>info@linkrvibe.com</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End Footer Links-->
            <hr>
            
        </div>
    </div>
</footer>
<!--End Footer-->
<!--Scoll Top-->
<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
<!--End Scoll Top-->


 <!-- Including Jquery -->
 <script src="/home/assets/js/vendor/jquery-3.3.1.min.js"></script>
 <script src="/home/assets/js/vendor/modernizr-3.6.0.min.js"></script>
 <script src="/home/assets/js/vendor/jquery.cookie.js"></script>
 <script src="/home/assets/js/vendor/wow.min.js"></script>
 <!-- Including Javascript -->
 <script src="/home/assets/js/bootstrap.min.js"></script>
 <script src="/home/assets/js/plugins.js"></script>
 <script src="/home/assets/js/popper.min.js"></script>
 <script src="/home/assets/js/lazysizes.js"></script>
 <script src="/home/assets/js/main.js"></script>

</div>
</body>
</html>
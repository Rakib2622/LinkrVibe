@include('frontend.partial.header')

<div class="page section-header text-center">
    <div class="page-title">
        <div class="wrapper">
            <h1 class="page-width">Services</h1>
        </div>
    </div>
</div>

<div class="services-wrapper" style="max-width: 95%; margin: 0 auto;">
    <!-- Section 1: Complete POS & Table Ordering System -->
    <div class="slider desktop-padding" style="display: flex; align-items: center; background: linear-gradient(to right, #ffffff, white); margin-bottom: 40px;">
        <div class="slider-text">
            <h3>Complete POS & Table Ordering System!</h3>
            <h1>NFC & QR Code Tabletop Menus</h1>
            <p>
                Upgrade your restaurant's dining experience with our NFC and QR code-enabled tabletop menus! Allow customers to easily browse your menu, place orders, and make payments directly from their smartphones.
            </p>
            <a href="{{ route('services.qrPos') }}" class="btn-primary">Learn More</a>
            <button onclick="contactNow()" class="btn-secondary">Contact Now</button>
        </div>
        <div class="slider-image">
            <img src="home/assets/images/Untitled-design.gif" alt="NFC & QR Code Tabletop Menus">
        </div>
    </div>

    <!-- Section 2: Digital Menu Board -->
    <div class="slider desktop-padding" style="display: flex; align-items: center; background: #f9f9f9; margin-bottom: 40px;">
        <div class="slider-image">
            <img src="\home\assets\images\dmb\menuslider.gif" alt="Digital Menu Board">
        </div>
        <div class="slider-text">
            <h3>Digital Menu Board</h3>
            <h1>Transform Your Restaurant’s Menu!</h1>
            <p>
                Digital menus are clean, easy to read, and provide an interactive experience for diners. Perfect for modern restaurants!
            </p>
            <a href="{{ route('services.dMB') }}" class="btn-primary">Learn More</a>
            <button onclick="contactNow()" class="btn-secondary">Contact Now</button>
        </div>
    </div>

    <!-- Section 3: Google Review Card -->
    <div class="slider desktop-padding" style="display: flex; align-items: center; background: linear-gradient(to right, #ffffff, #f0f0f0); margin-bottom: 40px;">
        <div class="slider-text">
            <h3>Google Review Card</h3>
            <h1>Boost Your Business Visibility!</h1>
            <p>
                With our NFC-enabled Google Review Cards, encourage walk-in customers to leave a review with just a simple tap. Easy and effective!
            </p>
            <a href="{{ route('services.gRC') }}" class="btn-primary">Learn More</a>
            <button onclick="contactNow()" class="btn-secondary">Contact Now</button>
        </div>
        <div class="slider-image">
            <img src="home/assets/images/5-Pack-of-Google-review-card.png" alt="Google Review Card">
        </div>
    </div>

    <!-- Section 4: NFC Business Card -->
    <div class="slider desktop-padding" style="display: flex; align-items: center; background: #f9f9f9; margin-bottom: 40px;">
        <div class="slider-image">
            <img src="home/assets/images/NFC Business Card Section.gif" alt="NFC Business Card">
        </div>
        <div class="slider-text">
            <h3>NFC Business Card</h3>
            <h1>Smart Networking Made Easy!</h1>
            <p>
                Make a lasting impression with our NFC Business Cards! Share your contact details, social media, and more with just a tap—perfect for modern professionals.
            </p>
            <a href="{{ route('services.nfc') }}" class="btn-primary">Learn More</a>
            <button onclick="contactNow()" class="btn-secondary">Contact Now</button>
        </div>
    </div>
</div>
<script>
    function contactNow() {
        window.location.href = '/contact';
    }
</script>
@include('frontend.partial.footer')


<style>
    /* General Styles */
    .slider {
        display: flex;
        margin: 0 auto;
        max-width: 1500px;
    }

    .desktop-padding {
        padding: 20px 30px;
    }

    .slider-text,
    .slider-image {
        flex: 1;
        padding: 20px;
    }

    .slider-text h3 {
        font-size: 2em;
        font-family: cursive;
        margin-bottom: 20px;
    }

    .slider-text h1 {
        font-size: 2.5em;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .slider-text p {
        font-size: 1.2em;
        margin-bottom: 30px;
    }

    .btn-primary,
    .btn-secondary {
        border: none;
        padding: 10px 10px;
        font-size: 1em;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: rgb(233, 104, 24);
        color: white;
    }

    .btn-primary:hover {
        background: orange;
    }

    .btn-secondary {
        background: rgb(47, 137, 2);
        color: white;
        margin-left: 10px;
    }

    .btn-secondary:hover {
        background: orange;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .slider {
            flex-direction: column;
            text-align: center;
        }

        .desktop-padding {
            padding: 10px;
        }

        .slider-image {
            order: -1;
            text-align: center;
        }

        .slider-image img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    }
</style>

@include('frontend.partial.header')

<div class="slider" style="display: flex; align-items: center; background: linear-gradient(to right, rgb(255, 255, 255), white); padding: 10px;">
    <div class="slider-text" style="flex: 1; color: white;">
        <h3 style="font-size: 2em; font-family: cursive; margin-bottom: 20px;">Complete POS & Table Ordering System!</h3>
        <h1 style="font-size: 2.5em; font-weight: bold; margin-bottom: 20px;">NFC & QR Code Tabletop Menus</h1>
        <p style="font-size: 1.2em; margin-bottom: 30px;">
            Upgrade your restaurant's dining experience with our NFC and QR code-enabled tabletop menus! Allow customers to easily browse your menu, place orders, and make payments directly from their smartphones.
        </p>
        <button 
            onclick="contactNow()" 
            style="background: rgb(233, 104, 24); color: rgb(248, 248, 248); border: none; padding: 10px 20px; font-size: 1.2em; font-weight:bold; cursor: pointer; border-radius: 8px; transition: all 0.3s ease;" 
            onmouseover="this.style.background='orange'; this.style.color='white';" 
            onmouseout="this.style.background='white'; this.style.color='orange';">
            Contact Now
        </button>
        <button 
            onclick="tryDemo()" 
            style="background: rgb(47, 137, 2); color: rgb(249, 253, 254); border: none; padding: 10px 20px; font-size: 1.2em; font-weight:bold; cursor: pointer; border-radius: 8px; margin-left: 10px; transition: all 0.3s ease;" 
            onmouseover="this.style.background='orange'; this.style.color='white';" 
            onmouseout="this.style.background='white'; this.style.color='orange';">
            Try Demo
        </button>
    </div>
    <div class="slider-image" style="flex: 1; text-align: right;">
        <img src="\home\assets\images\pos\menupos.gif" alt="Digital Menu Board" style="max-width: 100%; height: auto;">
    </div>
</div>



<script>
    function contactNow() {
        window.location.href = '/contact';
    }

    function tryDemo() {
        window.location.href = "https://menu.smartapcard.com/"; // Replace this with the actual demo URL
    }
</script>
@include('frontend.partial.footer')

<style>
    /* Responsive Styles */
    @media (max-width: 768px) {
        .slider {
            flex-direction: column;
            text-align: center;
        }

        .slider-text {
            margin-bottom: 20px;
        }

        .slider-image {
            order: -1;
            text-align: center;
        }

        .slider-image img {
            max-width: 100%;
            height: auto;
        }

        .testimonial-slider {
            display: block;
            overflow-x: unset;
        }
    }

    @media (min-width: 1200px) {
        #gallery {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 1199px) and (min-width: 768px) {
        #gallery {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767px) {
        #gallery {
            grid-template-columns: 1fr;
        }
    }
</style>
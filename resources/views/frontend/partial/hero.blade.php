<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Slider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .swiper {
            width: 100%;
            height: 100vh;
        }

        .swiper-slide {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333;
            font-size: 1.5rem;
            padding: 20px;
        }

        /* Cursive typography for headings */
        .swiper-slide h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 4rem;
            margin-bottom: 10px;
            color: #333;
        }

        /* Description styles */
        .swiper-slide p {
            font-size: 1.2rem;
            max-width: 600px;
            margin-bottom: 20px;
            color: #555;
        }

        /* Buttons */
        .swiper-slide .buttons {
            display: flex;
            gap: 15px;
        }

        .swiper-slide .buttons a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 2px solid #333;
            background: transparent;
            color: #333;
        }

        .swiper-slide .buttons a:hover {
            background: #333;
            color: #fff;
        }

        .swiper-slide .buttons .btn-learn {
            border-color: #007bff;
            color: #007bff;
        }

        .swiper-slide .buttons .btn-learn:hover {
            background: #007bff;
            color: #fff;
        }

        .swiper-slide .buttons .btn-contact {
            border-color: #28a745;
            color: #28a745;
        }

        .swiper-slide .buttons .btn-contact:hover {
            background: #28a745;
            color: #fff;
        }

        /* Pagination dots */
        .swiper-pagination-bullet {
            background: #333;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .swiper-slide h2 {
                font-size: 3rem;
            }

            .swiper-slide p {
                font-size: 1rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <h2>Welcome to LinkrVibe</h2>
                <p>Experience a seamless platform for product shopping and exclusive services. Trust us to deliver excellence.</p>
                <div class="buttons">
                    <a href="{{ route('services') }}" class="btn-learn">Learn More</a>
                    <a href="{{ route('contact') }}" class="btn-contact">Contact Now</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <h2>Discover Our Services</h2>
                <p>We provide customized solutions tailored to your needs, ensuring quality and satisfaction every step of the way.</p>
                <div class="buttons">
                    <a href="{{ route('services') }}" class="btn-learn">Learn More</a>
                    <a href="{{ route('contact') }}" class="btn-contact">Contact Now</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
                <h2>Why Choose Us?</h2>
                <p>Our commitment to innovation and customer satisfaction sets us apart, building trust and delivering results.</p>
                <div class="buttons">
                    <a href="{{ route('services') }}" class="btn-learn">Learn More</a>
                    <a href="{{ route('contact') }}" class="btn-contact">Contact Now</a>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 5000, // Change slides every 5 seconds
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>
</html>

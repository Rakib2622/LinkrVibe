@include('frontend.partial.header')

{{-- Main Content --}}
<div class="digital-menu-board">
    {{-- Slider Section --}}
    <div class="slider" style="display: flex; align-items: center; background: linear-gradient(to right, rgb(250, 250, 250), white); padding: 10px;">
        <div class="slider-text" style="flex: 1; color: white;">
            <h1 style="font-size: 2.5em; font-weight: bold; margin-bottom: 20px;">Transform Your Restaurant’s Menu with a Custom Digital Menu Board!</h1>
            <p style="font-size: 1.2em; margin-bottom: 30px;">Digital menu is clean, easy to read, and provides an interactive experience for diners. Custom Digital Menu Board Design Service for Restaurants, Contact Now</p>
            <button onclick="contactNow()" style="background: rgb(239, 97, 25); color: rgb(253, 253, 253); border: none; padding: 10px 20px; font-size: 1.2em; font-weight:bold; cursor: pointer; border-radius: 8px; transition: all 0.3s ease;" onmouseover="this.style.background='orange'; this.style.color='white';" onmouseout="this.style.background='white'; this.style.color='orange';">
                Contact Now
            </button>
        </div>
        <div class="slider-image" style="flex: 1; text-align: right;">
            <img src="\home\assets\images\dmb\menuslider.gif" alt="Digital Menu Board" style="max-width: 100%; height: auto;">
        </div>
    </div>

    {{-- Completed Jobs Section --}}
    <div class="completed-jobs" style="padding: 10px; text-align: center;">
        <h2 style="font-size: 1.5em; color: orange;">Our Completed Jobs</h2>
        <h1 style="font-size: 2em; margin-top: 10px;">Feature Projects</h1>
        <p style="font-size: 1.2em; margin-top: 20px; max-width: 900px; margin-left: auto; margin-right: auto;">
            Upgrade your restaurant’s visual appeal and engage customers with our custom digital menu board designs! We offer eye-catching images and animation videos tailored to showcase your food menu in a modern, dynamic way.
        </p>
        <div id="gallery" style="display: grid; gap: 20px;">
            @foreach ($galleryImages as $image)
                <div class="gallery-item" style="position: relative; overflow: hidden;">
                    <img src="{{ $image }}" alt="Job Image" style="width: 100%; height: auto; transition: transform 0.3s ease;">
                    <div class="search-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 2em; color: white; background: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 50%; opacity: 0; transition: opacity 0.3s;">
                        <i class="fa fa-search"></i> <!-- Use FontAwesome for the search icon -->
                    </div>
                </div>
            @endforeach
        </div>
        <button id="load-more-btn" onclick="loadMore()" style="margin-top: 20px; background: orange; color: white; border: none; padding: 10px 20px; font-size: 1em; cursor: pointer;">Load More</button>
        <button id="see-less-btn" onclick="seeLess()" style="margin-top: 20px; background: orange; color: white; border: none; padding: 10px 20px; font-size: 1em; cursor: pointer; display: none;">See Less</button>
    </div>

    {{-- Animation Video Section --}}
    <div class="animation-video" style="padding: 10px; text-align: center; background-color: #f9f9f9;">
        <h2 style="font-size: 1.2em; margin-bottom: 20px;">Watch Our Animated Video Menu</h2>
        <video controls style="width: 100%; max-width: 100%; height: auto; object-fit: contain;">
            <source src="/home/assets/images/dmb/digitalboard/vid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Testimonials Section --}}
    <div class="testimonials" style="padding: 10px; margin-top:10px; text-align: center; background-color: #e6e6e6;">
        <h2 style="font-size: 2em; margin-bottom: 20px;">What Our Clients Say</h2>
        <div class="testimonial-slider" style="display: flex; overflow-x: scroll; gap: 20px; padding: 20px;">
            @foreach ($testimonials as $testimonial)
                <div style="min-width: 300px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <p style="font-size: 1.2em;">{{ $testimonial['message'] }}</p>
                    <strong>- {{ $testimonial['name'] }}</strong>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    let galleryImages = [
        '/home/assets/images/dmb/digitalboard/1.png',
        '/home/assets/images/dmb/digitalboard/2.png',
        '/home/assets/images/dmb/digitalboard/3.png',
        '/home/assets/images/dmb/digitalboard/4.png',
        '/home/assets/images/dmb/digitalboard/5.png',
        '/home/assets/images/dmb/digitalboard/6.png',
    ];  // Example images, replace this with the actual data passed from the backend

    let imageIndex = 0; // Global variable to store the current image index

    // Hover effect to show search icon
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const icon = item.querySelector('.search-icon');
            icon.style.opacity = 1;
        });
        item.addEventListener('mouseleave', () => {
            const icon = item.querySelector('.search-icon');
            icon.style.opacity = 0;
        });

        item.querySelector('.search-icon').addEventListener('click', () => {
            const imgSrc = item.querySelector('img').src;
            previewImage(imgSrc);
        });
    });

    function contactNow() {
        window.location.href = '/contact';
    }

    // Preview Image with Next and Prev buttons
    function previewImage(src) {
        imageIndex = galleryImages.indexOf(src); // Get the index of the clicked image

        const modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.background = 'rgba(0, 0, 0, 0.8)';
        modal.style.display = 'flex';
        modal.style.alignItems = 'center';
        modal.style.justifyContent = 'center';

        const img = document.createElement('img');
        img.src = src;
        img.style.maxWidth = '90%';
        img.style.maxHeight = '90%';
        img.style.objectFit = 'contain';

        // Next button
        const nextButton = document.createElement('button');
        nextButton.textContent = 'Next';
        nextButton.style.position = 'absolute';
        nextButton.style.right = '10px';
        nextButton.style.top = '50%';
        nextButton.style.zIndex = '10';
        nextButton.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        nextButton.style.padding = '10px';
        nextButton.addEventListener('click', () => {
            imageIndex = (imageIndex + 1) % galleryImages.length; // Loop back to the first image
            img.src = galleryImages[imageIndex];
        });

        // Prev button
        const prevButton = document.createElement('button');
        prevButton.textContent = 'Prev';
        prevButton.style.position = 'absolute';
        prevButton.style.left = '10px';
        prevButton.style.top = '50%';
        prevButton.style.zIndex = '10';
        prevButton.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        prevButton.style.padding = '10px';
        prevButton.addEventListener('click', () => {
            imageIndex = (imageIndex - 1 + galleryImages.length) % galleryImages.length; // Loop to the last image
            img.src = galleryImages[imageIndex];
        });

        modal.appendChild(prevButton);
        modal.appendChild(nextButton);
        modal.appendChild(img);
        document.body.appendChild(modal);

        modal.addEventListener('click', () => {
            document.body.removeChild(modal);
        });
    }

    // Load More Images
    function loadMore() {
        const gallery = document.getElementById('gallery');
        const moreImages = [
            '/home/assets/images/dmb/digitalboard/7.png',
            '/home/assets/images/dmb/digitalboard/8.png',
            '/home/assets/images/dmb/digitalboard/9.png',
            '/home/assets/images/dmb/digitalboard/10.png',
            '/home/assets/images/dmb/digitalboard/11.png',
            '/home/assets/images/dmb/digitalboard/12.png',
            '/home/assets/images/dmb/digitalboard/13.png',
            '/home/assets/images/dmb/digitalboard/15.png',
            '/home/assets/images/dmb/digitalboard/17.png',
            '/home/assets/images/dmb/digitalboard/18.png',
            '/home/assets/images/dmb/digitalboard/6.png',
            '/home/assets/images/dmb/digitalboard/2.png',
        ];
        moreImages.forEach(image => {
            const div = document.createElement('div');
            div.classList.add('gallery-item');
            div.style.position = 'relative';
            div.style.overflow = 'hidden';

            const img = document.createElement('img');
            img.src = image;
            img.alt = 'Job Image';
            img.style.width = '100%';
            img.style.height = 'auto';

            div.appendChild(img);
            gallery.appendChild(div);

            // Add hover effect and search icon
            div.addEventListener('mouseenter', () => {
                const icon = div.querySelector('.search-icon');
                icon.style.opacity = 1;
            });
            div.addEventListener('mouseleave', () => {
                const icon = div.querySelector('.search-icon');
                icon.style.opacity = 0;
            });

            const icon = document.createElement('div');
            icon.classList.add('search-icon');
            icon.style.position = 'absolute';
            icon.style.bottom = '10px';
            icon.style.right = '10px';
            icon.style.color = '#fff';
            icon.style.fontSize = '24px';
            icon.style.opacity = '0';
            icon.style.transition = 'opacity 0.3s';
            icon.innerHTML = '🔍'; // You can use any icon here

            div.appendChild(icon);

            icon.addEventListener('click', () => {
                previewImage(image);
            });
        });

        // Check if all images are loaded
        if (gallery.children.length > 12) {  // Adjust as per the number of initial images
            document.getElementById('load-more-btn').style.display = 'none';
            document.getElementById('see-less-btn').style.display = 'inline-block';
        }
    }

    // See Less Images
    function seeLess() {
        const gallery = document.getElementById('gallery');
        while (gallery.children.length > 6) {  // Adjust the number to show after clicking "See Less"
            gallery.removeChild(gallery.lastChild);
        }

        document.getElementById('load-more-btn').style.display = 'inline-block';
        document.getElementById('see-less-btn').style.display = 'none';
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

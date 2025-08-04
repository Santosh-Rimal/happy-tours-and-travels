<div class="container py-12 max-w-6xl mx-auto px-6 mb-20 mt-[120px]">
    <!-- Gallery Header -->
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold">Gallery</h1>
        <a href="{{ route('frontend.gallery') }}"
            class="bg-blue-500 hover:bg-blue-900 px-4 py-4 rounded-lg cursor-pointer hover:text-white text-gray-900 text-base transition-colors duration-300">
            View All
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 md:mt-20">
        @foreach ($galleries as $index => $gallery)
            <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out cursor-pointer"
                onclick="openLightbox('{{ asset('storage/' . $gallery->image) }}', this)">
                <!-- Image with overlay effect -->
                <div class="relative overflow-hidden h-64">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        loading="lazy">
                    
                    <!-- Content Overlay (shown on hover) -->
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-xl font-bold text-white mb-2">{{ $gallery->title }}</h3>
                            @if ($gallery->caption)
                                <p class="text-gray-200 text-sm mb-3">{{ $gallery->caption }}</p>
                            @endif
                           
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        @endforeach
    </div>

    <!-- Smooth Lightbox -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4 cursor-pointer"
        onclick="closeLightbox()">
        <button onclick="closeLightbox()"
            class="absolute top-6 right-6 text-white hover:text-gray-300 focus:outline-none z-10 transition-opacity hover:opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="max-w-full max-h-full flex justify-center items-center">
            <img id="lightbox-image"
                class="max-w-[90vw] max-h-[90vh] object-contain transform transition-all duration-500 ease-[cubic-bezier(0.2,0.85,0.4,1.3)]"
                src="" alt="">
        </div>
    </div>
</div>

<script>
    let currentImageElement = null;
    let initialImageRect = null;

    function openLightbox(imageSrc, clickedElement) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');

        // Store clicked image element and its position
        currentImageElement = clickedElement.querySelector('img');
        initialImageRect = currentImageElement.getBoundingClientRect();

        // Set initial state (mimic the thumbnail position/size)
        lightboxImage.src = imageSrc;
        lightboxImage.style.width = `${initialImageRect.width}px`;
        lightboxImage.style.height = `${initialImageRect.height}px`;
        lightboxImage.style.left = `${initialImageRect.left}px`;
        lightboxImage.style.top = `${initialImageRect.top}px`;
        lightboxImage.style.position = 'fixed';
        lightboxImage.style.transformOrigin = 'top left';

        // Show lightbox background (transparent at first)
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        lightbox.style.opacity = '0';
        document.body.style.overflow = 'hidden';

        // Force layout before animations
        void lightbox.offsetWidth;

        // Animate background fade in
        lightbox.style.opacity = '1';

        // Calculate final position
        const viewportWidth = window.innerWidth;
        const viewportHeight = window.innerHeight;
        const imageRatio = initialImageRect.width / initialImageRect.height;

        let finalWidth = Math.min(initialImageRect.width * 3, viewportWidth * 0.9);
        let finalHeight = finalWidth / imageRatio;

        if (finalHeight > viewportHeight * 0.9) {
            finalHeight = viewportHeight * 0.9;
            finalWidth = finalHeight * imageRatio;
        }

        const finalLeft = (viewportWidth - finalWidth) / 2;
        const finalTop = (viewportHeight - finalHeight) / 2;

        // Animate image expansion
        lightboxImage.style.transition = 'all 500ms cubic-bezier(0.2, 0.85, 0.4, 1.3)';
        lightboxImage.style.width = `${finalWidth}px`;
        lightboxImage.style.height = `${finalHeight}px`;
        lightboxImage.style.left = `${finalLeft}px`;
        lightboxImage.style.top = `${finalTop}px`;

        // After animation completes, reset to normal lightbox state
        setTimeout(() => {
            lightboxImage.style.position = '';
            lightboxImage.style.left = '';
            lightboxImage.style.top = '';
            lightboxImage.style.width = '';
            lightboxImage.style.height = '';
        }, 500);
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');

        if (!currentImageElement || !initialImageRect) return;

        // Store current lightbox image position
        const currentRect = lightboxImage.getBoundingClientRect();

        // Set up for shrink animation
        lightboxImage.style.position = 'fixed';
        lightboxImage.style.left = `${currentRect.left}px`;
        lightboxImage.style.top = `${currentRect.top}px`;
        lightboxImage.style.width = `${currentRect.width}px`;
        lightboxImage.style.height = `${currentRect.height}px`;

        // Animate background fade out
        lightbox.style.opacity = '0';

        // Animate image shrinking back to thumbnail position
        lightboxImage.style.transition = 'all 400ms cubic-bezier(0.4, 0, 0.2, 1)';
        lightboxImage.style.width = `${initialImageRect.width}px`;
        lightboxImage.style.height = `${initialImageRect.height}px`;
        lightboxImage.style.left = `${initialImageRect.left}px`;
        lightboxImage.style.top = `${initialImageRect.top}px`;

        // After animation completes, hide everything
        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            lightbox.style.opacity = '';
            document.body.style.overflow = '';

            // Reset image styles
            lightboxImage.style.position = '';
            lightboxImage.style.left = '';
            lightboxImage.style.top = '';
            lightboxImage.style.width = '';
            lightboxImage.style.height = '';
            lightboxImage.style.transition = '';
        }, 400);
    }

    // Close with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>

<style>
    /* Smooth transitions for all elements */
    * {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Magnifying glass hover effect */
    .group:hover svg {
        transform: scale(1.1);
    }

    /* Lightbox animations */
    #lightbox {
        transition: opacity 300ms ease;
    }
</style>
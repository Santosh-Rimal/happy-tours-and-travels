<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Happy Tours and Travels</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @vite('resources/css/app.css', 'resources/js/app.js')

    <style>
        html {
            scroll-behavior: smooth;
        }

        .accordion-content,
        .readmore-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }

        .transition-height {
            transition: max-height 0.3s ease;
            overflow: hidden;
        }

        .max-h-0 {
            max-height: 0;
        }

        .max-h-96 {
            max-height: 24rem;
        }

        body {
            padding-top: 4rem;
            /* Main header height - matches h-16 */
        }

        .secondary-nav.sticky {
            top: 4rem;
            /* Same as main header height */
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .hamburger-line {
            @apply block w-6 h-0.5 bg-gray-600 transition-all duration-300;
        }

        .hamburger-active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger-active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        .mobile-menu {
            @apply md:hidden absolute top-full left-0 right-0 bg-white shadow-lg overflow-hidden transition-all duration-300 max-h-0;
        }

        .mobile-menu.active {
            max-height: 500px;
            /* Adjust based on your content */
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800">
    <!-- Main Header (Always Fixed) -->
    @includeIf('layouts.frontend.header')

    @yield('content')

    <!-- Hero Section -->

    <!-- Secondary Navbar (Becomes sticky below main header) -->

    @includeIf('layouts.frontend.footer')

    <script>
        const menuToggle = document.getElementById("menuToggle");
        const mobileMenu = document.getElementById("mobileMenu");
        const mobileOverlay = document.getElementById("mobileOverlay");

        //Track whether menu is open or closed
        let isMenuOpen = false;

        menuToggle.addEventListener("click", () => {
            isMenuOpen = !isMenuOpen;

            if (isMenuOpen) {
                mobileMenu.classList.remove("max-h-0");
                mobileMenu.classList.add("max-h-[1000px]");
                mobileOverlay.classList.remove("hidden");
            } else {
                mobileMenu.classList.add("max-h-0");
                mobileMenu.classList.remove("max-h-[1000px]");
                mobileOverlay.classList.add("hidden");

                // Auto-close all open submenus
                document.querySelectorAll(".inner-bhutan-list").forEach((list) => {
                    list.classList.remove("max-h-96");
                    list.classList.add("max-h-0");
                });


                // Reset "+" buttons
                document.querySelectorAll('.toggle-inner-list').forEach(btn => {
                    btn.textContent = "+";
                });

                // Close top-level Nepal/Bhutan containers
                document.querySelectorAll('#mobileMenu > ul > li > div').forEach(submenu => {
                    submenu.classList.add("hidden");
                });

                // Reset rotate arrows
                document.querySelectorAll('#mobileMenu > ul > li > button svg').forEach(arrow => {
                    arrow.classList.remove("rotate-180");
                });

            }
        });

        mobileOverlay.addEventListener("click", () => {
            if (isMenuOpen) menuToggle.click();
        });

        //Toggle submenus
        document.querySelectorAll("#mobileMenu button").forEach((button) => {
            button.addEventListener("click", () => {
                const submenu = button.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle("hidden");
                }

                //Rotate arrow icon
                const arrow = button.querySelector("svg");
                if (arrow) {
                    arrow.classList.toggle("rotate-180");
                }
            });
        });

        //handle + inside Bhuran submenu
        document.querySelectorAll(".toggle-inner-list").forEach((toggleBtn) => {
            toggleBtn.addEventListener("click", (e) => {
                e.stopPropagation(); //Prevent outer button from being triggered

                const ulList = toggleBtn.parentElement.nextElementSibling;
                if (ulList) {
                    ulList.classList.toggle("max-h-0");
                    ulList.classList.toggle("max-h-96");
                    // Optionally change "+" to "-" when expanded
                    toggleBtn.textContent = ulList.classList.contains("max-h-0") ?
                        "+" :
                        "−";
                }
            });
        });

        const swiper = new Swiper(".swiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Accordion Toggle
        const toggles = document.querySelectorAll(".accordion-toggle");

        toggles.forEach((toggle) => {
            toggle.addEventListener("click", () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector(".icon");

                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.textContent = "+";
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.textContent = "−";
                }
            });
        });

        // Read More / Less Toggle
        const readmoreBtn = document.getElementById("readmore-btn");
        const readmoreContent = document.querySelector(".readmore-content");

        readmoreBtn.addEventListener("click", () => {
            if (readmoreContent.style.maxHeight) {
                readmoreContent.style.maxHeight = null;
                readmoreBtn.textContent = "Read more";
            } else {
                readmoreContent.style.maxHeight = readmoreContent.scrollHeight + "px";
                readmoreBtn.textContent = "Read less";
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const secondaryNav = document.getElementById("secondary-nav");
            const heroSection = document.querySelector("section");
            const mobileMenuButton = document.getElementById("mobile-menu-button");
            const mobileMenu = document.getElementById("mobile-menu");

            // Sticky secondary nav
            function handleScroll() {
                if (window.scrollY >= heroSection.offsetHeight) {
                    secondaryNav.classList.add("sticky", "z-40", "shadow-md");
                } else {
                    secondaryNav.classList.remove("sticky", "z-40", "shadow-md");
                }
            }

            // Mobile menu toggle
            mobileMenuButton.addEventListener("click", function() {
                this.classList.toggle("hamburger-active");
                mobileMenu.classList.toggle("active");
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll("#mobile-menu a").forEach((link) => {
                link.addEventListener("click", () => {
                    mobileMenuButton.classList.remove("hamburger-active");
                    mobileMenu.classList.remove("active");
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href");
                    if (targetId === "#") return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const headerOffset = 80; // Height of both headers when sticky
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition =
                            elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth",
                        });
                    }
                });
            });

            window.addEventListener("scroll", handleScroll);
            window.addEventListener("resize", handleScroll);

            // Initialize
            handleScroll();
        });

        function toggleDetails(button) {
            const content = button.parentElement.nextElementSibling;
            content.classList.toggle("hidden");

            button.textContent = content.classList.contains("hidden") ? "+" : "-";
        }

        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("whats-included");

            container.addEventListener("click", function(event) {
                if (event.target.classList.contains("toggle-icon")) {
                    const icon = event.target;
                    const block = icon.closest(".itinerary-block");
                    const content = block.querySelector(".toggle-content");

                    content.classList.toggle("hidden");
                    icon.textContent = content.classList.contains("hidden") ? "+" : "-";
                }
            });
        });


        

    </script>
</body>

</html>

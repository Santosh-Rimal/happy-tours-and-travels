<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <title>Happy Tours and Travel</title>

    @vite('resources/css/app.css', 'resources/js/app.js')

    <style>
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
    </style>
</head>

<body class="bg-white">
    <!-- header.html -->
    @includeIf('layouts.frontend.header')

    @yield('content')

    @includeIf('layouts.frontend.footer')

    <!-- Toggle Script -->
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
</body>

</html>

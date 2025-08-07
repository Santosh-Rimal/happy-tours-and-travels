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
        


                // Reset "+" buttons
                document.querySelectorAll('.toggle-inner-list').forEach(btn => {
                    btn.textContent = "+";
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

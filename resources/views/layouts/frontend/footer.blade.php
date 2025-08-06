<footer class="bg-[#2c3440] text-white py-10 px-6 md:px-20 ">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-10 ">
            <!-- Useful Links -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Useful Links</h2>
                <ul class="space-y-2">
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.about') }}">About Company</a></li>
                    <li>
                        <a class="hover:text-blue-400" href="#">Recommendation Packages</a>
                    </li>
                </ul>
            </div>

            <!-- Middle Links -->
            <div>
                <ul class="space-y-2 mt-10 sm:mt-0">
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.destination') }}">Destinations</a></li>
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.gallery') }}">Photos</a></li>
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.customize.trip') }}">Customize Trip</a>
                    </li>
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.contact.us') }}">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <ul class="space-y-2 mt-10 sm:mt-0">
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.travel.guide') }}">Travel Guide</a></li>
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.video') }}">Videos</a></li>
                    <li><a class="hover:text-blue-400" href="{{ route('frontend.blogs') }}">Blogs</a></li>
                    <li>
                        <a class="hover:text-blue-400" href="{{ route('frontend.corporate_responsibility') }}">Corporate
                            Social Responsibilities</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h2 class="text-lg font-semibold mb-4">
                    Hamro Tours & Travel P. Ltd
                </h2>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-2">
                        <span>📍</span>
                        Bharatpur - 4, Chitwan Nepal
                    </li>
                    <li class="flex items-center gap-2">
                        <span>📧</span>
                        <a class="hover:text-blue-400" href="mailto:tibethet@mos.com.np">hamrotours@gmail.com</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <span>📞</span>
                        <a class="hover:text-blue-400" href="tel:+97714985195">+977 1 26374695</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <span>📱</span>
                        <a class="hover:text-blue-400" href="tel:+9779851006023">+977 9878506023</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Social & Payment -->
        <div class="flex flex-col sm:flex-row justify-between items-center border-t border-gray-600 pt-6">
            <div class="flex items-center space-x-3 mb-4 sm:mb-0">
                <span class="font-semibold">Stay Connected:</span>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/facebook-new.png"
                        alt="Facebook" /></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/twitter.png"
                        alt="Twitter" /></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/youtube-play.png"
                        alt="YouTube" /></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/ffffff/instagram-new.png"
                        alt="Instagram" /></a>
            </div>

            <div class="flex items-center space-x-2">
                <span class="font-semibold">Pay Online</span>
                <img src="https://img.icons8.com/color/36/visa.png" alt="Visa" />
                <img src="https://img.icons8.com/color/36/amex.png" alt="Amex" />
                <img src="https://img.icons8.com/color/36/mastercard-logo.png" alt="Mastercard" />
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center text-sm text-gray-400 mt-6">
            © Copyright 2025 - Hamro Tours & Travel P. Ltd All Rights
            Reserved.
        </div>
    </div>
</footer>
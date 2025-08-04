<section class="py-12 px-6 text-center bg-white text-gray-800 max-w-6xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold mb-10">We are Affiliated & Partners</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 place-items-center justify-center">

            @forelse ($affilatedPartners as $key=>$affilatedPartner)
                <div class="flex items-center justify-center text-start  space-x-8">
                    <img src="{{ asset('storage/' . $affilatedPartner->image) }}" alt=""
                        class="w-16 h-16 mb-2 rounded-full" />
                    <p class="text-sm">{{ $affilatedPartner->description }}</p>
                </div>

            @empty

                <p class="text-red-500 font-bold">No Affiliated Partners Found</p>
            @endforelse

            <!-- 1. Government of Nepal -->




        </div>
    </section>
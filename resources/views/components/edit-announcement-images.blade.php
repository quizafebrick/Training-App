<div class="mx-5">
    <div id="controls-carousel" class="relative w-full bg-gray-300">
        <div class="mx-5">
            {{-- * CAROUSEL WRAPPER * --}}
            <div id="controls-carousel" class="relative w-3/4 mx-auto">
                <div class="flex items-center justify-center mx-5">
                    {{-- * CAROUSEL WRAPPER * --}}
                    <div class="relative overflow-hidden rounded-lg w-96">
                        <div class="flex transition-transform duration-300 carousel-slides">
                            @foreach ($images as $index => $image)
                                <div class="w-full carousel-slide {{ $index === 0 ? 'visible' : 'hidden' }}">
                                    <div class="aspect-w-16 aspect-h-9">
                                        <img src="{{ asset('images/' . $image->image) }}" alt="{{ $image->alt_text }}"
                                            class="object-contain w-full h-full" loading="lazy">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- * SLIDER INDICATOR * --}}
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    @foreach ($images as $index => $image)
                        <button type="button" onclick="showSlide({{ $index }})"
                            class="md:w-3 md:h-3 w-2 h-2 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-gray-500' }} carousel-indicator"></button>
                    @endforeach
                </div>
                {{-- * SLIDER CONTROLS * --}}
                <button type="button" onclick="prevSlide()"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 text-white md:ml-5 md:w-12 md:h-12">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 101.06-1.06l-1.72-1.72h5.69a.75.75 0 000-1.5h-5.69l1.72-1.72a.75.75 0 00-1.06-1.06l-3 3z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <button type="button" onclick="nextSlide()"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 text-white md:mr-5 md:w-12 md:h-12">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

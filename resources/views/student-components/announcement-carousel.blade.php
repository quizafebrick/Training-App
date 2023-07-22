@foreach ($activeAnnouncements as $announcement)
    <div class="p-5 mx-5 mt-5 mb-10 border-2 border-black md:p-0 md:mx-80">
        <div class="flex items-center justify-center instagram-container">
            <div class="py-2 my-5 mb-10 bg-gray-300 mx:5 instagram-box">
                <div class="flex items-center justify-center mx-5 md:mx-3">
                    <div class="w-full p-3 rounded-lg outline outline-0">
                        <h3>{{ $announcement->title }}</h3>
                        <p>{{ $announcement->content }}</p>

                        {{-- * DISPLAY THE IMAGES FOR THIS ANNOUNCEMENT * --}}
                        <div id="carousel-{{ $announcement->id }}" class="relative bg-white rounded-lg shadow-lg">
                            <div class="mx-5">
                                <div class="relative flex items-center h-80 carousel-mask">
                                    @forelse ($announcement->images as $index => $image)
                                        <div
                                            class="absolute w-full h-full transition-transform duration-300 carousel-slide {{ $index !== 0 ? 'opacity-0' : 'opacity-100' }}">
                                            <img src="{{ asset('images/' . $image->image) }}"
                                                alt="{{ $image->alt_text }}"
                                                class="object-contain w-full h-full rounded-lg">
                                        </div>
                                    @empty
                                        <div
                                            class="absolute w-full h-full transition-transform duration-300 carousel-slide">
                                            <p>No images available for this announcement.</p>
                                        </div>
                                    @endforelse
                                </div>

                                {{-- * CAROUSEL INDICATORS ABSOLUTELY POSITIONED * --}}
                                <div class="flex items-center justify-center">
                                    <div class="absolute flex items-center justify-center bottom-8">
                                        @for ($i = 0; $i < count($announcement->images); $i++)
                                            <div class="w-5 h-5 rounded-full carousel-indicator {{ $i !== 0 ? 'bg-white' : 'bg-black' }}"
                                                onclick="showSlide('carousel-{{ $announcement->id }}', {{ $i }})">
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            {{-- * SLIDER CONTROLS * --}}
                            <button type="button" onclick="prevSlide('carousel-{{ $announcement->id }}')"
                                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-8 h-8 ml-2 text-white md:w-12 md:h-12">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 10-1.06-1.06l-1.72-1.72h5.69a.75.75 0 000-1.5h-5.69l1.72-1.72a.75.75 0 00-1.06-1.06l-3 3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <button type="button" onclick="nextSlide('carousel-{{ $announcement->id }}')"
                                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none nextBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-8 h-8 mr-2 text-white md:w-12 md:h-12">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

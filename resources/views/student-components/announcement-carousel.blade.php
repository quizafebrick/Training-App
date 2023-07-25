@php
    $announcementCount = 0;
    $totalAnnouncements = count($activeAnnouncements);
@endphp

@foreach ($activeAnnouncements as $announcement)
    {{-- * FOR GRID COLUMN START DIV * --}}
    @if ($announcementCount % 2 === 0)
        {{-- * IT CENTERED THE LAST ANNOUNCEMENT(IN ROW) IF IT'S ALL ALONE * --}}
        {{-- * ELSE; IT CONTINUES THE GRID-COLS-2 * --}}
        <div
            class="{{ $loop->last && $totalAnnouncements % 2 !== 0 ? 'col-span-2 md:col-start-1 md:col-end-3' : 'grid md:grid-cols-2 grid-cols-1' }}">
    @endif

    <div class="p-1 mx-0 mt-0 mb-0 rounded-lg md:mt-5 md:mb-0 md:p-0">
        <div class="flex items-center justify-center instagram-container">
            <div class="py-2 my-5 mb-10 border border-slate-400 bg-slate-100 mx:5 instagram-box">
                <div class="flex items-center justify-center mx-5 md:mx-3">
                    <div class="w-full p-3 text-white rounded-lg outline outline-0">

                        {{-- * DISPLAY THE IMAGES FOR THIS ANNOUNCEMENT * --}}
                        <div id="carousel-{{ $announcement->id }}" class="relative rounded-lg bg-slate-100">
                            <div class="mx-5">
                                <div class="relative flex h-80 carousel-mask">
                                    @forelse ($announcement->images as $index => $image)
                                        <div
                                            class="absolute w-full h-full transition-transform duration-300 carousel-slide {{ $index !== 0 ? 'opacity-0' : 'opacity-100' }}">
                                            <img src="{{ asset('images/' . $image->image) }}"
                                                alt="{{ $image->alt_text }}" class="object-contain w-full h-full">
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
                                    class="w-8 h-8 ml-2 text-black md:w-12 md:h-12">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 101.06-1.06l-1.72-1.72h5.69a.75.75 0 000-1.5h-5.69l1.72-1.72a.75.75 0 00-1.06-1.06l-3 3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <button type="button" onclick="nextSlide('carousel-{{ $announcement->id }}')"
                                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none nextBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-8 h-8 mr-2 text-black md:w-12 md:h-12">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <hr class="mt-5 border-slate-400 border-1">

                        {{-- * ANNOUNCEMENT TITLE, CONTENT & TIME(READABLE FOR HUMAN) * --}}
                        <div class="text-black">
                            <div class="mt-5 text-xs text-gray-500 text-end">
                                <div class="flex items-center justify-end">
                                    {{ \Carbon\Carbon::parse($announcement->created_at)->diffForHumans() }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4 ml-1">
                                        <path
                                            d="M15.75 8.25a.75.75 0 01.75.75c0 1.12-.492 2.126-1.27 2.812a.75.75 0 11-.992-1.124A2.243 2.243 0 0015 9a.75.75 0 01.75-.75z" />
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM4.575 15.6a8.25 8.25 0 009.348 4.425 1.966 1.966 0 00-1.84-1.275.983.983 0 01-.97-.822l-.073-.437c-.094-.565.25-1.11.8-1.267l.99-.282c.427-.123.783-.418.982-.816l.036-.073a1.453 1.453 0 012.328-.377L16.5 15h.628a2.25 2.25 0 011.983 1.186 8.25 8.25 0 00-6.345-12.4c.044.262.18.503.389.676l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.575 15.6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="mt-1">{{ $announcement->title }}</h3>
                            <div class="mt-5 text-justify">
                                <div class="announcement-summary">
                                    @php
                                        $firstThreeSentences = \App\Helper\AnnouncementHelper::getFirstThreeSentences($announcement->content);
                                        $remainingContent = substr($announcement->content, strlen($firstThreeSentences));
                                        $hasMoreThanThreeSentences = count(explode('.', $remainingContent)) > 3;
                                    @endphp

                                    @if ($hasMoreThanThreeSentences)
                                        {!! $firstThreeSentences !!}
                                        <div class="hidden whitespace-pre-line announcement-content">
                                            {!! $remainingContent !!}
                                        </div>
                                        <a href="#" class="mt-1 text-blue-500 see-more"
                                            onclick="toggleContent(event, this)">
                                            See more
                                        </a>
                                        <a href="#" class="hidden mt-1 text-blue-500 see-less"
                                            onclick="toggleContent(event, this)">
                                            See less...
                                        </a>
                                    @else
                                        {!! $announcement->content !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- * (SMALLER SCREEN) FIND THE LAST ANNOUNCEMENT AND SO THE VERTICAL LINE WILL BE REMOVED * --}}
    @if (!$loop->last)
        <hr class="flex border-slate-400 border-1 md:hidden">
    @endif

    {{-- * (MEDIUM-LARGER SCREEN) FOR GRID COLUMN END DIV* --}}
    @if ($announcementCount % 2 === 1 || $loop->last)
        </div>
        {{-- * FIND THE LAST ANNOUNCEMENT AND SO THE VERTICAL LINE WILL BE REMOVED * --}}
        @if (!$loop->last)
            <hr class="hidden border-slate-400 border-1 md:flex">
        @endif
    @endif

    @php
        $announcementCount++;
    @endphp
@endforeach

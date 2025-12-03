<header class="my-4 pt-4 sticky top-0 z-50 bg-white">

    <div class="md:flex space-y-4 justify-between items-center gap-8 container pb-4">
        <img class="h-[60px] md:h-[80px]" src="https://jawaaf.com/storage/01JTAR172JR8ZT7NTGZQX93FTB.png" alt="">

        <a href="" class="flex-grow ">
            <img class="w-full h-[96px] md:h-[116px] object-cover"
                src="https://imgs.search.brave.com/TBBMavShAbtaOYRv-TGIldbiky00xV7gFuA91lE5-7U/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9maXZl/cnItcmVzLmNsb3Vk/aW5hcnkuY29tL3Zp/ZGVvL3VwbG9hZC9z/b18wLjI1MDE1MSx0/X2dpZ19jYXJkc193/ZWIvcTJ4dXRyaWFn/YWVrOHdlcmgwZ2gu/cG5n"
                alt="">
        </a>

        <div>
            <p class="text-lg">
                {{ toNepaliDate(now()) }}
            </p>
            <img class="h-[14px]" src="https://jawaaf.com/frontend/images/redline.png" alt="">
        </div>
    </div>

    <nav class="bg-primary py-2 text-white">
        <div class="container md:flex justify-between space-y-4 md:space-y-0 items-center">
            <div class="flex overflow-x-auto gap-10 py-2 md:py-0">
                <a href="">Home</a>
                @foreach ($categories as $category)
                    <a href="">{{ $category->title }}</a>
                @endforeach
            </div>
            <div>

                <form class="max-w-md mx-auto">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search"
                            class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)] shadow-xs placeholder:text-body"
                            placeholder="Search" required />
                        <button type="button"
                            class="absolute end-1.5 bottom-1.5 text-white bg-[var(--primary-color)] hover:bg-[var(--primary-color)]-strong box-border border border-transparent focus:ring-4 focus:ring-[var(--primary-color)]-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>
                    </div>
                </form>

            </div>
        </div>
    </nav>

</header>

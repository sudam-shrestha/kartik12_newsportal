<x-frontend-layout>
    <section>
        <div class="container pb-8">
            <a href="">
                <div class="shadow-lg p-4 rounded-lg overflow-hidden">
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold mb-2">{{ $latest_news->title }}</h1>
                    <img class="w-full" src="{{ asset($latest_news->image) }}" alt="{{ $latest_news->title }}">
                </div>
            </a>
        </div>
    </section>

    <section>
        <div class="container grid md:grid-cols-3 gap-6 py-8">
            @php
                $first = $articles->first();
                $others = $articles->skip(1);
            @endphp

            <div class="md:col-span-2">
                <a href="">
                    <div class="shadow-md rounded-md overflow-hidden">
                        <img class="w-full h-[300px] object-cover" src="{{ asset($first->image) }}"
                            alt="{{ $first->title }}">
                        <div class="p-3">
                            <h2 class="text-lg md:text-xl lg:text-2xl font-semibold line-clamp-1">
                                {{ $first->title }}
                            </h2>
                            <div class="text-sm line-clamp-2">
                                {!! $first->description !!}
                            </div>
                        </div>
                    </div>
                </a>

                <div class="grid md:grid-cols-2 gap-4 mt-6">
                    @foreach ($others as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
            </div>

            <div class="space-y-4">
                <h2
                    class="text-2xl py-2 border-l-4 border-[var(--primary-color)] pl-2 font-semibold text-primary bg-[var(--light-primary-color)]">
                    ट्रेन्डिङ</h2>
                @foreach ($trending_articles as $trending)
                    <div>
                        <x-article-card :article="$trending" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section>
        <div class="container py-8 space-y-8">

            @foreach ($categories as $category)
                <h2
                    class="text-2xl py-2 border-l-4 border-[var(--primary-color)] pl-2 font-semibold text-primary bg-[var(--light-primary-color)]">
                    {{ $category->title }}</h2>


                <div class="grid md:grid-cols-3 gap-6 ">
                    @php
                        $category_first = $category->articles()->orderBy('id','desc')->first();
                        $category_others = $category->articles()->orderBy('id','desc')->skip(1)->take(4)->get();
                        $side_articles = $category->articles()->orderBy('id','desc')->skip(5)->take(7)->get();
                    @endphp

                    <div class="md:col-span-2">
                        <a href="">
                            <div class="shadow-md rounded-md overflow-hidden">
                                <img class="w-full h-[300px] object-cover" src="{{ asset($category_first->image) }}"
                                    alt="{{ $category_first->title }}">
                                <div class="p-3">
                                    <h2 class="text-lg md:text-xl lg:text-2xl font-semibold line-clamp-1">
                                        {{ $category_first->title }}
                                    </h2>
                                    <div class="text-sm line-clamp-2">
                                        {!! $category_first->description !!}
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="grid md:grid-cols-2 gap-4 mt-6">
                            @foreach ($category_others as $article)
                                <x-article-card :article="$article" />
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-4">
                        @foreach ($side_articles as $article)
                            <div>
                                <x-article-card :article="$article" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach


        </div>
    </section>
</x-frontend-layout>

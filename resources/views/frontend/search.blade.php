<x-frontend-layout>

    <section>
        <div class="container grid grid-cols-3 gap-4 py-6">
            <div class="col-span-2 space-y-6">
                <h1 class="text-xl font-bold">
                    Search Result for "{{ $q }}"
                </h1>
                @foreach ($articles as $article)
                    <a href="{{ route('article', $article->slug) }}">
                        <div class="grid grid-cols-3 gap-2 items-center shadow-md rounded-md overflow-hidden">
                            <img class="w-full h-[270px] object-cover" src="{{ asset($article->image) }}"
                                alt="{{ $article->title }}">
                            <div class="col-span-2 p-4">
                                <h2 class="text-2xl font-semibold line-clamp-2">
                                    {{ $article->title }}
                                </h2>
                                <div class="line-clamp-4">
                                    {!! $article->description !!}
                                </div>
                                <small>
                                    <i class="fa-solid fa-calendar"></i> {{ toNepaliDate($article->created_at) }}
                                </small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>


            <div>
                @foreach ($page_advertises as $ads)
                    <a href="{{ $ads->redirect_link }}" target="_blank">
                        <img class="w-full" src="{{ asset($ads->link) }}" alt="{{ $ads->company_name }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-frontend-layout>

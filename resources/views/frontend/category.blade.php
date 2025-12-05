<x-frontend-layout>

    <section>
        <div class="container grid grid-cols-3 gap-4">
            <div class="col-span-2 space-y-6">
                @foreach ($articles as $article)
                    <div class="grid grid-cols-3 gap-2 items-center shadow-md rounded-md overflow-hidden">
                        <img class="w-full h-[270px] object-cover" src="{{ asset($article->image) }}" alt="{{ $article->title }}">
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
                @endforeach
            </div>


            <div>

            </div>
        </div>
    </section>

</x-frontend-layout>

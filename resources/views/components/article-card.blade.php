@props(['article'])
<a href="">
    <div class="grid grid-cols-3 items-center gap-2 shadow-md rounded-md overflow-hidden">
        <img class="w-full h-[90px] overflow-hidden" src="{{ asset($article->image) }}"
            alt="{{ $article->title }}">
        <div class="col-span-2">
            <h3 class="text-sm md:text-base lg:text-lg font-semibold line-clamp-2">
                {{ $article->title }}
            </h3>
            <small class="text-xs">
                <i class="fa-solid fa-calendar"></i> {{toNepaliDate($article->created_at)}}
            </small>
        </div>
    </div>
</a>

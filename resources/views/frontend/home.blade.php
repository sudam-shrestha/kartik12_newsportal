<x-frontend-layout>
    <section>
        <div class="container pb-8">
            <a href="">
                <div class="shadow-lg p-4 rounded-lg overflow-hidden">
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold mb-2">{{$latest_news->title}}</h1>
                    <img class="w-full" src="{{asset($latest_news->image)}}" alt="{{$latest_news->title}}">
                </div>
            </a>
        </div>
    </section>

    <section>
        <div class="container grid md:grid-cols-3 gap-6 py-8">
            <div class="md:col-span-2">
                <a href="">
                    <div class="shadow-md rounded-md overflow-hidden">
                        <img class="w-full h-[300px] object-cover"
                            src="https://jawaaf.com/storage/01KBH0GSTQHYREVNE3QJANK4G2.JPG" alt="">
                        <div class="p-3">
                            <h2 class="text-lg md:text-xl lg:text-2xl font-semibold">
                                एनपिएलमा आज विराटनगर किंग्स र लुम्बिनी लायन्स भिड्दै
                            </h2>
                            <p class="text-sm">
                                काठमाडौं । दोस्रो संस्करणको नेपाल प्रिमियर लिग (एनपीएल)२२ औं खेलमा विराटनगर किंग्स र
                                लुम्बिनी लायन्स भिड्दैछन् । यो खेल बुधबार दिउँसो ४ बजे त्रिवि क्रिकेट मैदान कीर्तिपुरमा
                                सुरु
                                हुनेछ ।
                            </p>
                        </div>
                    </div>
                </a>

                <div class="grid md:grid-cols-2 gap-4 mt-6">
                    <x-article-card />
                    <x-article-card />
                    <x-article-card />
                    <x-article-card />
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-2xl py-2 border-l-4 border-[var(--primary-color)] pl-2 font-semibold text-primary bg-[var(--light-primary-color)]">ट्रेन्डिङ</h2>
                <div>
                    <x-article-card />
                </div>
                 <div>
                    <x-article-card />
                </div>
                 <div>
                    <x-article-card />
                </div>
                 <div>
                    <x-article-card />
                </div>
                 <div>
                    <x-article-card />
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>

<x-frontend-layout :title="$article->title" :keywords="$article->meta_keywords" :description="$article->meta_description" :image="asset($article->image)">

    <section>
        <div class="container grid grid-cols-3 gap-4 py-6">
            <div class="col-span-2 space-y-4">
                <div class="text-lg flex gap-4">
                    <small>
                        <i class="fa-solid fa-calendar"></i> {{ toNepaliDate($article->created_at) }}
                    </small>

                    <small>
                        {{ $article->views }} views
                    </small>

                    <small>
                        <i class="fa-solid fa-user"></i> {{ $article->writer_name }}
                    </small>
                </div>

                <h1 class="text-2xl font-semibold">
                    {{ $article->title }}
                </h1>

                <!-- Share Buttons Section -->
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border">
                    <span class="font-medium text-gray-700">Share:</span>

                    <!-- Facebook Share -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                        target="_blank"
                        class="flex items-center gap-2 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </a>

                    <!-- WhatsApp Share -->
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}"
                        target="_blank"
                        class="flex items-center gap-2 px-3 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>

                    <!-- Copy Link -->
                    <button onclick="copyToClipboard('{{ request()->url() }}')"
                        class="flex items-center gap-2 px-3 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition copy-link-btn">
                        <i class="fa-solid fa-link"></i>
                        <span>Copy Link</span>
                    </button>

                    <!-- Success Message (hidden by default) -->
                    <div id="copy-success" class="hidden text-green-600 font-medium">
                        <i class="fa-solid fa-check"></i> Link copied!
                    </div>
                </div>

                <img class="w-full" src="{{ asset($article->image) }}" alt="">

                <div>
                    {!! $article->description !!}
                </div>

                <div class="fb-comments" data-href="http://127.0.0.1:8000/article/{{ $article->slug }}" data-width=""
                    data-numposts="5"></div>
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

    <!-- Add FontAwesome for icons (if not already included) -->
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @endpush

    @push('scripts')
        <script>
            function copyToClipboard(text) {
                // Create a temporary input element
                const tempInput = document.createElement('input');
                tempInput.value = text;
                document.body.appendChild(tempInput);

                // Select and copy the text
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                try {
                    const successful = document.execCommand('copy');
                    if (successful) {
                        // Show success message
                        const successMessage = document.getElementById('copy-success');
                        successMessage.classList.remove('hidden');

                        // Change button text temporarily
                        const copyBtn = document.querySelector('.copy-link-btn');
                        const originalText = copyBtn.innerHTML;
                        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
                        copyBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                        // Reset button after 2 seconds
                        setTimeout(() => {
                            successMessage.classList.add('hidden');
                            copyBtn.innerHTML = originalText;
                            copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                        }, 2000);
                    }
                } catch (err) {
                    console.error('Failed to copy: ', err);
                    alert('Failed to copy link. Please copy manually: ' + text);
                }

                // Clean up
                document.body.removeChild(tempInput);
            }

            // Alternative modern approach using Clipboard API
            function copyToClipboardModern(text) {
                if (navigator.clipboard && window.isSecureContext) {
                    // Use the modern Clipboard API if available
                    navigator.clipboard.writeText(text).then(() => {
                        // Show success message
                        const successMessage = document.getElementById('copy-success');
                        successMessage.classList.remove('hidden');

                        // Change button text temporarily
                        const copyBtn = document.querySelector('.copy-link-btn');
                        const originalText = copyBtn.innerHTML;
                        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
                        copyBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                        // Reset after 2 seconds
                        setTimeout(() => {
                            successMessage.classList.add('hidden');
                            copyBtn.innerHTML = originalText;
                            copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                        }, 2000);
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                        // Fallback to old method
                        copyToClipboard(text);
                    });
                } else {
                    // Fallback to old method
                    copyToClipboard(text);
                }
            }

            // Update the button to use modern API
            document.querySelector('.copy-link-btn').addEventListener('click', function(e) {
                e.preventDefault();
                copyToClipboardModern('{{ request()->url() }}');
            });
        </script>
    @endpush

</x-frontend-layout>

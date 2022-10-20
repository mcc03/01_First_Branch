<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           @foreach ($articles as $article)
           <<div>
                <h2> {{ $article->$title }}</h2>
                <p>
                    {{ $article->$body_text }}
                </p>
           </div>

        </div>
    </div>
</x-app-layout>

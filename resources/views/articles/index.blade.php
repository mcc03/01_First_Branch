<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           @forelse ($articles as $article)
           <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl"> {{ $article->title }}</h2>

                <p class="mt-2">
                   <strong>Author: {{ $article->author }} <br></strong> 
                   <strong>Category: {{ $article->category_id }} <br></strong> 
                    {{ Str::limit($article->body_text, 200) }}
                </p>
           </div>
           @empty
           <p>You have no articles yet.</p>
           @endforelse
           {{-- {{$articles->links()}} --}}
        </div>
    </div>
</x-app-layout>

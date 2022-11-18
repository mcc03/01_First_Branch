<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- page heading --}}
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- if the article is deleted succesfully, a confirmation will pop up --}}
                @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-mb">
                {{ session('success') }}
                @endif
            </div>

            {{-- button link to create article page --}}
            <a href="{{ route('admin.articles.create') }}" class="btn-link btn-lg mb-2">+ New Article</a>
           
            {{-- for each article it will loop through and display the information specified in this loop --}}
            @forelse ($articles as $article)

           <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <h2 class="font-bold text-2xl"> 
                    {{-- hovering over article title will show it's ID and can click to view that specific article --}}
                    <a href="{{ route('admin.articles.show', $article) }}">  {{ $article->title }}</a>
                </h2>

                <td rowspan="6">
                    <!-- use the asset function, access the file $article->article_image in the folder storage/images -->
                    <img src="{{asset('storage/images/' . $article->article_image) }}" width="250" />
                </td>

                <p class="mt-2">
                    {{-- displaying the article information --}}
                   <strong>Author: {{ $article->author }} <br></strong> 
                   <strong>Category: {{ $article->category->name }} <br></strong> 
                    {{ Str::limit($article->body_text, 200) }}
                </p>
           </div>
           @empty
           {{-- will be displayed if you have no articles to be shown --}}
           <p>You have no articles yet.</p>
           @endforelse
           {{-- these are the links for the pagination --}}
           {{$articles->links()}}
        </div>
    </div>
</x-app-layout>

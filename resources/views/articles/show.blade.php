<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- edit button --}}
            <div class="flex">
            <a href="{{ route('articles.edit', $article) }}" class="btn-link ml-auto">Edit</a>
            
            {{-- delete button --}}
            <form action="{{ route('articles.destroy', $article) }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this article?')">Delete Article</button>
            </form>
            </div>
           <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

            <h2 class="font-bold text-4xl">
                {{-- displaying article title --}}
                {{ $article->title }}
            </h2>

            <td rowspan="6">
                <!-- use the asset function, access the file $article->article_image in the folder storage/images -->
                <img src="{{asset('storage/images/' . $article->article_image) }}" width="150" />
            </td>

            <p class="mt-6">
                {{-- displaying article information --}}
                <strong>Author: {{ $article->author }} <br></strong> 
                <strong>Category: {{ $article->category_id }} <br></strong> 
            </p>

            <p class="mt-6 whitespace-pre-wrap">{{ $article->body_text}}</p>
        </div>
    </div>
</x-app-layout>

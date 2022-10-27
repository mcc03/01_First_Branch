<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input type="file" 
                    name="article_image" 
                    placeholder="Article Cover" 
                    class="w-full mt-6" 
                    filed="article_image"></x-text-input>
                    
                    <x-text-input type="text"
                    name="title" 
                    placeholder="Title" 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('title')"></x-text-input> 
                    @error('title')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-text-input type="text" 
                    name="author" 
                    placeholder="Author" 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('author')"></x-text-input> 
                    @error('author')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-text-input type="text" 
                    name="category" 
                    placeholder="Category" 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('category')"></x-text-input> 
                    @error('category')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-textarea type="text"
                    name="body_text" 
                    rows="10" 
                    placeholder="Start typing here..." 
                    class="w-full" 
                    autocomplete="off">
                    :value="@old('text')"</x-textarea> 
                    @error('text')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <button type="submit">Save Article</button>
                </form>
         
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- enctype encodes data --}}
                <form action="{{ route('articles.update', $article) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{-- edit field for article image --}}
                    <x-text-input 
                    type="file" 
                    name="article_image" 
                    placeholder="Article Cover" 
                    class="w-full mt-6" 
                    filed="article_image"></x-text-input>
                    
                    {{-- edit field for article title --}}
                    <x-text-input 
                    type="text"
                    name="title" 
                    placeholder="Title" 
                    class="w-full" 
                    autocomplete="off"
                    {{-- anywhere you see this "@old" method, this remembers the field values so you don't have to retype it --}}
                    :value="@old('title', $article->title)"></x-text-input> 
                    @error('title')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- edit field for article author --}}
                    <x-text-input 
                    type="text" 
                    name="author" 
                    placeholder="Author" 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('author', $article->author)"></x-text-input> 
                    @error('author')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- edit field for article category --}}
                    <x-text-input 
                    type="text" 
                    name="category" 
                    placeholder="Category" 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('category', $article->category_id)"></x-text-input> 
                    @error('category')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- edit field for article body text --}}
                    <x-textarea 
                    type="text"
                    name="body_text" 
                    rows="10" 
                    placeholder="Start typing here..." 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('body_text', $article)"></x-textarea> 
                    @error('text')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <button type="submit">Save Changes</button>
                </form>
        </div>
    </div>
</x-app-layout>


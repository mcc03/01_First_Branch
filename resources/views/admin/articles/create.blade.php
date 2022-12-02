<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- calls the store function, enctype encodes the data before being submitted to --}}
                <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- these are all the fields that will be shown on the create page --}}
                    {{-- choose image field --}}
                    <x-text-input type="file" 
                    name="article_image" 
                    placeholder="Article Cover" 
                    class="w-full mt-6" 
                    field="article_image"></x-text-input>
                    
                    {{-- article title field --}}
                    <x-text-input type="text"
                    name="title" 
                    placeholder="Title" 
                    class="w-full" 
                    autocomplete="off"
                    {{-- "@old" remembers the values in the relative fields --}}
                    :value="@old('title')"></x-text-input> 
                    @error('title')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- article author field --}}
                    <x-text-input 
                    type="text" 
                    name="author" 
                    placeholder="Author" 
                    class="w-full" 
                    autocomplete="off"
                    :value="@old('author')"></x-text-input> 
                    @error('author')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- article body text field --}}
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
        
                    {{-- article category field --}}
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="name">
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{(old('name') == $category->id) ? "selected" : ""}}>
                              {{$category->name}}
                            </option>
                          @endforeach
                     </select>

                     {{-- Select a user to attach the comment to --}}
                     {{-- <div class="form-group">
                        <label for="authors"> <strong> User</strong> <br> </label>
                        @foreach ($users as $user)
                            <input type="checkbox", value="{{$user->id}}" name="users[]">
                           {{$user->name}}
                        @endforeach
                    </div> --}}

                    {{-- choose a comment for the article --}}
                     {{-- <div class="form-group">
                        <label for="comments"> <strong> Comments</strong> <br> </label>
                        @foreach ($comments as $comment)
                            <input type="checkbox", value="{{$comment->id}}" name="comments[]">
                           {{$comment->comment}}
                        @endforeach
                    </div> --}}

                    {{-- save article button --}}
                    <button type="submit">Save Article</button>
                </form>
         
        </div>
    </div>
</x-app-layout>


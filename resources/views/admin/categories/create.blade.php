<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"></div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- calls the store function, enctype encodes the data before being submitted to --}}
                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- these are all the fields that will be shown on the create page --}}
                    {{-- category title field --}}
                    <x-text-input type="text"
                    name="name" 
                    placeholder="Category Name" 
                    class="w-full" 
                    autocomplete="off"
                    {{-- "@old" remembers the values in the relative fields --}}
                    :value="@old('name')"></x-text-input> 
                    @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- save article button --}}
                    <button type="submit">Save Category</button>
                </form>
         
        </div>
    </div>
</x-app-layout>


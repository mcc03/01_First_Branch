<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- calls the update function, enctype encodes the data before being submitted to server --}}
                <form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{-- edit field for category --}}
                    <x-textarea 
                    type="text"
                    name="name" 
                    rows="1" 
                    placeholder="category" 
                    class="w-full" 
                    autocomplete="off"
                    {{-- trying to add category dropdown into edit --}}
                    :value="@old('name', $category)"></x-textarea> 
                    @error('text')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    {{-- save changes button --}}
                    <button type="submit">Save Changes</button>
                </form>
        </div>
    </div>
</x-app-layout>


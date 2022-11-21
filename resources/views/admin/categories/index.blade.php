<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- if the article is deleted succesfully, a confirmation will pop up --}}
                @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-mb">
                {{ session('success') }}
                @endif
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn-link btn-lg mb-2">Add a Category</a>
            @forelse ($categories as $category)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.categories.show', $category) }}"> <strong> Category ID </strong> {{ $category->id }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3> <strong> Category Name </strong>
                        {{$category->name}} </h3>

                    </p>

                </div>
            @empty
            <p>No categories found</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{-- {{$categories->links()}} --}}
        </div>
    </div>
</x-app-layout>
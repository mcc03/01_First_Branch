<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Details') }}
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

            <div class="flex">

                <!-- when EDIT BUTTON is clicked, route to admin.categories.edit -->
                <a href="{{ route('admin.categories.edit', $category) }}" class="btn-link ml-auto">Edit</a>

                <!-- delete button is wrapped in a form, with the delete method. -->
                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <td class="font-bold ">ID  </td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Name  </td>
                            <td>{{ $category->name }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

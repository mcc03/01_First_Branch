<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- if the article is updated succesfully, a confirmation will pop up --}}
            @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-mb">
            {{ session('success') }}
            @endif
            </div>
        </div>
      
            {{-- edit button --}}
            <div class="flex">
            <a href="{{ route('admin.articles.edit', $article) }}" class="btn-link ml-auto">Edit</a>
            
            {{-- delete button --}}
            <form action="{{ route('admin.articles.destroy', $article) }}" method="post">
                @method('delete')
                @csrf
                {{-- confirmation message pop up --}}
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
                <img src="{{asset('storage/images/' . $article->article_image) }}" width="500" />
            </td>

            <p class="mt-6"></p>
                {{-- displaying article information --}}
                <strong>Category: {{ $article->category->name }} <br></strong> 
            </p>

            {{-- displaying article information --}}
            <p class="mt-6 whitespace-pre-wrap">{{ $article->body_text}}</p>
    </div>
    
    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <p>
            <strong>Comment Section:</strong>

        </p>
            {{-- display the user's name and their comment --}}
            @foreach ($article->users as $user)
            <tr>
                <td class="font-bold "><strong>Comment by:</strong> </td>
                <td><strong>{{$user->name }}</strong><br></td>

                {{-- <td><strong>{{$comment->comment }}</strong></td> --}}
            </tr>
            @endforeach


            @foreach ($article->comments as $comment)
            <tr>
                <td>{{$comment->comment }}<br></td>
            </tr>
            @endforeach
    </div>
</div>

</x-app-layout>

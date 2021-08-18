<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif"  style="background-image: url({{Storage::url($post->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-gray-600 text-white rounded-full">
                                {{$tag->name}}
                                </a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                    {{--  http://proyectouny.uny.pc//storage/posts/75746ce0f74fb5282628fe78b253558d.png --}}
                    {{-- <img src="{{Storage::url($post->image->url)}}" alt=""> --}}
                    {{-- {{Storage::url($post->image->url)}} --}}
                    {{-- {{$post->image->url}} --}}
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>

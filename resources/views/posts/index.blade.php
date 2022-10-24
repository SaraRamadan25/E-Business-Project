
@foreach($posts as $post)
{{ $post->title }}
{{ $post->excerpt }}
    {{ $post->content }}
@endforeach

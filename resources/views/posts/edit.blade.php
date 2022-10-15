<h2> Edit Post </h2>
<form  method="POST" action="{{ route('posts.update',[$post]) }}">
    @method('PATCH')
    @csrf
    <input type="text" name="title" value="{{ $post->title }}">
    <input type="text" name="excerpt" value="{{ $post->excerpt }}">
    <button type="submit"> Send</button>
</form>

<form action="{{ route('posts.destroy',[$post]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"> Delete</button>
</form>


<form action="{{route('posts.store')}}"
      method="POST" enctype="multipart/form-data">

    @csrf
    <input type="text" name="name">
    <input type="text" name="title">
    <input type="text" name="excerpt">
    <input type="file" name="image">
    <input type="text" name="content">
    <select multiple name="tags[]">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

        <select multiple name="categories[]">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    <button type="submit">Send</button>
</form>

<form action="{{route('posts.store')}}"
      method="POST" enctype="multipart/form-data">

    @csrf
   Name <input type="text" name="name">
    <br />
    <br />
   Title <input type="text" name="title">
    <br />
    <br />
     Excerpt <input type="text" name="excerpt">
    <br />
    <br />
   upload your post img <input type="file" name="image">
    <br />
    <br />
    Content <input type="text" name="content">
    <br />
    <br />
   Your tags <select multiple name="tags[]">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

Your Categories
        <select multiple name="categories[]">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    <button type="submit">Send</button>
</form>

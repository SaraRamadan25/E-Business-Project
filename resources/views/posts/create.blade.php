<form action="{{route('posts.store')}}"
      method="POST">

    @csrf
    <input type="text" name="name">
    <input type="text" name="title">
    <input type="text" name="excerpt">
    <input type="file" name="image">
    <input type="text" name="content">
    <button type="submit">Send</button>
</form>

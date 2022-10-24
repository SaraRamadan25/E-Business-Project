<form action="{{route('news.store')}}"
      method="POST" enctype="multipart/form-data">

    @csrf
    <input type="text" name="title">
    <input type="text" name="description">
    <input type="file" name="image">
    <button type="submit">Send</button>
</form>

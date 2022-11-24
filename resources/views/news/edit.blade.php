<h2> Edit News </h2>
<form  method="POST" action="{{ route('news.update',[$news]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <input type="text" name="title" value="{{ $news->title }}">
    <input type="text" name="description" value="{{ $news->description }}">
    <input type="file" name="image" value="{{ $news->image }}">

    <button type="submit"> Send</button>
</form>

<form action="{{ route('news.destroy',[$news]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"> Delete</button>
</form>


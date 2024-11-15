<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="{{ url('/books/'.$book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ $book->title ?? '' }}" required>
        </div>
        <div>
            <label>Category:</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name ?? '' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Author:</label>
            <select name="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ ($book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                        {{ $author->name ?? '' }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ url('/books') }}">Back to List</a>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
</head>
<body>
    <header>
        <nav class="p-4">
            <a href="/categories" class="text-white">Category</a>
            <a href="/authors" class="text-white">Author</a>
            <a href="/books">Book</a>
        </nav>
    </header>
    <h1>Books</h1>
    <h2>Add New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">Book Title</label>
        <input type="text" name="title" id="title" required>

        <label for="category">Category</label>
        <select name="categories_id" id="category" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="author">Author</label>
        <select name="author_id" id="author" required>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add Book</button>
    </form>


    <h2>Book List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id ?? '' }}</td>
                <td>{{ $book->title ?? '' }}</td>
                <td>{{ $book->category->name ?? '' }}</td>
                <td>{{ $book->author->name ?? '' }}</td>
                <td>
                    <a href="{{ url('/books/' . $book->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/books/' . $book->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <script href="https://cdn.tailwindcss.com"></script>
</body>
</html>

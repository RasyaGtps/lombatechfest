<!DOCTYPE html>
<html>

<head>
    <title>Authors</title>
</head>

<body>
    <header>
        <nav class="p-4">
            <a href="/categories" class="text-white">Category</a>
            <a href="/authors" class="text-white">Author</a>
            <a href="/books">Book</a>
        </nav>
    </header>
    <h1>Authors</h1>

    <h2>Add New Author</h2>
    <form action="{{ url('/authors') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Save</button>
    </form>

    <h2>Author List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id ?? '' }}</td>
                <td>{{ $author->name ?? '' }}</td>
                <td>{{ $author->email ?? '' }}</td>
                <td>
                    <a href="{{ url('/authors/' . $author->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/authors/' . $author->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>

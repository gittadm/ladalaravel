<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Книги</title>
    </head>
    <body>
        <h1>Книги</h1>

    <table>
        <tr>
            <td>ID</td>
            <td>Название</td>
            <td>Автор</td>
            <td>Описание</td>
            <td>Год</td>
            <td>Добавлено</td>
            <td></td>
        </tr>

        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->created_at }}</td>
                <td><a href="{{ route('books.delete', [$book->id]) }}">Удалить</a></td>
            </tr>
        @endforeach
    </table>

    </body>
</html>

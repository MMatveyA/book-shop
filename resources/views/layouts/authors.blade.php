<tr>
    <th>Имя фамилия отчество</th>
    <th>Дата рождения</th>
    <th>Дата смерти</th>
    <th>Краткая биография</th>
</tr>
@foreach ($authors as $author)
    <tr>
        <td>{{ $author->second_name }} {{ $author->first_name }} {{ $author->thrid_name }}</td>
        <td>{{ $author->birth }}</td>
        <td>{{ $author->death }}</td>
        <td>{{ $author->biography }}</td>
        <td><a href="{{ route('author.show', ['author' => $author->id]) }}">Подробнее</a></td>
    </tr>
@endforeach

@foreach ($ticket as $item)
    <h1>{{ $item->title }}</h1>
    <h1>{{ $item->user->name }}</h1>
@endforeach
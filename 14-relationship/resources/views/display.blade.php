<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Displaying Data</title>
</head>
<body>
    {!! $heading !!}
    {{ $heading }}

    @php $angka = 10; @endphp
    @if( $angka > 0 )
        <h2>{{ 'angka besar' }}</h2>
    @endif

    <form action="">
        @csrf
        <button type="submit">Submit</button>
    </form>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Data all Methods</title>
</head>
<body>

    <h1>Send Data all Methods</h1>

    @if( session('message') )
    <p style="background: #4aff84;">{{ session('message') }}</p>
    @endif

    <h2>GET</h2>
    <a href="/send-get?message=saya+sedang+ngoding+sekarang" target="_blank">Send Get Method</a>

    <h2>POST</h2>
    <form action="/send-post" method="POST">
        @csrf
        <label for="message">Message</label>
        <input type="text" name="message" id="message" placeholder="Input message">
        <button type="submit">Send</button>
    </form>

    <h2>PUT</h2>
    <form action="/send-put" method="POST">
        @csrf
        @method('put')
        <label for="message">Message</label>
        <input type="text" name="message" id="message" placeholder="Input message">
        <button type="submit">Send</button>
    </form>

    <h2>DELETE</h2>
    <form action="/send-delete" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Delete Data</button>
    </form>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
    <h1>URL Shortener</h1>
    <form id="shortenForm">
        @csrf
        <input type="url" name="url" placeholder="Enter your URL" required>
        <button type="submit">Shorten</button>
    </form>
    <p id="shortUrl"></p>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('shortenForm').addEventListener('submit', function(event) {
            event.preventDefault();
            axios.post('/shorten', new FormData(this))
                .then(response => {
                    document.getElementById('shortUrl').innerText = 'Short URL: ' + response.data.short_url;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="url"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        <form id="shortenForm">
            @csrf
            <input type="url" name="url" placeholder="Enter your URL" required>
            <button type="submit">Shorten</button>
        </form>
        <div class="result" id="shortUrl"></div>
    </div>
   
    {{-- <p id="shortUrl"></p> --}}

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
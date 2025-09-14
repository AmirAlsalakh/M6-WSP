<?php
http_response_code(403);

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Åtgärd Blockerad</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #f5c6cb;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 20px;
            margin: 50px auto;
            max-width: 600px;
        }
        h1 {
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CSRF-attack upptäckt!</h1>
        <p>Din förfrågan har blockerats eftersom den misstänks vara en CSRF-attack (Cross-Site Request Forgery).</p>
        <p>Ditt meddelande har inte skickats. Vänligen försök igen från den ursprungliga sidan.</p>

        <form action="index.php">
            <input type="submit" value="Gå tillbaka">
        </form>
    </div>
</body>
</html>
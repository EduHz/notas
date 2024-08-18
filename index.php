<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-top: 0;
            color: #333;
            font-size: 1.75em;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea,
        input[type="submit"] {
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        input[type="text"],
        textarea {
            background-color: #f9f9f9;
            color: #333;
        }

        textarea {
            resize: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Notes App</h2>

        <form action="notas.php" method="post">
            <label for="Title">Title</label>
            <input type="text" name="titulo" maxlength="20" required placeholder="Enter note title">

            <label for="Author">Author</label>
            <input type="text" name="autor" maxlength="20" required placeholder="Enter your name">

            <label for="Note">Note</label>
            <textarea class="textArea" name="notas" rows="10" cols="40" placeholder="Write your note here..."></textarea>

            <input type="submit" value="Save Note">
        </form>

        <a href="notas.php">View All Notes</a>
    </div>
</body>
</html>

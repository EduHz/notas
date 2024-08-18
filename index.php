<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Open Sans, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            display: grid;
            gap: 15px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 1rem;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #23527c;
        }

        /* View All Notes Link */
        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #337ab7;
            margin-top: 20px;
        }

        a:hover {
            color: #23527c;
        }

        .notesField {
            padding: 300px;
        }
        
        .textArea {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            form {
                padding: 15px;
            }

            label, input[type="text"], input[type="submit"] {
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            a {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
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

    <a href="notes.php">View All Notes</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Page</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: white;
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #6c63ff;
        }

        input[type="submit"] {
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #6c63ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #5548d9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Hello, {{ $name }}</h1>

        <form action="about" method="post">
            @csrf

            <input type="text" name="name" id="name" placeholder="Enter your name">

            <select name="department" id="department">
                @foreach ($departments as $id => $department)
                    <option value="{{ $id }}">{{ $department }}</option>
                @endforeach
            </select>

            <input type="submit" value="Send">
        </form>
    </div>

</body>
</html>
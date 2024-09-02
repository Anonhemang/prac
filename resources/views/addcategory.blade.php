<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Category Page</title>
    <style>
        .all {
            width: 100%;
        }

        .box {
            width: 30%;
            padding: 3%;
            display: grid;
            margin: 5% auto;
            border: 2px solid lightgrey;
        }

        .inp {
            font-size: large;
            padding: 2% 1%;
            margin: 3% auto;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="all">
        <div class="box">
            <form method="post" action="{{route('added')}}">
                @csrf
                <center>
                    <h3 class="fw-normal">Add New Tag</h3>
                </center>
                <input type="text" name="category" class="inp" placeholder="Tag Name" required autocomplete="off">
                <center>
                    <button type="submit" class="btn btn-success">Create</button>
                </center>
            </form>
        </div>
    </div>
</body>

</html>
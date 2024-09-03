<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registration Page</title>
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
            <form method="post" action="{{route('register')}}">
                @csrf
                <center>
                    <h3 class="fw-normal">Register</h3>
                </center>
                <input type="text" name="uname" class="inp" placeholder="Username" required>
                <input type="password" name="pass" class="inp" placeholder="Password" required>
                {{-- <input type="date" name="created_at" id="" style="display: none"> --}}
                <center><input type="submit" value="Create Account" name="sub" class="btn btn-success mt-2"
                        style="width:40%">
                </center>
            </form>
            <!-- <a href="forgetpass.php" class="text-decoration-none text-primary mt-3">Forget Password?</a> -->
            <a href="" class="text-decoration-none text-dark mt-2">Already Have an Account?</a>
        </div>
    </div>
</body>

</html>
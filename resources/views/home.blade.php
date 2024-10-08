<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>HomePage | {{ $username }}</title>
    <style>
        .all {
            margin: 5% 10%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .box {
            padding: 1% 1%;
            border: 1px solid gray;
            border-radius: 10px;
            width: 80%;
            margin-top: 2% !important;
            margin: auto;
            background-color: rgba(77, 69, 69, 0.3);
            border: 0px;
            box-shadow: 2px 2px 10px 1px rgba(131, 56, 202, 0.5);
        }

        .inimg {
            width: 100%;
            margin: auto;
            height: 154.7px;
        }

        .imbo {
            width: 30%;
            margin: 1%;
            padding: 2%;
        }

        .date {
            float: inline-end;
        }

        .upr {
            display: flex;
        }

        .all_cont {
            width: 80%;
            margin-top: 2%;
        }

        .sa{
            padding: 2% 5%;
        }

        .sd{
            justify-content: space-between
        }

        .topp {
            display: flex;
            width: 90%;
            margin: 0 5%;
        }

        .pagi,
        .pa {
            padding-bottom: 8% !important;
            display: inline;
            width: 100%;
        }

        .w-5.h-5 {
            width: 20px !important;
        }

        .atag {
            justify-content: center;
            color: white;
            margin: 0 2% 5% 2%;
            padding: 1%;
            text-decoration: none;
            border-radius: 100%;
            background-color: black;
        }

        .active {
            background-color: #4CAF50;
        }

        .flex-1 {
            display: none;
        }

        .py-2 {
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {

            .upr {
                display: grid;
            }

            .imbo {
                width: 90%;
                margin: auto
            }

            .all_cont {
                width: 90%;
                margin: auto;
            }
        }

        @layer {
            * {
                scrollbar-color: blue white;
            }
        }
    </style>
</head>

<body>
    <a href="{{route('add')}}" class="btn btn-info mt-3 me-5  float-end">Add New Post</a>
    <a href="{{route('logout')}}" class="btn btn-info me-5 mt-3 float-end" onclick="return logout()">Logout</a>
    <h3>Welcome, {{ $username }}</h3>
    <div class="topp">
        <!-- Search code -->
        <div class="sa">
            <div class="frm">
                <form method="GET" action="index">
                  
                    <input type="text" name="search" placeholder="Search.." id="search"
                        class=" mb-3 pe-5 ps-3 pt-1 pb-1" value="{{ request('search') }}">
                    
                    @foreach($homecat as $cate)
                    <input type="checkbox" name="cat[]" value="{{$cate->category}}" class="ms-5" id="" {{ in_array($cate->category, request('cat', [])) ? 'checked' : '' }}>
                    {{$cate->category}}
                    @endforeach
                    <br><input type="date" value="{{request('s_date') }}"  name="s_date" class="me-2 pe-3 ps-3 pt-1 pb-1">
                    <button type="submit" class="btn btn-sm btn-warning fw-light fs-6 float-end">Filter Data<i class="bi bi-funnel-fill"></i></button>
                </form>
            </div>
        </div>
        <!-- Search end -->

    </div>
    <div class="all">
        <!-- Box 1 -->
        @foreach($data as $row)
        <div class="box">
            <div class="upr">
                <div class="imbo">
                    <img src="{{asset('images/'. $row->image)}}" alt="" class="inimg">
                </div>
                <div class="all_cont">
                    <div class="title">
                        @php
                        $c =$row->title;
                        $cut = substr($c, 0 , 35)."...";

                        @endphp
                        <h2>{{$cut}}</h2>
                    </div>
                    <hr>
                    <div class="content">
                        @php
                        $cont = $row->content;
                        $show = substr($cont,0 , 155)."....";
                        @endphp
                        <p>{{$show}}</p>
                    </div>
                    <div class="tag">
                        <h5>Tags: {{$row->category}}</h5>
                    </div>
                    <div class="date">
                        <small>{{$row->created_at}}</small>
                    </div>
                </div>
            </div>
            <div class="oper float-end">
                <a href="{{route('view', ['id'=>$row->id])}}" class="btn btn-primary">Read More</a>
                <a href="{{route('edit', ['id'=>$row->id])}}" class="btn btn-success opr" onclick="return edit()">Edit
                    Post</a>
                <a href="{{route('delet', ['id'=>$row->id])}}" class="btn btn-danger opr" onclick="return del()">Delete
                    Post</a>
            </div>
        </div>
        @endforeach

        <script>
            function del() {
                return confirm("Want to Delet This Post ?");
            }
            function edit() {
                return confirm("Want to Edit This Post ?");
            }
            function logout() {
                return confirm("Want to Logout ?");
            }
        </script>
        <!-- End of 1 -->
    </div>
    <div class="pagi">
        <center>
            <p class="pa">
                {{$data->appends(request()->input())->links()}}
            </p>
        </center>

    </div>
</body>

</html>
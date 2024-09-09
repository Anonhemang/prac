<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Blogs</title>

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

        }

        .sa{
            padding: 2% 5%;
        }

        .sd{
            justify-content: space-between
        }

        .inimg {
            width: 100%;
            margin: auto;
            height: 155px;
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

        .pagi,
        .pa {
            padding-bottom: 8% !important;
            display: inline;
            width: 100%;
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

        .frm {
            margin: 2% 4%;
            display:contents;
            /* width: 100%; */
        }

        .tag {
            display: flex;
        }

        .w-5.h-5 {
            width: 20px !important;
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
                scrollbar-color: black black;
            }
        }
    </style>
</head>

<body>
    <div class="topp">

        <!-- Search code -->


        <div class="sa">
            <div class="frm">
                <form method="GET" action="">
              
                    <input type="text" name="search" placeholder="Search By Title.." id="search"
                        class=" mb-3 pe-5 ps-3 pt-1 pb-1" value="{{ request('search') }}">

                    @foreach($homecat as $cate)
                    <input type="checkbox" name="cat" value="{{$cate->category}}" class="ms-5" id="">
                    {{$cate->category}} 
                    @endforeach
                    <br><input type="date" value="{{ request('s_date') }}" name="s_date" class="me-2 pe-3 ps-3 pt-1 pb-1 ">

                    <button type="submit" class="btn  btn-sm btn-warning fw-light fs-6 float-end">Filter Data<i class="bi bi-funnel-fill"></i></button>
                    
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
                    <img src="{{asset('images/'. $row->image)}}" alt="" title="{{$row->image}}" class="inimg">
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
                        $content = $row->content;
                        $show = substr($content, 0, 105)."....";
                        @endphp
                        <p>{{$show}}</p>
                    </div>
                    <div class="tag">
                        <h4>Tags:</h4> &nbsp;<h5 class="mt-1">{{$row->category}}</h5>
                    </div>
                    <div class="date">
                        <small>{{$row->created_at}}</small>
                    </div>
                </div>
            </div>
            <div class="oper float-end">
                <a href="{{route('view', ['id'=>$row->id])}}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        @endforeach

        <!-- End of 1 -->
    </div>
    <div class="pagi">
        <center>
            <p class="pa">
                {{$data->links()}}
            </p>
        </center>
    </div>
</body>

</html>
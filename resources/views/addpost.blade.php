<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .all {
            margin: 0 10%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .box {
            padding: 1%;
            border: 1px solid gray;
            border-radius: 10px;
            width: 90%;
            /* margin-top: 1% !important; */
            margin: auto;

        }

        .inimg {
            width: 100%;
            margin: auto;
            height:70% !important;
        }

        .imbo {
            width: 30%;
            margin: 1%;
            padding: 2%;
        }

        .date {
            float: right;
        }

        .upr {
            display: flex;
        }

        .all_cont {
            width: 80%;
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <center><a href="{{route('addcate')}}" class="btn btn-success mt-2 mb-2">Add New Tag</a></center>
    <div class="all">
        <!-- Box 1 -->
        <form method="post" action="{{route('addpost')}}" enctype="multipart/form-data">
            @csrf
            <div class="box">
                <div class="upr">
                    <div class="imbo">
                        <img src="" alt="" placeholder="Image" class="inimg">
                        <input type="file" name="image" id="">(Image Comes Here)
                    </div>
                    <div class="all_cont">

                        <div class="title">

                            <h2><textarea name="title" id="" cols="30" rows="2"
                                    placeholder="Title Comes Here"></textarea>
                            </h2>

                        </div>
                        <hr>
                        <div class="content">
                            <p>
                                <textarea name="content" id="" cols="62" rows="5"
                                    placeholder="Content Comes Here"></textarea>
                            </p>
                        </div>
                        <div class="tag">
                            <h5>Tags:</h5>
                            @foreach($data as $disp)
                            <input type="checkbox" name="category[]" value="{{$disp->category}}"
                                id=""> {{$disp->category}},&nbsp;
                            @endforeach

                        </div>

                        <div class="date">
                            <small>~ Todays Date Will Be Printed Here</small>
                        </div>
                        <div class="oper float-end mt-5">
                            <a class="btn btn-primary">Read More</a>
                            <a class="btn btn-success opr">Edit Post</a>
                            <a class="btn btn-danger opr">Delete Post</a>
                        </div>
                    </div>
                </div>



            </div>
            <center>
                <button type="submit" class="btn btn-success btn-lg mt-3">Add Post</button>
            </center>
        </form>

        <!-- End of 1 -->
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>


    </div>


</body>

</html>
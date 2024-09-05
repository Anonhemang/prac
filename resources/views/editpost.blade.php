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
            height: 50% !important;
        }

        .imbo {
            width: 30%;
            margin: 0 1%;
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
    <center><a href="{{'/addcate'}}" class="btn btn-success mt-3 mb-2">Add New Tag</a></center>
    <div class="all">
        <!-- Box 1 -->
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            @csrf
            @method('PUT')
            <div class="box">
                <div class="upr">
                    <div class="imbo">
                        <img src="{{asset('images/'.$data->image)}}" alt="" placeholder="Image" class="inimg">
                        <input type="file" value="" name="image" id="">Current Image: {{$data->image}}
                    </div>
                    <div class="all_cont">

                        <div class="title">

                            <h2>
                                <textarea name="title" id="" cols="30" rows="2"
                                    placeholder="Title Comes Here">{{$data->title}}</textarea>
                            </h2>

                        </div>
                        <hr>
                        <div class="content">
                            <p>
                                <textarea name="content" id="" cols="62" rows="5"
                                    placeholder="Content Comes Here">{{$data->content}}</textarea>
                            </p>
                        </div>
                        <div class="tag">
                            <h5>Tags:</h5>
                            @php
                            $selectedCategories = explode(' , ', $data->category);
                            @endphp

                            @foreach($catdata as $category)
                            <input type="checkbox" name="category[]" value="{{$category->category}}" id=""
                                @if(in_array(trim($category->category), $selectedCategories)) checked @endif>
                            {{$category->category}},&nbsp;
                            @endforeach
                        </div>

                        <div class="date">
                            <small>{{$data->created_at}}</small>
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
                <button type="submit" class="btn btn-success btn-lg mt-3">Edit Post</button>
            </center>
        </form>

        <!-- End of 1 -->
        
    </div>

</body>

</html>

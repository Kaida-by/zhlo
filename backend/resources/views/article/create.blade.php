<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <p>Create</p>
            <div class="form-group">
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <textarea name="description" rows="7" class="form-control" required></textarea>
            </div>
            <ul id="uploadImagesList">
                <li class="item template">
                    <span class="img-wrap">
                        <img src="" alt="" width="300px">
                    </span>
                    <span class="delete-link" title="Delete" style="width: 20px; height: 20px; background: green; display: block;">

                    </span>
                    <span class="file-name">123</span>
                </li>
            </ul>
            <label for="form-field-files" class="form-upload-images-label">Example file input</label>
            <input name="files[]" type="file" class="form-control-files" id="form-field-files" multiple>

            <input type="submit" value="Create" class="btn btn-success">
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="{{ asset("assets/js/form-js.js") }}"></script>

    </body>
</html>

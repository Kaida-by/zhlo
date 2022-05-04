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
        <form action="{{ route('article.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <p>Редактировать</p>
            <div class="form-group">
                <input type="text" class="form-control" name="title" required value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <textarea name="description" rows="7" class="form-control" required>{{ $article->description }}</textarea>
            </div>

            <ul id="uploadImagesList">
                @foreach($images as $key => $image)
                    @if($image->is_main)
                        <li class="item template">
                            <span class="img-wrap">
                                <img src="/{{ $image->src }}" alt="{{ $image->slug }}" width="300px">
                            </span>
                            <span class="delete-link" title="Delete" style="width: 20px; height: 20px; background: green; display: block;">                    </span>
                            <span class="file-name">123</span>
                        </li>
{{--                        <div>--}}
{{--                            --}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="is_main_image"--}}
{{--                                id="main_image"--}}
{{--                                value="{{ $image->uuid . '&' . $image->id }}" checked--}}
{{--                            >--}}
{{--                            <label class="form-check-label" for="is_main_image">Main</label>--}}
{{--                        </div>--}}
                    @else
                        <li class="item template">
                            <span class="img-wrap">
                                <img src="/{{ $image->src }}" alt="{{ $image->slug }}" width="300px">
                            </span>
                            <span class="delete-link" title="Delete" style="width: 20px; height: 20px; background: green; display: block;">                    </span>
                            <span class="file-name">123</span>
                        </li>
{{--                        <div>--}}
{{--                            <img src="/{{ $image->src }}" alt="{{ $image->slug }}" width="300px">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="is_main_image"--}}
{{--                                id="main_image"--}}
{{--                                value="{{ $image->uuid . '&' . $image->id }}"--}}
{{--                            >--}}
{{--                            <label class="form-check-label" for="is_main_image">Main</label>--}}
{{--                        </div>--}}
                    @endif
                @endforeach
{{--                <li class="item template">--}}
{{--                    <span class="img-wrap">--}}
{{--                        <img src="" alt="" width="300px">--}}
{{--                    </span>--}}
{{--                    <span class="delete-link" title="Delete" style="width: 20px; height: 20px; background: green; display: block;">                    </span>--}}
{{--                    <span class="file-name">123</span>--}}
{{--                </li>--}}
            </ul>
            <label for="form-field-files" class="form-upload-images-label">Example file input</label>
            <input name="files[]" type="file" class="form-control-files" id="form-field-files" multiple>

{{--            <div class="images">--}}
{{--                @foreach($images as $key => $image)--}}
{{--                    @if($image->is_main)--}}
{{--                        <div>--}}
{{--                            <img src="/{{ $image->src }}" alt="{{ $image->slug }}" width="300px">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="is_main_image"--}}
{{--                                id="main_image"--}}
{{--                                value="{{ $image->uuid . '&' . $image->id }}" checked--}}
{{--                            >--}}
{{--                            <label class="form-check-label" for="is_main_image">Main</label>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <div>--}}
{{--                            <img src="/{{ $image->src }}" alt="{{ $image->slug }}" width="300px">--}}
{{--                            <input--}}
{{--                                class="form-check-input"--}}
{{--                                type="radio"--}}
{{--                                name="is_main_image"--}}
{{--                                id="main_image"--}}
{{--                                value="{{ $image->uuid . '&' . $image->id }}"--}}
{{--                            >--}}
{{--                            <label class="form-check-label" for="is_main_image">Main</label>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
            <input type="submit" value="Отредактировать" class="btn btn-success">
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="{{ asset("assets/js/form-js.js") }}"></script>
    </body>
</html>

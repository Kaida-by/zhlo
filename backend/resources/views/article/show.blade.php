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
        <article>
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->description }}</p>
            <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-outline-primary">edit</a>
            <a href="{{ route('article.delete', ['id' => $article->id]) }}" class="btn btn-outline-primary">del</a>
        </article>
    </body>
</html>

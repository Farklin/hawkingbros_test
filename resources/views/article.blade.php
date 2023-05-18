<!doctype html>
<html lang="ru">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            @foreach ($artciles as $article)
                <div class="row py-4">
                    <div class="col-md-12">
                        <h3> {{ $article->name }} </h3>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset($article->image) }}" class="img-fluid rounded-top" alt="">
                            </div>
                            <div class="col-md-9">
                                {{ $article->description }}
                                <ul>
                                    @foreach ($article->tags as $tag)
                                        <li>{{ $tag->name }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-offset-8 col-3"></div>
                            <span><a href="{{ route('like', $article->id) }}">Нравится {{ $article->likes() }}</a> /
                                <a href="{{ route('unlike', $article->id) }}">Не нравится
                                    {{ $article->unelikes() }}</a></span>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            @endforeach
            @include('paginator', ['paginator' => $artciles])

        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>

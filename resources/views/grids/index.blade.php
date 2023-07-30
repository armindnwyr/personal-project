<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col border mb-3">1</div>
            <div class="col border mb-3">2</div>
            <div class="col border mb-3">3</div>
            <div class="col border mb-3">4</div>
            <div class="col border mb-3">5</div>
            <div class="col border mb-3">6</div>
            <div class="col border mb-3">7</div>
            <div class="col border mb-3">8</div>
            <div class="col border mb-3">9</div>
            <div class="col border mb-3">10</div>
            <div class="col border mb-3">11</div>
            <div class="col border mb-3">12</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis rerum reprehenderit
                            ratione, repellat doloremque officiis blanditiis iure explicabo, mollitia, saepe atque
                            laborum dolorem! Impedit quos fuga, voluptatibus repellendus reiciendis rerum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis rerum reprehenderit
                            ratione, repellat doloremque officiis blanditiis iure explicabo, mollitia, saepe atque
                            laborum dolorem! Impedit quos fuga, voluptatibus repellendus reiciendis rerum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis rerum reprehenderit
                            ratione, repellat doloremque officiis blanditiis iure explicabo, mollitia, saepe atque
                            laborum dolorem! Impedit quos fuga, voluptatibus repellendus reiciendis rerum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis rerum reprehenderit
                            ratione, repellat doloremque officiis blanditiis iure explicabo, mollitia, saepe atque
                            laborum dolorem! Impedit quos fuga, voluptatibus repellendus reiciendis rerum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($post as $item)
            @if ($item->postear==true)
            <div class="col-md-4 mb-3">
                <div class="card">
                        <div class="card-header">{{ $item->titulo }}
                        </div>
                        <div class="card-body">
                            <p>{!! $item->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach           
    </div>
</body>

</html>

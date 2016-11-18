<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
        body { padding-top: 50px; }
        .starter-template { padding: 40px 15px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="starter-template">

            <div class="col-md-6 col-md-offset-3">

                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>Result:</strong> <span class="result"></span>
                </div>

                <form action="/form" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <select name="color" id="color" class="form-control">
                            <option value="red">Red</option>
                            <option value="yellow">Yellow</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" value="Enviar" class="btn btn-primary" />
                    </div>
                </form>

            </div>

            <div class="col-md-6 col-md-offset-3">

                <div class="alert alert-info alert-dismissible" role="alert">
                    <strong>Colors:</strong> red, yellow, green, blue
                    <br/>
                    <br/>
                    <strong>Nomes terminados com a:</strong> combinam com red e yellow.
                    <br/>
                    <strong>Nomes terminados com o:</strong> combinam com green e blue.
                    <br/>
                    <strong>Demais nomes:</strong> combinam com qualquer cor.
                </div>

            </div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        $('form').submit(function(evt) {
            evt.preventDefault();
            $.post('/form', $(evt.target).serialize(), function(data) {
                var result = $('.result');
                if (data[1]) {
                    result.parent('.alert').removeClass('alert-warning', 'alert-danger').addClass('alert-success');
                } else {
                    result.parent('.alert').removeClass('alert-warning', 'alert-success').addClass('alert-danger');
                }
                result.text(data[0]);
            });
        });
    </script>
</body>
</html>
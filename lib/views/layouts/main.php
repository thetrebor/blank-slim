<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="main">
        <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
        <div class="container">
            <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../" class="navbar-brand">Home</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                <a href="/page2/">Page 2</a>
                </li>
                <li class="active">
                <a href="/page3/">Page 3</a>
                </li>
                <li>
                <a href="/page4/">Page 4</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if ($loggedin): ?>
            <div>you are logged in.</div>
            <li><a href="/logout"><button class="btn btn-default">Logout</button></a></li>
            <?php else: ?>
            <li><a href="/login"><button class="btn btn-default">Login</button></a></li>
            <?php endif ?>
            </ul>
            </nav>
        </div>
        </header>
        <div id="message-container"></div>


        <div class="container page <?= str_replace('/', '_', $template) ?>">
            <?php require $template_dir . $template . '.php'; ?>
        </div>

        <script src="/vendor/requirejs/requirejs-2.1.15.js"></script>
        <script type="application/javascript">
        requirejs.config({
            baseUrl: '/',
            paths:  {
                text: 'vendor/requirejs/text',
                modules: 'modules'
            },
            text: {
                useXhr: function (url,protocol,hostname,port){
                     return true;
                }
            }
        });
        require(['vendor/knockoutjs/knockout-3.2.0'], function (ko) {
            /***
             * the request to api for data generalized
             */
            ko.populate_property_by_api = function(url,func,data) {

                var cache = function (data) {
                    localStorage.setItem(url,data);
                    func(data);
                },
                cached = localStorage.getItem(url);
                if (!cached) {
                    $.ajax({
                        url: url,
                        data: data
                    }).done(cache);
                }
                else {
                    func(cached);
                }

            }
            ko.components.register('dental-subscribers', { require: 'modules/dentalsubscribers'});
            ko.components.register('person_info', { require: 'modules/person_info'});
            ko.components.register('claims', { require: 'modules/claims'});
            ko.components.register('claims_form', { require: 'modules/claims_form'});
            ko.applyBindings();
        });
        </script>


        <!--3D Related Scripts -->
        <script src="/vendor/threejs/build/three.js"></script>
        <script src="/vendor/threejs/examples/js/loaders/collada/Animation.js"></script>
        <script src="/vendor/threejs/examples/js/loaders/collada/AnimationHandler.js"></script>
        <script src="/vendor/threejs/examples/js/loaders/collada/KeyFrameAnimation.js"></script>

        <script src="/vendor/threejs/examples/js/loaders/ColladaLoader.js"></script>

        <script src="/vendor/threejs/examples/js/Detector.js"></script>
        <script src="/vendor/threejs/examples/js/libs/stats.min.js"></script>

        <!--Feature Specific Scripts -->
        <script src="/js/login.js"></script>

    </body>
</html>

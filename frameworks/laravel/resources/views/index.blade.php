<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Jaxon Examples</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

{!! $JaxonCss !!}

<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // call the helloWorld function to populate the div on load
        Jaxon.App.Test.Pgw.sayHello(0);
        // call the setColor function on load
        Jaxon.App.Test.Pgw.setColor(xajax.$('colorselect1').value);
        // Call the HelloWorld class to populate the 2nd div
        Jaxon.App.Test.Bts.sayHello(0);
        // call the HelloWorld->setColor() method on load
        Jaxon.App.Test.Bts.setColor(xajax.$('colorselect2').value);
    }
    /* ]]> */
</script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Jaxon Examples</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
@include('menu')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h3 class="page-header">Jaxon Laravel Plugin</h3>

                <div class="row">
                    <div class="col-sm-6 col-md-6 text">
<p>
This example shows the usage of the Jaxon plugin for the Laravel framework.
</p>
<p>
The plugin implements all the setup of the Jaxon library, and let the user focus on writing Jaxon classes for his application.
</p>
<p>
The behaviour of the Jaxon library can be customized from a Laravel-specific config file.
</p>
<p>
By default, the Jaxon plugin for Laravel registers all classes in the app/Jaxon/Controllers/ dir, with namespace \Jaxon\App.
</p>

                    </div>
                    <div class="col-sm-6 col-md-6 demo">
                        <div style="margin:10px;" id="div1">
                            &nbsp;
                        </div>
                        <div style="margin:10px;">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="Jaxon.App.Test.Pgw.setColor(xajax.$('colorselect1').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div style="margin:10px;">
                            <button class="btn btn-primary" onclick='Jaxon.App.Test.Pgw.sayHello(0); return false;' >Click Me</button>
                            <button class="btn btn-primary" onclick='Jaxon.App.Test.Pgw.sayHello(1); return false;' >CLICK ME</button>
                            <button class="btn btn-primary" onclick="Jaxon.App.Test.Pgw.showDialog(); return false;" >Show PgwModal Dialog</button>
                        </div>

                        <div style="margin:10px;" id="div2">
                            &nbsp;
                        </div>
                        <div style="margin:10px;">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="Jaxon.App.Test.Bts.setColor(xajax.$('colorselect2').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div style="margin:10px;">
                            <button class="btn btn-primary" onclick="Jaxon.App.Test.Bts.sayHello(0); return false;" >Click Me</button>
                            <button class="btn btn-primary" onclick="Jaxon.App.Test.Bts.sayHello(1); return false;" >CLICK ME</button>
                            <button class="btn btn-primary" onclick="Jaxon.App.Test.Bts.showDialog(); return false;" >Show Twitter Bootstrap Dialog</button>
                        </div>
                    </div>
                </div>

                <h4 class="page-header">How it works</h4>

                <div class="row">
                    <div class="col-sm-6 col-md-6 jaxon-export">

<p>In this example we have two files Bts.php and Pgw.php in the app/Jaxon/Controllers/Test/ directory.</p>
<pre>
namespace Jaxon\App\Test;

use Jaxon\Laravel\Controller as JaxonController;

class Bts extends JaxonController
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';
    
        $this->response->assign('div2', 'innerHTML', $text);
        $this->response->toastr->success("div2 text is now $text, after calling " . $this->call('sayHello', $isCaps));
    
        return $this->response;
    }

    public function setColor($sColor)
    {
        $this->response->assign('div2', 'style.color', $sColor);
        $this->response->toastr->success("div2 color is now $sColor");
    
        return $this->response;
    }

    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        $this->response->bootstrap->modal("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);
    
        return $this->response;
    }
}
</pre>

<pre>
namespace Jaxon\App\Test;

use Jaxon\Laravel\Controller as JaxonController;

class Pgw extends JaxonController
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';
    
        $this->response->assign('div1', 'innerHTML', $text);
        $this->response->toastr->success("div1 text is now $text, after calling " . $this->call('sayHello', $isCaps));
    
        return $this->response;
    }

    public function setColor($sColor)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        $this->response->toastr->success("div1 color is now $sColor");
    
        return $this->response;
    }

    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        $this->response->pgw->modal("Modal Dialog", "This modal dialog is powered by PgwModal!!", $buttons, $options);
    
        return $this->response;
    }
}
</pre>
                    </div>
                    <div class="col-sm-6 col-md-6 jaxon-code">
<h5><b>Installation</b></h5>
<p>
Install the Laravel framework, version 5.1 or above.
</p>
<p>
Add the jaxon-core, jaxon-laravel and any other plugin package in the composer.json file, and run composer update.
</p>
<p>
Copy the content of the "app" dir in the jaxon-laravel package in the "app" dir of the Laravel install.<br/>
This directory contains a controller to process Jaxon request, and a route to send Jaxon requests to this controller.
</p>
<p>
Add <em>Jaxon\Laravel\JaxonServiceProvider::class</em> in the <em>providers</em> entry in the config/app.php file.<br/>
Add <em>'LaravelJaxon' => Jaxon\Laravel\Facades\Jaxon::class</em> in the <em>aliases</em> entry in the config/app.php file.
</p>
<p>
Make the application controller inherit from <em>JaxonController</em>.<br/>
Call <em>LaravelJaxon::register()</em> to register all the Jaxon classes. Then, call <em>LaravelJaxon::css()</em>,
<em>LaravelJaxon::js()</em> and <em>LaravelJaxon::script()</em> to get the code generated by Jaxon.
</p>

<h5><b>The Jaxon controller</b></h5>
<p>
This controller processes Jaxon requests.
</p>
<pre>
class JaxonController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
    }

    public function process()
    {
        // Process Jaxon request
        if(\LaravelJaxon::canProcessRequest())
        {
            \LaravelJaxon::processRequest();
        }
    }
}
</pre>

<h5><b>The application controller</b></h5>
<p>
This controller prints the application page with Jaxon code included.
</p>
<pre>
class DemoController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
    }

    public function index()
    {
        // Register the Jaxon classes
        \LaravelJaxon::register();
        // Print the page
        return view('index', array(
            'JaxonCss' => \LaravelJaxon::css(),
            'JaxonJs' => \LaravelJaxon::js(),
            'JaxonScript' => \LaravelJaxon::script()
        ));
    }
}
</pre>

<h5><b>Configuration</b></h5>
<p>The config file is located at <em>config/jaxon.php</em></p>
<p>
The config options are separated into two entries. The <em>lib</em> entry provides the options for
the Jaxon library, while the <em>app</em> entry provides the options for the Laravel application.
</p>
<pre>
return array(
    'app' => array(
        // 'route' => 'jaxon',
        // 'namespace' => '',
        // 'controllers' => '',
        // 'excluded' => [],
    ),
    'lib' => array(
        'core' => array(
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => array(
                'uri' => '/jaxon',
            ),
            'prefix' => array(
                'class' => '',
            ),
            'debug' => array(
                'on' => false,
                'verbose' => false,
            ),
            'error' => array(
                'handle' => false,
            ),
        ),
        'js' => array(
            'lib' => array(
                // 'uri' => '',
            ),
            'app' => array(
                // 'uri' => '',
                // 'dir' => '',
                'export' => false,
                'minify' => false,
            ),
        ),
    ),
);
</pre>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>

{!! $JaxonJs !!}

{!! $JaxonScript !!}

@include('footer')
</body>
</html>

<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Routing\Router;

class DemoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Load the Jaxon component
        $this->loadComponent('Jaxon/Cake.Jaxon');
    }

    public function index()
    {
        $menuEntries = array(
            'index.php' => 'Home',
            'hello.php' => 'Hello World Function',
            'alias.php' => 'Hello World Alias',
            'class.php' => 'Hello World Class',
            'extern.php' => 'Export Javascript',
            'plugins.php' => 'Plugin Usage',
            'flot.php' => 'Flot Plugin',
            'config.php' => 'Config File',
            'directories.php' => 'Register Directories',
            'namespaces.php' => 'Register Namespaces',
            'autoload-default.php' => 'Default Autoloader',
            'autoload-composer.php' => 'Composer Autoloader',
            'autoload-disabled.php' => 'Third Party Autoloader',
            'armada.php' => 'Armada',
            'laravel/' => 'Laravel Framework',
            'symfony/' => 'Symfony Framework',
            'zend/' => 'Zend Framework',
            'codeigniter/' => 'CodeIgniter Framework',
            'yii/' => 'Yii Framework',
            'cake/' => 'CakePHP Framework',
        );

        // Start and init the session
        $this->request->session()->write('DialogTitle', 'Yeah Man!!');

        // Set the layout
        if(substr(Configure::version(), 0, 3) != '3.0')
        {
            $this->viewBuilder()->layout('empty');
        }
        else
        {
            $this->layout = 'empty';
        }

        // Call the Jaxon module
        $this->Jaxon->register();

        $this->set('jaxonCss', $this->Jaxon->css());
        $this->set('jaxonJs', $this->Jaxon->js());
        $this->set('jaxonScript', $this->Jaxon->script());
        $this->set('menuEntries', $menuEntries);
        // Jaxon request to the Jaxon\App\Test\Bts controller
        $this->set('bts', $this->Jaxon->request('Jaxon.App.Test.Bts'));
        // Jaxon request to the Jaxon\App\Test\Pgw controller
        $this->set('pgw', $this->Jaxon->request('Jaxon.App.Test.Pgw'));
        $this->render('demo');
    }
}

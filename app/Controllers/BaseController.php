<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

// Add By Dev
use App\Libraries\Template;


use Config\Encryption;
use Config\Services;

$config         = new Encryption();
$config->driver = 'OpenSSL';

// Your CI3's 'encryption_key'
$config->key = hex2bin('64c70b0b8d45b80b9eba60b8b3c8a34d0193223d20fea46f8644b848bf7ce67f');
// Your CI3's 'cipher' and 'mode'
$config->cipher = 'AES-128-CBC';

$config->rawData        = false;
$config->encryptKeyInfo = 'encryption';
$config->authKeyInfo    = 'authentication';

$encrypter = Services::encrypter($config, false);





//loads Model
use App\Models\Center_model;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller {
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url', 'html', 'form', 'common', 'date', 'string', 'cookie'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        // Load Libraries Template
        $this->session = session();
        $this->template = new Template;
        $this->Center_model = new Center_model();

        ini_set('memory_limit', '256M');
        ini_set('sqlsrv.ClientBufferMaxKBSize', '524288');
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
    }
}
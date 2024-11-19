<?php

namespace App\Libraries;

/**
 * Name:    ci4-template-view
 *
 * Created: 06.03.2020
 *
 * Description:
 *
 * Original Author: Not found
 *
 * Requirements: PHP7.2 or above
 *
 * @package    ci4-template-view
 * @author     Matheus Castro <matheuscastroweb@gmail.com>
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
class Template {

    /**
     * Contents page
     *
     * @var array
     */
    protected $templateData = [];

    /**
     * Set contents
     *
     * @param string $name  Variable name in the template
     * @param string $value Value to be passed to variable
     * @return void
     */
    private function set(string $name, string $data): void {
        $this->templateData[$name] = $data;
    }

    public function set_js(string $name, $data): void {
        $this->templateData[$name] = $data;
    }

    /** 
     * Loading template
     *
     * @param string $template  Path of template to be used
     * @param string $view      Path of view to be used
     * @param array  $view_data View parameters
     * @param array  $options   Options supported by the view function <https://codeigniter4.github.io/userguide/general/common_functions.html?highlight=view#view>
     * @return string
     */

    public function load_view_admin(string $view, $viewData, $options = []): string {
        $this->set('header', view('layouts/template/header'));
        $this->set('topbar', view('layouts/template/topbar'));
        $this->set('footer', view('layouts/template/footer'));
        $this->set('contents', view('layouts/Admin/' . $view, $viewData));
        return view('layouts/template/template', $this->templateData, $options);
    }
    public function load_view_login(string $view, $viewData, $options = []): string {
        $this->set('header', '');
        $this->set('footer', '');
        $this->set('contents', view('layouts/' . $view, $viewData));
        return view('layouts/template/template', $this->templateData, $options);
    }
    public function load_view(string $view, $viewData, $options = []): string {
        $this->set('header', view('layouts/template/header'));
        $this->set('footer', view('layouts/template/footer'));
        $this->set('contents', view('layouts/' . $view, $viewData));
        return view('layouts/template/template', $this->templateData, $options);
    }
    public function load_view_content(string $view, $viewData, $options = []): string {
        $this->set('header', view('layouts/template/header'));
        $this->set('footer', view('layouts/template/footer'));
        $this->set('contents', view('layouts/' . $view, $viewData));
        return view('layouts/template/template_content', $this->templateData, $options);
    }
    public function load_view_content_dict(string $view, $viewData, $options = []): string {
        $this->set('header', view('layouts/template/header'));
        $this->set('footer', view('layouts/template/footer'));
        $this->set('contents', view('layouts/' . $view, $viewData));
        return view('layouts/template/template_content_dict', $this->templateData, $options);
    }



}
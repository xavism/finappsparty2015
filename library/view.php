<?php
/**
 * Handles the view functionality of our MVC framework
 */
class View {
    /**
     * Holds variables assigned to template
     */
    private $data = array();

    /**
     * Holds render status of view.
     */
    private $render = FALSE;


    public function __construct() {
	
		$this->data['site_title'] = '';
		$this->data['site_icon'] = '';
		$this->data['meta_description'] = '';
		$this->data['meta_keywords'] = '';
		$this->data['css'] = '';
		$this->data['js'] = '';
		
		
		$this->data['header'] = '';
		$this->data['content'] = '';
		$this->data['footer'] = '';

    }

    /**
     * Receives assignments from controller and stores in local data array
     * 
     * @param $variable
     * @param $value
     */
    
    /**
     * Receives assignments from controller and stores in local data array
     * 
     * @param $variable
     * @param $value
     */
    public function Assign($variable = '', $value) {
		if ($variable == '')
			$this->data = $value;
		else
			$this->data[$variable] = $value;
    }

    /**
     * Render the output directly to the page, or optionally, return the
     * generated output to caller.
     * 
	 * @param $variable Set which particular data to render to page
     * @param $direct_output Set to any non-TRUE value to have the 
     * output returned rather than displayed directly.
     */
    public function Render($view, $direct_output = TRUE) {
	
		// check if $view is an absolute path
		if(substr($view, -4) == ".php"){
		
			$file = $view;
		
		}
		else{

			//compose file name
			$file = ROOT . DS . 'views' . DS . strtolower($view) . '.php';
		
		}
		
	

    
        if (file_exists($file)) {
		
            /**
             * trigger render to include file when this model is destroyed
             * if we render it now, we wouldn't be able to assign variables
             * to the view!
             */
            $this->render = $file;
			
        } 
		else{
		
			return "view file doesn't exist.";
		
		}
	
        // Turn output buffering on, capturing all output
        if ($direct_output !== TRUE) {
            ob_start();
        }

        // Parse data variables into local variables
		$data = $this->data;

        // Get template
        include($this->render);
		
        // Get the contents of the buffer and return it
        if ($direct_output !== TRUE) {
            return ob_get_clean();
        }
    }
	
	public function Set_Site_Title($name){
		$this->data['site_title'] = '<title>' . $name . '</title>';
	}
	
	public function Set_Site_Icon($filename){
		if (file_exists(SITE_ROOT . DS . $filename)){
			$this->data['site_icon'] = '<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="' . SITE_ROOT . DS . $filename . '">';
		}
	}
	
	
	public function Set_Meta_Keywords($words){
		$this->data['meta_keywords'] = '<meta name="keywords" content="' . $words . '">';
	}
	
	public function Set_Meta_Description($descr){
		//$this->data['meta_description'] = '<meta name="description" content="' . $descr . '">';
	}
	
	
	public function Set_CSS($filename){
		if (file_exists(ROOT . DS . $filename)){
			
			$this->data['css'] = $this->data['css'] . '<link rel="stylesheet" type="text/css" href="' . SITE_ROOT . '/' . str_replace('\\', '/', $filename) . '">';
		}
	}
	
	public function Set_JS($filename){
		if (file_exists(ROOT . DS . $filename)){
		
			$this->data['js'] = $this->data['js'] . '<SCRIPT LANGUAGE="JavaScript" SRC="' . SITE_ROOT . '/' . str_replace('\\', '/', $filename) . '"></SCRIPT>' . PHP_EOL;
		}
	}
	

	

    public function __destruct() {
	
    }
}
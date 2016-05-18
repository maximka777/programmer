<?php
    include_once('libs/Smarty.class.php');

    class PSmarty extends Smarty 
    {
    	public function PSmarty()
    	{
    		parent::__construct();
    		$this->template_dir = './templates/';
		    $this->compile_dir = './templates_c/';
		    $this->config_dir = './configs/';
		    $this->cache_dir = './cache/';

		    $this->caching = false;
		    $this->assign('app_name', 'Programmer.by');
            #$this->display($tpl_name);
    	}
    }
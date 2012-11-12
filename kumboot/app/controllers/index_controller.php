<?php
/**
 * Controller por defecto si no se usa el routes
 * 
 */
class IndexController extends AppController 
{
	public function index()
	{
		Flash::success("success");
		Flash::warning("success");
		Flash::info("success");
	}
}

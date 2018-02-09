<?php
namespace app\mobile\controller;
use app\common\controller\MobileBase;
class Index extends MobileBase
{
	private $db;
	public function __construct()
	{
	    parent::__construct();

	}
    public function index()
    {
       return ['template'=>'ffff'];
    }




}

<?php require_once('lib/config.php');

class File extends Base
{
	public $name;
	public $dir;
	public $ext;
	private $_owner;
	private $_ls;
	private $_sudo_pw;

	public function __construct($sudo_pw = null)
	{
		parent::__construct();
		$this->_sudo_pw = $sudo_pw;
		$this->init();
	}
	public function init()
	{	
		$pathinfo 	= pathinfo(__FILE__);
		$this->dir 	= $pathinfo['dirname'];
		$this->ext 	= $pathinfo['extension'];
		$this->name = $pathinfo['basename'];
	}
	public function pwd()
	{
		_e(getcwd());
		return $this;
	}
	public function ls()
	{
		$list = scandir(getcwd());
		$this->_ls = $list;
		foreach($list as $item)
		{
			_e($item);
		}
		return $this;
	}
	public function cd($path)
	{
		chdir($this->pwd());
		$this->dir = $path;
		$this->ls();
		return $this;
	}
	public function whoowns($file)
	{
		if(file_exists($file)){
			$owner 			= fileowner($file);
			$owner_info 	= posix_getpwuid($owner);
			$gname  		= posix_getgrgid($owner_info['gid'])['name'];
			$this->owner 	= $owner;
			$this->group 	= $gname;
			_e($gname, "Group");
		}
		_e($file, "$file Does not exist");
		
		return $this;
	}
	public function needs_sudo($filename)
	{
		$group 	= $this->whoowns($filename);
		_e(($group == 'staff'), 'needs sudo? ');

		return ($group == 'staff') ? true : false;
	}
	public function whoami($user = '')
	{
		if($user == ''){
			$whoami = `whoami`;
			_e($whoami, "username");
		}
		return $this;
	}
	public function rm($filename)
	{	
		if(file_exists($filename) && (is_writable($filename) && is_executable($filename)))
		{	
			$result = (unlink($filename)) ? '<br>Your file has been successfully removed <br>' : '<br>There was an error removing your file.<br>';
			_e($result);
		} 
		else 
		{
			if(!file_exists($filename)) 
			{
				_e($filename, " does not exist "); 
				return $this;
			}
			_e((int) is_writable($filename), "is_writeable");
			_e((int) is_executable($filename), "is_executable");
			
			chmod($filename, 0777);
			
			_e((int) is_writable($filename), "is_writeable");
			_e((int) is_executable($filename), "is_executable");
			$this->rm($filename);
		}
		return $this;
	}
}
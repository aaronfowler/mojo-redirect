<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Redirect Add-on
 *
 * @package		MojoMotor
 * @subpackage	Addons
 * @version		1.1.0
 * @author		Aaron Fowler
 * @link		http://twitter.com/adfowler
 */
class Redirect
{
	var $addon_version = '1.1.0';
	var $display_name = 'Redirect';
	private $mojo;

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		$this->mojo =& get_instance();
		$this->mojo->load->model('page_model');
	}

	// --------------------------------------------------------------------

	/**
	 * Page
	 *
	 * Redirects the browser to the URL provided in the page's description field.
	 *
	 * @access	public
	 * @return	mixed
	 */
	function page()
	{
		if ($page_info = $this->mojo->page_model->get_page_by_url_title($this->mojo->mojomotor_parser->url_title))
		{
			$location = trim($page_info->meta_description);
			if ($location != '')
			{
				header('Location: ' . $location); /* Redirect browser */
				exit;
			}
			else
			{
				return 'No URL provided in page description field. (' . __FILE__ . ' ' . __LINE__ . ')';
			}
		}
		else
		{
			return 'Unable to get page information. (' . __FILE__ . ' ' . __LINE__ . ')';
		}
	}


}

/* End of file redirect.php */
/* Location: system/mojomotor/third_party/redirect/libraries/redirect.php */
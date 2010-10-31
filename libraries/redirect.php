<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Redirect Add-on
 *
 * @package		MojoMotor
 * @subpackage	Addons
 * @version		1.0
 * @author		Aaron Fowler
 * @link		http://twitter.com/adfowler
 */
class Redirect
{
	var $addon_version = '1.0';
	var $display_name = 'Redirect';

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		$this->CI =& get_instance();
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
		if ($page = $this->CI->mojomotor_parser->page->page_info)
		{
			$location = trim($page->meta_description);
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
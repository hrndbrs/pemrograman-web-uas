<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function nav_active($segment, $target)
{
	return ($segment === $target) ? 'active' : '';
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function validate_resource_id($id)
{
	return is_numeric($id) && (int)$id > 0 ? (int) $id : null;
}

function validate_page_input(string $page)
{
	return (is_numeric($page) && (int)$page > 0)
		? (int)$page
		: 1;
}

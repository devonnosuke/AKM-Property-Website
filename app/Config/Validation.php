<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $personal = [
		'fullname' => 'required|min_length[6]',
		'born' => 'required',
		'age' => 'required|is_natural',
		'gender' => 'required',
		'country' => 'required',
		'about_text' => 'required',
		'cv' => 'max_size[cv,3548]|mime_in[cv,application/pdf]|ext_in[cv,pdf]',
		'img' => 'max_size[img,3548]|mime_in[img,image/img,image/jpg,image/png,image/jpeg]|ext_in[img,jpg,png,jpeg]',
	];

	public $sliders = [
		'tagline' => 'required|min_length[7]',
		'align' => 'required',
		'description' => 'required',
		'img' => 'uploaded[img]|max_size[img,10240]|mime_in[img,image/img,image/jpg,image/png,image/jpeg]|ext_in[img,jpg,png,jpeg]'
	];

	public $slidersEdit = [
		'tagline' => 'required|min_length[7]',
		'align' => 'required',
		'description' => 'required',
		'img' => 'max_size[img,10240]|mime_in[img,image/img,image/jpg,image/png,image/jpeg]|ext_in[img,jpg,png,jpeg]'
	];

	public $services = [
		'name' => 'required|min_length[7]',
		'description' => 'required',
		'features' => 'required',
		'img' => 'uploaded[img]|max_size[img,10240]|mime_in[img,image/img,image/jpg,image/png,image/jpeg]|ext_in[img,jpg,png,jpeg]'
	];


	public $servicesEdit = [
		'name' => 'required|min_length[7]',
		'description' => 'required',
		'features' => 'required',
		'img' => 'max_size[img,10240]|mime_in[img,image/img,image/jpg,image/png,image/jpeg]|ext_in[img,jpg,png,jpeg]'
	];

	public $educational = [
		'country_collage' => 'required',
		'collage_name' => 'required|min_length[7]',
		'title' => 'required',
		'major' => 'required',
		'year_graduation' => 'required|is_natural'
	];


	public $portfolio = [
		'file_name' => 'required',
		'type' => 'required',
		'captions' => 'required'
	];

	public $skills = [
		'skill_name' => 'required',
		'skill_value' => 'required'
	];


	public $social_contact = [
		'contact_type' => 'required',
		'link' => 'required'
	];

	public $address_contact = [
		'address' => 'required',
		'country' => 'required',
		'telephone' => 'required',
		'phone' => 'required',
		'email' => 'required',
	];

	public $faq = [
		'questions' => 'required',
		'answer' => 'required'
	];
}

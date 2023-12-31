<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['auth', 'ValidationSet_helper', 'ImageManipulation_helper', 'ReadTable_helper', 'form'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->skillsModels = new \App\Models\SkillsModel();
		$this->slidersModels = new \App\Models\SlidersModel();
		$this->personalModels = new \App\Models\PersonalModel();
		$this->portfolioModels = new \App\Models\PortfolioModel();
		$this->socialcontactModels = new \App\Models\SocialContactModel();
		$this->educationalModels = new \App\Models\EducationalModel();
		$this->servicesModels = new \App\Models\ServicesModel();
		$this->ctaModels = new \App\Models\CtaModel();
		$this->faqModels = new \App\Models\FaqModel();
		$this->addressContactModels = new \App\Models\AddressContactModel();
		$this->validation = \Config\Services::validation();
		$this->NotFoundMsg = "Page not Found";
		
		// AKM-Property Specifik
		$this->propertyModels = new \App\Models\PropertyModel();
		$this->propertyImgModels = new \App\Models\PropertyImgModel();
		$this->promoModels = new \App\Models\PromoModel();
		$this->specificationModels = new \App\Models\SpecificationModel();
		
		helper('auth');
	}
}

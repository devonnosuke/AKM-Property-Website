<?php

namespace App\Controllers;

class LandingPages extends BaseController
{

	public function __construct()
	{
		
	}

	function counter(){
		$ip    = $this->request->getIPAddress(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");
		
		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
		$db = \Config\Database::connect();
		$s = $db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->getNumRows();
		$ss = isset($s)?($s):0;
		
		
		// Kalau belum ada, simpan data user tersebut ke database
		if($ss == 0){
		$db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
		}
		
		// Jika sudah ada, update
		else{
		$db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
		}
	}

	public function index()
	{
		$this->counter();
		$data = [
			'properties' => $this->propertyModels->findAll(),
			'educational' => $this->educationalModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'skills' => $this->skillsModels->findAll(),
			'sliders' => $this->slidersModels->findAll(),
			'social' => $this->socialcontactModels->findAll(),
			'services' => $this->servicesModels->findAll(),
			'cta' => $this->ctaModels->findAll(),
			'faqs' => $this->faqModels->findAll(),
			// 'promos' => $this->promoModels->findAll(),
			'promos' => $this->promoModels->findAllPromo(),
			'properties' => $this->propertyModels->findAll(),
			'title' => 'Landing Pages'
		];
        $data['index_active'] = 'active';

		// dd($data['promos']);
		return view('landing/index', $data);
	}

	public function contact()
	{
		$data = [
			'portfolio' => $this->portfolioModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'social' => $this->socialcontactModels->findAll(),
			'contact' => $this->addressContactModels->find(1),
			'contact1' => $this->addressContactModels->find(2),
			'title' => 'Contact us'
		];
        $data['contact_active'] = 'active';

		return view('landing/contact', $data);
	}

	public function download($cvName)
	{
		return $this->response->download('assets/cv/' . $cvName, null);
	}

	public function sendMail()
	{
		$emailTo = $this->request->getVar('email');
		$name = $this->request->getVar('name');
		$message = $this->request->getVar('message');

		$this->email->setFrom('yuracompanypalu@gmail.com', 'noreply@yuracompany.com');
		$this->email->setTo('yuracompanypalu@gmail.com');

		$this->email->setSubject('Contact Us Email from yuracompany.com website');

		$this->email->setMessage("
			<div style='font-size:1.3rem'>
				<h1>Contact Us Email from yuracompany.com website</h1>
				<p>From/Name: <b>$name</b></p>
				<p>Email: <b>$emailTo</b></p>
				<p>Message: <br><b>$message</b></p>
				<i>*No need to reply this email</i>
			</div>
		");

		if (!$this->email->send()) {
			session()->setFlashdata('info', 'Failed to Send message');
			return redirect()->back();
		} else {
			session()->setFlashdata('info', 'Thank you!');
			return redirect()->back();
		}
	}

	public function property($slug = false)
	{
		$data = [
			'portfolio' => $this->portfolioModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'properties' => $this->propertyModels->findAll(),
			'social' => $this->socialcontactModels->findAll(),
			'contact' => $this->addressContactModels->find(1),
			'title' => 'Contact us'
		];
        $data['property_active'] = 'active';
		
		if ($slug) {
			$proprety = $this->propertyModels->getBySlug($slug);
			$dataGallery = $this->propertyImgModels->getPropertyById($proprety[0]['id']);
			
			$data = [
				'portfolio' => $this->portfolioModels->findAll(),
				'property' => $proprety[0],
				'personal' => $this->personalModels->find('1'),
				'social' => $this->socialcontactModels->findAll(),
				'contact' => $this->addressContactModels->find(1),
				'title' => 'Detail Properti',
				'services' => $this->servicesModels->findAll(),
				'cta' => $this->ctaModels->findAll(),
				'gallery' => $dataGallery,
			];
			return view('landing/property-single', $data);
		}
		
		return view('landing/property', $data);
	}

	public function promo($slug = false)
	{
		$data = [
			'portfolio' => $this->portfolioModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'social' => $this->socialcontactModels->findAll(),
			'promo' => $this->promoModels->findAll(),
			'title' => 'Contact us'
		];
		$data['promo_active'] = 'active';
		
		if ($slug) {
			$promo = $this->promoModels->getBySlug($slug);
			$property = $this->propertyModels->findId($promo[0]['id_property']);
			$data = [
				'promo' => $promo[0],
				'property' => $property[0],
				'portfolio' => $this->portfolioModels->findAll(),
				'personal' => $this->personalModels->find('1'),
				'social' => $this->socialcontactModels->findAll(),
				'contact' => $this->addressContactModels->find(1),
				'title' => 'Detail Properti',
				'services' => $this->servicesModels->findAll(),
				'cta' => $this->ctaModels->findAll(),
			];
			$data['promo_active'] = 'active';
			return view('landing/promo-single', $data);
		}
		
		return view('landing/promo', $data);
	}

	public function sendWA() {
		$name = $this->request->getVar('name');
		$message = $this->request->getVar('message');

		$link = "https://wa.me/+6284646322123?text=Hallo saya $name, saya telah melihat info di akmproperti.com dan ingin bertanya tentang $message";

		return redirect()->to($link);
	}


}

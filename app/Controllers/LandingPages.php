<?php

namespace App\Controllers;

class LandingPages extends BaseController
{

	public function __construct()
	{
		$this->email = \Config\Services::email();
	}

	public function index()
	{
		$data = [
			'educational' => $this->educationalModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'skills' => $this->skillsModels->findAll(),
			'sliders' => $this->slidersModels->findAll(),
			'social' => $this->socialcontactModels->findAll(),
			'services' => $this->servicesModels->findAll(),
			'cta' => $this->ctaModels->findAll(),
			'faqs' => $this->faqModels->findAll(),
			'title' => 'Landing Pages'
		];
		return view('landing/index', $data);
	}

	public function portfolio()
	{
		$data = [
			'portfolio' => $this->portfolioModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'social' => $this->socialcontactModels->findAll(),
			'title' => 'Portfolio'
		];

		return view('landing/portfolio', $data);
	}

	public function faq()
	{
		$data = [
			// 'faqs' => $this->faqModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'social' => $this->socialcontactModels->findAll(),
			'title' => 'Frequently Asked Questions',
			'faqs' => $this->faqModels->findAll(),
		];

		return view('landing/faq', $data);
	}

	public function contact()
	{
		$data = [
			'portfolio' => $this->portfolioModels->findAll(),
			'personal' => $this->personalModels->find('1'),
			'social' => $this->socialcontactModels->findAll(),
			'contact' => $this->addressContactModels->find(1),
			'title' => 'Contact us'
		];

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
}

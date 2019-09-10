<?php

namespace App\Subscriber;

use ApiPlatform\Core\Exception\InvalidArgumentException;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

Use App\Entity\Ingeschrevenpersoon;

class IngeschrevenpersoonSubscriber implements EventSubscriberInterface
{
	private $params;
	private $em;
	private $serializer;
	
	public function __construct(ParameterBagInterface $params, EntityManagerInterface $em, SerializerInterface $serializer)
	{
		$this->params = $params;
		$this->em= $em;
		$this->serializer= $serializer;
	}
	
	public static function getSubscribedEvents()
	{
		return [
				KernelEvents::VIEW => ['IngeschrevenpersoonOnBsn', EventPriorities::PRE_VALIDATE],
		];
		
	}
	
	public function IngeschrevenpersoonOnBsn(GetResponseForControllerResultEvent $event)
	{
		$result = $event->getControllerResult();
		$burgerservicenummer= $event->getRequest()->attributes->get('burgerservicenummer');
		$method = $event->getRequest()->getMethod();
				
		// Lats make sure that some one posts correctly
		if (Request::METHOD_GET !== $method || $event->getRequest()->get('_route') != 'api_ingeschrevenpersoons_get_on_bsn_collection') { 
			return;
		}
		
		
		
		$result = $this->em->getRepository(Ingeschrevenpersoon::class)->findOneBy(array('burgerservicenummer' => $burgerservicenummer));
		
		// now we need to overide the normal subscriber
		$json = $this->serializer->serialize(
			$result,
			'jsonhal',['enable_max_depth' => true]
		);
		
		$response = new Response(
				$json,
				Response::HTTP_OK,
				['content-type' => 'application/json+hal']
				);
		
		$event->setResponse($response);
		
		return;
	}	
}

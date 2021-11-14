<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\StockSmartphone;
use App\Repository\SmartphoneRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class StockSmartphoneSubscriber implements EventSubscriberInterface
{

    private $sm_rep;

    public function __construct(SmartphoneRepository $smartphoneRepository)
    {
        $this->sm_rep = $smartphoneRepository;
    }
    public function onKernelView(ViewEvent $event)
    {
        $this->addIdOnStockSmartphone($event);
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.view' => ['addIdOnStockSmartphone', EventPriorities::PRE_WRITE]
        ];
    }

    public function addIdOnStockSmartphone(ViewEvent $event){

        // $entity = $event->getControllerResult();
        // $method = $event->getRequest()->getMethod();

        // if($entity instanceof StockSmartphone && $method == Request::METHOD_POST){
            
        //    // $id = $entity->getSmartphone();
        //    // $smatphone = $this->sm_rep->find($id);
        //     //$entity->setSmartphone( $smatphone );
        //     //dump( $entity );
        // }
    }
}

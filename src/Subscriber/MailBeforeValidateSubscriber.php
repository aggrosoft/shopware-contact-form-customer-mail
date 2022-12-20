<?php

namespace AggroContactFormSenderMail\Subscriber;

use Shopware\Core\Content\MailTemplate\Service\Event\MailBeforeValidateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailBeforeValidateSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            MailBeforeValidateEvent::class => 'onMailBeforeValidateEvent',
        ];
    }

    public function onMailBeforeValidateEvent(MailBeforeValidateEvent $event)
    {
        $data = $event->getTemplateData();
        if( isset($data['contactFormData']) && isset($data['contactFormData']['email']) ){
            $event->addData('senderMail', $data['contactFormData']['email']);
        }
    }
}
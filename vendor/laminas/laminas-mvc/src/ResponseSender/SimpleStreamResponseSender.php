<?php

namespace Laminas\Mvc\ResponseSender;

use Laminas\Http\Response\Stream;

class SimpleStreamResponseSender extends AbstractResponseSender
{
    /**
     * Send the stream
     *
     * @return SimpleStreamResponseSender
     */
    public function sendStream(SendResponseEvent $event)
    {
        if ($event->contentSent()) {
            return $this;
        }
        $response = $event->getResponse();
        $stream   = $response->getStream();
        fpassthru($stream);
        $event->setContentSent();
    }

    /**
     * Send stream response
     *
     * @param  SendResponseEvent $event
     * @return SimpleStreamResponseSender
     */
    public function __invoke(SendResponseEvent $event)
    {
        $response = $event->getResponse();
        if (! $response instanceof Stream) {
            return $this;
        }

        $this->sendHeaders($event);
        $this->sendStream($event);
        $event->stopPropagation(true);
        return $this;
    }
}

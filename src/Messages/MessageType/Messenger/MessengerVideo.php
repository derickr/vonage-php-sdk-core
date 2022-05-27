<?php

namespace Vonage\Messages\MessageType\Messenger;

use Vonage\Messages\MessageObjects\VideoObject;
use Vonage\Messages\MessageType\BaseMessage;

class MessengerVideo extends BaseMessage
{
    use MessengerObjectTrait;

    protected string $channel = 'messenger';
    protected string $subType = BaseMessage::MESSAGES_SUBTYPE_VIDEO;
    protected VideoObject $videoObject;

    public function __construct(
        string $to,
        string $from,
        VideoObject $videoObject,
        string $category,
        string $tag = ''
    ) {
        $this->to = $to;
        $this->from = $from;
        $this->videoObject = $videoObject;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function toArray(): array
    {
        return [
            'message_type' => $this->getSubType(),
            'video' => $this->videoObject->toArray(),
            'to' => $this->getTo(),
            'from' => $this->getFrom(),
            'channel' => $this->getChannel(),
            'client_ref' => $this->getClientRef(),
            'messenger' => $this->getMessengerObject()
        ];
    }
}
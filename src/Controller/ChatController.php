<?php

namespace Asapo\DailyHub\SuluBundle\Controller;

use Asapo\DailyHub\Chat\Application\ChatContext;
use Asapo\DailyHub\Chat\Domain\Model\Chat;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ChatController
{
    public function __construct(
        private readonly ChatContext $chatContext,
    ) {
    }

    public function getAction(Request $request): JsonResponse
    {
        $session = $request->getSession();
        /** @var Chat $chat */
        $chat = $session->get('chat') ?? $this->chatContext->createChat();

        return new JsonResponse($chat);
    }

    public function promptAction(Request $request): JsonResponse
    {
        $session = $request->getSession();
        /** @var Chat $chat */
        $chat = $session->get('chat') ?? $this->chatContext->createChat();

        $chat = $this->chatContext->addPrompt($chat, $request->get('prompt'));
        $session->set('chat', $chat);

        return new JsonResponse($chat);
    }
}

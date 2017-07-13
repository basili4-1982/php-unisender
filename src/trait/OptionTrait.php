<?php

trait OptionTrait
{
    protected $templateEngine = null;
    protected $templateId = null;

    // Текст сообщения
    protected $subject = null;
    protected $body = null;

    protected $typeBody = null; // (TYPE_HTML | TYPE_PLAINTEXT)
    protected $fromEmail='';
    protected $fromName='';

    // Список замен
    private $substitutions = [];

    private $recipients = [];

    private $metadata = [];

    private $headers = [];

    private $options = [];

    private $attachments = [];
    private $inlineAttachments = [];

    public function addSubs($key, $substitution)
    {
        $this->substitutions[ $key ] = $substitution;
    }

    public function setBody($body, $type = self::TYPE_PLAINTEXT)
    {
        if ($type == self::TYPE_PLAINTEXT) {
            $body = htmlspecialchars($body);
        }

        $this->typeBody = $type;
        $this->body = $body;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setFrom($fromEmail,$fromName)
    {
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
    }

    public function addRecipient(Recipient $recipient)
    {
        $this->recipients[] = $recipient;
    }

    public function addMetadata($key, $val)
    {
        $this->metadata[ $key ] = $val;
    }

    public function addHeaders($key, $val)
    {
        $this->headers[ $key ] = $val;
    }

    public function addOptions($key, $val)
    {
        $this->options[ $key ] = $val;
    }

    public function addAttachments(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
    }

    public function addInlineAttachments(Attachment $attachment)
    {
        $this->inlineAttachments[] = $attachment;
    }
}
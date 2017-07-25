<?php
/**
 * Created by PhpStorm.
 * User: V.ahmedzhanov
 * Date: 25/07/17
 * Time: 11:52
 */

namespace unisender\data;


class TemplData
{
    private $name;
    private $emailFrom;
    private $fromName;
    private $templateEngine;
    private $subject;
    private $unsubscribeUrl;
    private $substitutions = [];
    private $headers = [];
    private $attachments = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function fromUserData($emailFrom, $fromName = null)
    {
        $this->emailFrom = $emailFrom;

        if (empty($fromName)) {
            $fromName = $emailFrom;
        }

        $this->fromName = $fromName;
    }

    public function setTemplateEngine($templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function addSubstitution($key, $val)
    {
        $this->substitutions[ $key ] = $val;
    }

    public function addAttach(AttachData $attach)
    {
        $inline = $attach->inline ? 'inline' : '_';

        $this->attachments[ $inline ][] = $attach;
    }

    public function setBody($body, $isHtml = true)
    {

    }

    public function addHeader($headerKey, $headerVal)
    {
        $this->headers[ $headerKey ] = $headerVal;
    }

    public function setUnsubscribeUrl($url)
    {
        $this->unsubscribeUrl = $url;
    }

    public function __invoke()
    {
        return [];
    }
}
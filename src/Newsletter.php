<?php


class Newsletter implements OptionInterface
{
    use OptionTrait;

    private $template = null;

    public function applyTemplate(Template $template)
    {
        $this->template = $template;
    }

    public function run()
    {

    }
}
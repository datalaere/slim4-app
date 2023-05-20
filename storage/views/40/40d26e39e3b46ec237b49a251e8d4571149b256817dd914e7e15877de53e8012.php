<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* app.twig */
class __TwigTemplate_9f6a82813dbc7c6e90a2d07209a60e48d1d5bdcc00a11a828e9e6f1a62059c1c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <title>App</title>
    </head>
    <body>
        ";
        // line 8
        $this->displayBlock('content', $context, $blocks);
        // line 9
        echo "    </body>
</html>
";
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "app.twig";
    }

    public function getDebugInfo()
    {
        return array (  55 => 8,  49 => 9,  47 => 8,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "app.twig", "C:\\Ampps\\www\\slim4-app\\app\\resources\\views\\app.twig");
    }
}

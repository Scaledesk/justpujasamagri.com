<?php

/* customizer_divider_control.html.twig */
class __TwigTemplate_4cf9db12cffd9167ca2dcbeaf1195d1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
";
        // line 8
        ob_start();
        // line 9
        if ((isset($context["label"]) ? $context["label"] : null)) {
            echo "<span>";
            echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
            echo "</span>";
        }
        // line 10
        echo "<div></div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "customizer_divider_control.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 10,  24 => 9,  22 => 8,  19 => 7,);
    }
}

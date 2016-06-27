<?php

/* customizer_divider_control.html.twig */
class __TwigTemplate_af2bd0504a7e2fe6b1b3973f6f8a7ea9 extends Twig_Template
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
        if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
        if ($_label_) {
            echo "<span>";
            if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
            echo twig_escape_filter($this->env, $_label_, "html", null, true);
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
        return array (  32 => 10,  24 => 9,  22 => 8,  19 => 7,);
    }
}

<?php

/* customizer_slide_control.html.twig */
class __TwigTemplate_bba4fe76eac2c6d76d2a0fe6a82d56f3 extends Twig_Template
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
        echo "<label>
\t<span class=\"customize-control-title\">";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
        echo "</span>
    <div id=\"slider_";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\" class=\"myatu_bgm_slider\" style=\"";
        if ((isset($context["is_rtl"]) ? $context["is_rtl"] : null)) {
            echo "float:right; clear: left;";
        } else {
            echo "float:left; clear:right;";
        }
        echo "s\">
        <input type=\"text\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        echo "\" ";
        echo (isset($context["link"]) ? $context["link"] : null);
        echo " style=\"display: none;\" />

        <span>";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["left_label"]) ? $context["left_label"] : null), "html", null, true);
        echo "</span>
        <div id=\"slider_";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_control\" class=\"myatu_bgm_inline myatu_bgm_slider_control\" style=\"";
        if (((isset($context["left_label"]) ? $context["left_label"] : null) == "")) {
            echo "margin-right:10px;";
        } else {
            echo "margin:0 10px;";
        }
        echo "\"></div>
        ";
        // line 16
        if ((isset($context["show_value"]) ? $context["show_value"] : null)) {
            // line 17
            echo "            <span id=\"slider_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "_val\">";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["right_label"]) ? $context["right_label"] : null), "html", null, true);
            echo "</span>
        ";
        } else {
            // line 19
            echo "            <span>";
            echo twig_escape_filter($this->env, (isset($context["right_label"]) ? $context["right_label"] : null), "html", null, true);
            echo "</span>
        ";
        }
        // line 21
        echo "    </div>
</label>

<script type=\"text/javascript\">
/*<![CDATA[*/
";
        // line 49
        echo "(function(\$){var slider_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_timer;\$(document).ready(function(\$){\$('#slider_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_control').slider({value:";
        if ((isset($context["reverse"]) ? $context["reverse"] : null)) {
            echo "(";
            echo twig_escape_filter($this->env, (isset($context["max"]) ? $context["max"] : null), "html", null, true);
            echo "+";
            echo twig_escape_filter($this->env, (isset($context["min"]) ? $context["min"] : null), "html", null, true);
            echo ")-";
        }
        echo "\$(\"#slider_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo " input\").val(),";
        if ((isset($context["range"]) ? $context["range"] : null)) {
            echo "range:'";
            echo twig_escape_filter($this->env, (isset($context["range"]) ? $context["range"] : null), "html", null, true);
            echo "',";
        }
        echo "min:";
        echo twig_escape_filter($this->env, (isset($context["min"]) ? $context["min"] : null), "html", null, true);
        echo ",max:";
        echo twig_escape_filter($this->env, (isset($context["max"]) ? $context["max"] : null), "html", null, true);
        echo ",step:";
        echo twig_escape_filter($this->env, (isset($context["step"]) ? $context["step"] : null), "html", null, true);
        echo ",slide:function(e,u){var v=";
        if ((isset($context["reverse"]) ? $context["reverse"] : null)) {
            echo "(";
            echo twig_escape_filter($this->env, (isset($context["max"]) ? $context["max"] : null), "html", null, true);
            echo "+";
            echo twig_escape_filter($this->env, (isset($context["min"]) ? $context["min"] : null), "html", null, true);
            echo ")-";
        }
        echo "u.value;";
        if ((isset($context["show_value"]) ? $context["show_value"] : null)) {
            echo "\$(\"#slider_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "_val\").text(v+'";
            echo twig_escape_filter($this->env, (isset($context["right_label"]) ? $context["right_label"] : null), "html", null, true);
            echo "');";
        }
        echo "\$(\"#slider_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo " input\").val(v);},stop:function(e,u){\$(\"#slider_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo " input\").change();}});});})(jQuery);
/*]]>*/
</script>

";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "customizer_slide_control.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 49,  79 => 21,  73 => 19,  64 => 17,  62 => 16,  52 => 15,  48 => 14,  41 => 12,  31 => 11,  27 => 10,  30 => 10,  24 => 9,  22 => 8,  19 => 7,);
    }
}

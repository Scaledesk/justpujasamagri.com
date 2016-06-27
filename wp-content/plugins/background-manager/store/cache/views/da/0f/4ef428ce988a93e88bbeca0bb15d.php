<?php

/* customizer_slide_control.html.twig */
class __TwigTemplate_da0f4ef428ce988a93e88bbeca0bb15d extends Twig_Template
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
        if (isset($context["label"])) { $_label_ = $context["label"]; } else { $_label_ = null; }
        echo twig_escape_filter($this->env, $_label_, "html", null, true);
        echo "</span>
    <div id=\"slider_";
        // line 11
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo "\" class=\"myatu_bgm_slider\" style=\"";
        if (isset($context["is_rtl"])) { $_is_rtl_ = $context["is_rtl"]; } else { $_is_rtl_ = null; }
        if ($_is_rtl_) {
            echo "float:right; clear: left;";
        } else {
            echo "float:left; clear:right;";
        }
        echo "s\">
        <input type=\"text\" value=\"";
        // line 12
        if (isset($context["value"])) { $_value_ = $context["value"]; } else { $_value_ = null; }
        echo twig_escape_filter($this->env, $_value_, "html", null, true);
        echo "\" ";
        if (isset($context["link"])) { $_link_ = $context["link"]; } else { $_link_ = null; }
        echo $_link_;
        echo " style=\"display: none;\" />

        <span>";
        // line 14
        if (isset($context["left_label"])) { $_left_label_ = $context["left_label"]; } else { $_left_label_ = null; }
        echo twig_escape_filter($this->env, $_left_label_, "html", null, true);
        echo "</span>
        <div id=\"slider_";
        // line 15
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo "_control\" class=\"myatu_bgm_inline myatu_bgm_slider_control\" style=\"";
        if (isset($context["left_label"])) { $_left_label_ = $context["left_label"]; } else { $_left_label_ = null; }
        if (($_left_label_ == "")) {
            echo "margin-right:10px;";
        } else {
            echo "margin:0 10px;";
        }
        echo "\"></div>
        ";
        // line 16
        if (isset($context["show_value"])) { $_show_value_ = $context["show_value"]; } else { $_show_value_ = null; }
        if ($_show_value_) {
            // line 17
            echo "            <span id=\"slider_";
            if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
            echo twig_escape_filter($this->env, $_id_, "html", null, true);
            echo "_val\">";
            if (isset($context["value"])) { $_value_ = $context["value"]; } else { $_value_ = null; }
            echo twig_escape_filter($this->env, $_value_, "html", null, true);
            if (isset($context["right_label"])) { $_right_label_ = $context["right_label"]; } else { $_right_label_ = null; }
            echo twig_escape_filter($this->env, $_right_label_, "html", null, true);
            echo "</span>
        ";
        } else {
            // line 19
            echo "            <span>";
            if (isset($context["right_label"])) { $_right_label_ = $context["right_label"]; } else { $_right_label_ = null; }
            echo twig_escape_filter($this->env, $_right_label_, "html", null, true);
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
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo "_timer;\$(document).ready(function(\$){\$('#slider_";
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo "_control').slider({value:";
        if (isset($context["reverse"])) { $_reverse_ = $context["reverse"]; } else { $_reverse_ = null; }
        if ($_reverse_) {
            echo "(";
            if (isset($context["max"])) { $_max_ = $context["max"]; } else { $_max_ = null; }
            echo twig_escape_filter($this->env, $_max_, "html", null, true);
            echo "+";
            if (isset($context["min"])) { $_min_ = $context["min"]; } else { $_min_ = null; }
            echo twig_escape_filter($this->env, $_min_, "html", null, true);
            echo ")-";
        }
        echo "\$(\"#slider_";
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo " input\").val(),";
        if (isset($context["range"])) { $_range_ = $context["range"]; } else { $_range_ = null; }
        if ($_range_) {
            echo "range:'";
            if (isset($context["range"])) { $_range_ = $context["range"]; } else { $_range_ = null; }
            echo twig_escape_filter($this->env, $_range_, "html", null, true);
            echo "',";
        }
        echo "min:";
        if (isset($context["min"])) { $_min_ = $context["min"]; } else { $_min_ = null; }
        echo twig_escape_filter($this->env, $_min_, "html", null, true);
        echo ",max:";
        if (isset($context["max"])) { $_max_ = $context["max"]; } else { $_max_ = null; }
        echo twig_escape_filter($this->env, $_max_, "html", null, true);
        echo ",step:";
        if (isset($context["step"])) { $_step_ = $context["step"]; } else { $_step_ = null; }
        echo twig_escape_filter($this->env, $_step_, "html", null, true);
        echo ",slide:function(e,u){var v=";
        if (isset($context["reverse"])) { $_reverse_ = $context["reverse"]; } else { $_reverse_ = null; }
        if ($_reverse_) {
            echo "(";
            if (isset($context["max"])) { $_max_ = $context["max"]; } else { $_max_ = null; }
            echo twig_escape_filter($this->env, $_max_, "html", null, true);
            echo "+";
            if (isset($context["min"])) { $_min_ = $context["min"]; } else { $_min_ = null; }
            echo twig_escape_filter($this->env, $_min_, "html", null, true);
            echo ")-";
        }
        echo "u.value;";
        if (isset($context["show_value"])) { $_show_value_ = $context["show_value"]; } else { $_show_value_ = null; }
        if ($_show_value_) {
            echo "\$(\"#slider_";
            if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
            echo twig_escape_filter($this->env, $_id_, "html", null, true);
            echo "_val\").text(v+'";
            if (isset($context["right_label"])) { $_right_label_ = $context["right_label"]; } else { $_right_label_ = null; }
            echo twig_escape_filter($this->env, $_right_label_, "html", null, true);
            echo "');";
        }
        echo "\$(\"#slider_";
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
        echo " input\").val(v);},stop:function(e,u){\$(\"#slider_";
        if (isset($context["id"])) { $_id_ = $context["id"]; } else { $_id_ = null; }
        echo twig_escape_filter($this->env, $_id_, "html", null, true);
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
        return array (  99 => 49,  92 => 21,  85 => 19,  73 => 17,  70 => 16,  58 => 15,  53 => 14,  44 => 12,  27 => 10,  32 => 11,  24 => 9,  22 => 8,  19 => 7,);
    }
}

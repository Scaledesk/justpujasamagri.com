<?php

/* macros_edit.html.twig */
class __TwigTemplate_7ed26de88fef6035b06f56341dcab407 extends Twig_Template
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
        // line 62
        echo "
";
    }

    // line 9
    public function getfarbtastic_script($_id = null)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $_id,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 10
            if ((!twig_test_empty((isset($context["id"]) ? $context["id"] : null)))) {
                // line 11
                echo "    ";
                $context["id"] = ((isset($context["id"]) ? $context["id"] : null) . "_");
            }
            // line 12
            echo " 
<script type=\"text/javascript\">
/*<![CDATA[*/
";
            // line 58
            echo "(function(a){myatu_bgm_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color={showHideClear:function(){var b=a(\"#background_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\").val();if(b&&b.charAt(0)==\"#\"){if(b.length>1){a(\"#clear_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\").show()}else{a(\"#clear_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\").hide()}}}};a(document).ready(function(c){var b=\"#myatu_bg_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color_picker\",d=\"#background_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\";c(b).farbtastic(function(e){c(d).attr(\"value\",e)});c.farbtastic(b).setColor(c(d).val());c(d).focusin(function(){c(b).show()}).focusout(function(){c(b).hide();myatu_bgm_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color.showHideClear()}).keyup(function(){if(this.value.charAt(0)!=\"#\"){this.value=\"#\"+this.value}c.farbtastic(b).setColor(c(d).val())});c(\"#clear_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\").click(function(){c(d).val(\"#\");myatu_bgm_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color.showHideClear()});myatu_bgm_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color.showHideClear()})})(jQuery);
/*]]>*/
</script>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 64
    public function getfarbtastic_input($_id = null, $_value = null)
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $_id,
            "value" => $_value,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 65
            if ((!twig_test_empty((isset($context["id"]) ? $context["id"] : null)))) {
                // line 66
                echo "    ";
                $context["id"] = ((isset($context["id"]) ? $context["id"] : null) . "_");
            }
            // line 67
            echo " 
<input type=\"text\" value=\"#";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "\" autocomplete=\"off\" name=\"background_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\" id=\"background_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\" />
<input type=\"button\" id=\"clear_";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color\" class=\"hide-if-no-js button\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clear"), "html", null, true);
            echo "\" />
<div id=\"myatu_bg_";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "color_picker\" class=\"hide-if-no-js\" style=\"z-index:100;background:#eeeeee;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;border:1px solid #ccc;position:absolute;display:none;padding:2px;box-shadow:5px 5px 5px #AAA;-moz-box-shadow:5px 5px 5px #AAA;-webkit-box-shadow:5px 5px 5px #AAA;\"></div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macros_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 70,  104 => 68,  101 => 67,  95 => 65,  83 => 64,  49 => 58,  44 => 12,  40 => 11,  27 => 9,  112 => 69,  103 => 41,  97 => 66,  90 => 33,  75 => 31,  71 => 30,  64 => 26,  57 => 21,  42 => 19,  38 => 10,  31 => 14,  24 => 9,  22 => 62,  19 => 7,);
    }
}

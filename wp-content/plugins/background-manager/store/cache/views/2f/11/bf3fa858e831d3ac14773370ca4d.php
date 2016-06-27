<?php

/* meta_single.html.twig */
class __TwigTemplate_2f11bf3fa858e831d3ac14773370ca4d extends Twig_Template
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
        $context["me"] = $this->env->loadTemplate("macros_edit.html.twig");
        // line 9
        echo "
<table class=\"form-table\">
    <tbody>
        <tr valign=\"top\">
            <th scope=\"row\">
                <label for=\"active_gallery\">";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Image Set"), "html", null, true);
        echo "</label>
            </th>
            <td>
                <select id=\"active_gallery\" class=\"postform\" name=\"active_gallery\">
                    ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["galleries"]) ? $context["galleries"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["gallery"]) {
            // line 19
            echo "                    <option ";
            if ($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "selected")) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "name"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gallery'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "                </select>
            </td>
        </tr>
        <tr valign=\"top\">
            <th scope=\"row\">
                <label for=\"active_overlay\">";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Overlay"), "html", null, true);
        echo "</label>
            </th>
            <td>
                <select id=\"active_overlay\" class=\"postform\" name=\"active_overlay\">
                    ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["overlays"]) ? $context["overlays"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["overlay"]) {
            // line 31
            echo "                    <option ";
            if ($this->getAttribute((isset($context["overlay"]) ? $context["overlay"] : null), "selected")) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["overlay"]) ? $context["overlay"] : null), "value"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["overlay"]) ? $context["overlay"] : null), "desc"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['overlay'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "                </select>
            </td>
        </tr>
        <tr valign=\"top\">
            <th scope=\"row\">
                <label for=\"background_color\">";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Color"), "html", null, true);
        echo "</label>
            </th>
            <td>
                ";
        // line 41
        echo $context["me"]->getfarbtastic_input("", (isset($context["background_color"]) ? $context["background_color"] : null));
        echo "
            </td>
        </tr>
    </tbody>
</table>

";
        // line 47
        echo $context["me"]->getfarbtastic_script("");
        echo "
";
    }

    public function getTemplateName()
    {
        return "meta_single.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 47,  103 => 41,  97 => 38,  90 => 33,  75 => 31,  71 => 30,  64 => 26,  57 => 21,  42 => 19,  38 => 18,  31 => 14,  24 => 9,  22 => 8,  19 => 7,);
    }
}

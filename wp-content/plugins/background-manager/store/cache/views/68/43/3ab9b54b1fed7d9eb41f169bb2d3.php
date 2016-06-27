<?php

/* pub_footer.html.twig */
class __TwigTemplate_68433ab9b54b1fed7d9eb41f169bb2d3 extends Twig_Template
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
<!-- Background Manager Start -->
";
        // line 9
        ob_start();
        // line 10
        echo "
";
        // line 12
        if ($this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "bg_link")) {
            echo "<a id=\"myatu_bgm_bg_link\" class=\"myatu_bgm_fs\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "bg_link"), "html", null, true);
            echo "\"></a>";
        }
        // line 13
        echo "
";
        // line 15
        if ((isset($context["has_overlay"]) ? $context["has_overlay"] : null)) {
            echo "<div id=\"myatu_bgm_overlay\" class=\"myatu_bgm_fs\"></div>";
        }
        // line 16
        echo "
";
        // line 18
        if ((isset($context["is_fullsize"]) ? $context["is_fullsize"] : null)) {
            // line 19
            echo "<div id=\"myatu_bgm_img_group\" class=\"myatu_bgm_fs\" style=\"overflow: hidden;\">
    <script type=\"text/javascript\">
    /*<![CDATA[*/
    ";
            // line 39
            echo "    try{(function(a){myatu_bgm.addTopImage(\"";
            if (((isset($context["opacity"]) ? $context["opacity"] : null) < 100)) {
                echo "-moz-opacity:.";
                echo twig_escape_filter($this->env, (isset($context["opacity"]) ? $context["opacity"] : null), "html", null, true);
                echo ";filter:alpha(opacity=";
                echo twig_escape_filter($this->env, (isset($context["opacity"]) ? $context["opacity"] : null), "html", null, true);
                echo ");opacity:.";
                echo twig_escape_filter($this->env, (isset($context["opacity"]) ? $context["opacity"] : null), "html", null, true);
                echo ";";
            }
            echo "\",function(){if((typeof myatu_bgm!==\"undefined\")&&(myatu_bgm.initial_ease_in===\"true\")){a(this).fadeIn(\"slow\")}else{a(this).show()}})}(jQuery))}catch(e){};
    /*]]>*/
    </script>
    <noscript><img id=\"myatu_bgm_top\" class=\"myatu_bgm_fs\" src=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "url"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "alt"), "html", null, true);
            echo "\" ";
            if (((isset($context["opacity"]) ? $context["opacity"] : null) < 100)) {
                echo "style=\"-moz-opacity:.";
                echo twig_escape_filter($this->env, (isset($context["opacity"]) ? $context["opacity"] : null), "html", null, true);
                echo "; filter:alpha(opacity=";
                echo twig_escape_filter($this->env, (isset($context["opacity"]) ? $context["opacity"] : null), "html", null, true);
                echo "); opacity:.";
                echo twig_escape_filter($this->env, (isset($context["opacity"]) ? $context["opacity"] : null), "html", null, true);
                echo ";\"";
            }
            echo "  /></noscript>
</div>
";
        }
        // line 45
        echo "

";
        // line 48
        if ((isset($context["has_pin_it_btn"]) ? $context["has_pin_it_btn"] : null)) {
            // line 49
            echo "<div id=\"myatu_bgm_pin_it_btn\" class=\"myatu_bgm_info_blk\">

<script type=\"text/javascript\">
/*<![CDATA[*/
";
            // line 77
            echo "(function(){window.PinIt=window.PinIt||{loaded:false};if(myatu_bgm.isDisabled()){return}if(window.PinIt.loaded){return}window.PinIt.loaded=true;function a(){var c=document.createElement(\"script\"),b=document.getElementsByTagName(\"script\")[0];c.src=\"//assets.pinterest.com/js/pinit.js\";c.type=\"text/javascript\";c.async=true;b.parentNode.insertBefore(c,b)}if(window.attachEvent){window.attachEvent(\"onload\",a)}else{window.addEventListener(\"load\",a,false)}}());
/*]]>*/
</script>
    <a href=\"http://pinterest.com/pin/create/button/?url=";
            // line 80
            echo twig_escape_filter($this->env, twig_urlencode_filter((isset($context["permalink"]) ? $context["permalink"] : null)), "html", null, true);
            echo "&media=";
            echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "url")), "html", null, true);
            echo "&description=";
            echo twig_escape_filter($this->env, twig_urlencode_filter(strip_tags($this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "desc"))), "html", null, true);
            echo "\" class=\"pin-it-button\" count-layout=\"none\">Pin It</a>
</div>
";
        }
        // line 83
        echo "

";
        // line 86
        if ((isset($context["has_info_tab"]) ? $context["has_info_tab"] : null)) {
            // line 87
            echo "<div id=\"myatu_bgm_info\">
    <div id=\"myatu_bgm_info_tab\" class=\"myatu_bgm_info_blk\">
        ";
            // line 89
            if ((isset($context["info_tab_link"]) ? $context["info_tab_link"] : null)) {
                // line 90
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["random_image"]) ? $context["random_image"] : null), "link"), "html", null, true);
                echo "\">[ + ]</a>
        ";
            } else {
                // line 92
                echo "            [ + ]
        ";
            }
            // line 94
            echo "    </div>
</div>
";
        }
        // line 97
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 99
        echo "
<!-- Background Manager End -->
";
    }

    public function getTemplateName()
    {
        return "pub_footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 99,  138 => 97,  133 => 94,  129 => 92,  123 => 90,  121 => 89,  117 => 87,  115 => 86,  111 => 83,  101 => 80,  96 => 77,  90 => 49,  88 => 48,  84 => 45,  66 => 42,  51 => 39,  46 => 19,  44 => 18,  41 => 16,  37 => 15,  34 => 13,  28 => 12,  25 => 10,  23 => 9,  19 => 7,);
    }
}

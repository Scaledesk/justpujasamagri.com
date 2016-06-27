<?php

/* settings.html.twig */
class __TwigTemplate_5e0b656d2eb6126694a592ac3f0e1b4c extends Twig_Template
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
<div style=\"position: relative; width: 100%;\"> ";
        // line 9
        echo "
    <div id=\"bg_preview_div\" class=\"hide-if-no-js\">
        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Preview"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <div id=\"bg_preview_container\">
                            <div id=\"bg_preview_bg_color\"></div>
                            <div id=\"bg_preview\"></div>
                            <div id=\"bg_preview_overlay\"></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <form method=\"post\" action=\"\" id=\"settings_form\">
        ";
        // line 30
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "

        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\">
                    <th scope=\"row\">
                        <label for=\"active_gallery\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Image Set"), "html", null, true);
        echo "</label>
                    </th>
                    <td>
                        <select id=\"active_gallery\" class=\"postform\" name=\"active_gallery\">
                            ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["galleries"]) ? $context["galleries"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["gallery"]) {
            // line 41
            echo "                            <option ";
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
        // line 43
        echo "                        </select>
                    </td>
                </tr>

                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Image selection order"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"image_sel\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Image selection order"), "html", null, true);
        echo "</span>
                            </legend>
                            <label>
                                <input id=\"image_sel_random\" type=\"radio\" value=\"random\" name=\"image_selection\" ";
        // line 57
        if (((isset($context["image_selection"]) ? $context["image_selection"] : null) == "random")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Random"), "html", null, true);
        echo "</span>
                            </label>
                            <div class=\"image_sel_ad\">
                                <label>
                                    <input id=\"image_sel_asc\" type=\"radio\" value=\"asc\" name=\"image_selection\" ";
        // line 62
        if (((isset($context["image_selection"]) ? $context["image_selection"] : null) == "asc")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                    <span>";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Ascending"), "html", null, true);
        echo "</span>
                                </label>
                                <br />
                                <label>
                                    <input id=\"image_sel_desc\" type=\"radio\" value=\"desc\" name=\"image_selection\" ";
        // line 67
        if (((isset($context["image_selection"]) ? $context["image_selection"] : null) == "desc")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                    <span>";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Descending"), "html", null, true);
        echo "</span>
                                </label>
                            </div>
                        </fieldset>
                    </td>
                </tr>

                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Select an image"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"rand_sel\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Select an image"), "html", null, true);
        echo "</span>
                            </legend>
                            <label>
                                <input class=\"change_freq\" type=\"radio\" value=\"session\" name=\"change_freq\" ";
        // line 85
        if (((isset($context["change_freq"]) ? $context["change_freq"] : null) == "session")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("At each browser session"), "html", null, true);
        echo "</span>
                            </label>
                            <span class=\"description\">(";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Stores a cookie on the visitor's computer for the duration of the browser session"), "html", null, true);
        echo ")</span>
                            <br />
                            <label>
                                <input class=\"change_freq\" type=\"radio\" value=\"load\" name=\"change_freq\" ";
        // line 91
        if (((isset($context["change_freq"]) ? $context["change_freq"] : null) == "load")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("On a page (re)load"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label>
                                <input class=\"change_freq\" type=\"radio\" value=\"custom\" name=\"change_freq\" ";
        // line 96
        if (((isset($context["change_freq"]) ? $context["change_freq"] : null) == "custom")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Every"), "html", null, true);
        echo "</span>
                            </label>
                            <input type=\"number\" min=\"1\" max=\"60\" class=\"small-text\" value=\"";
        // line 99
        echo twig_escape_filter($this->env, (isset($context["change_freq_custom"]) ? $context["change_freq_custom"] : null), "html", null, true);
        echo "\" name=\"change_freq_custom\" />
                            <span>";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("seconds"), "html", null, true);
        echo "</span>
                            <span class=\"description\">(";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Requires Javascript by the visitor, but will gracefully degrade if not available"), "html", null, true);
        echo ")</span>
                        </fieldset>
                    </td>
                </tr>

                <tr valign=\"top\" class=\"change_freq_lc\">
                    <th scope=\"row\">
                        ";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Remember last displayed image"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"image_remember_last_sel\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Remember last displayed image"), "html", null, true);
        echo "</span>
                            </legend>
                            <label>
                                <input type=\"checkbox\" id=\"image_remember_last\" name=\"image_remember_last\" ";
        // line 116
        if ((isset($context["image_remember_last"]) ? $context["image_remember_last"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enabled"), "html", null, true);
        echo "</span>
                            </label>
                            <span class=\"description\">(";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Displays the last displayed image on the next page, provided that page is using the same Image Set. Stores a cookie."), "html", null, true);
        echo ")</span>
                        </fieldset>
                    </td>
                </tr>

                <tr valign=\"top\">
                    <th scope=\"row\">
                        <label for=\"background_color\">";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Color"), "html", null, true);
        echo "</label>
                    </th>
                    <td>
                        <input type=\"text\" value=\"#";
        // line 129
        echo twig_escape_filter($this->env, (isset($context["background_color"]) ? $context["background_color"] : null), "html", null, true);
        echo "\" autocomplete=\"off\" name=\"background_color\" id=\"background_color\" />
                        <div id=\"color_picker\" class=\"hide-if-no-js\"></div>
                        <input type=\"button\" id=\"clear_color\" class=\"hide-if-no-js button\" value=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clear"), "html", null, true);
        echo "\" />
                    </td>
                </tr>
                <tr valign=\"top\">
                    <th scope=\"row\">
                       ";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Active on"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"bg_display_on\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Active on"), "html", null, true);
        echo "</span>
                            </legend>
                           <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_front_page\" ";
        // line 144
        if ((isset($context["display_on_front_page"]) ? $context["display_on_front_page"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Front page"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_single_post\" ";
        // line 149
        if ((isset($context["display_on_single_post"]) ? $context["display_on_single_post"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Single post"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_single_page\" ";
        // line 154
        if ((isset($context["display_on_single_page"]) ? $context["display_on_single_page"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Single page"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_archive\" ";
        // line 159
        if ((isset($context["display_on_archive"]) ? $context["display_on_archive"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Archive (Category, Tag, History) pages"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_search\" ";
        // line 164
        if ((isset($context["display_on_search"]) ? $context["display_on_search"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Search results"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_error\" ";
        // line 169
        if ((isset($context["display_on_error"]) ? $context["display_on_error"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Error page"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on_mobile\" ";
        // line 174
        if ((isset($context["display_on_mobile"]) ? $context["display_on_mobile"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Mobile browsers"), "html", null, true);
        echo "</span>
                                <span class=\"description\">(";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Requires Javascript by the visitor"), "html", null, true);
        echo ")</span>
                            </label>
                            ";
        // line 178
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["custom_post_types"]) ? $context["custom_post_types"] : null));
        foreach ($context['_seq'] as $context["custom_post_type_key"] => $context["custom_post_type"]) {
            // line 179
            echo "                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on[";
            // line 181
            echo (isset($context["custom_post_type_key"]) ? $context["custom_post_type_key"] : null);
            echo "]\" ";
            if ($this->getAttribute((isset($context["custom_post_type"]) ? $context["custom_post_type"] : null), "display", array(), "array")) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 182
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["custom_post_type"]) ? $context["custom_post_type"] : null), "name", array(), "array"), "html", null, true);
            echo "</span>
                            </label>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['custom_post_type_key'], $context['custom_post_type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        echo "                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Layout"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\">
                    <th scope=\"row\">
                       ";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Size"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"bg_size\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 201
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Size"), "html", null, true);
        echo "</span>
                            </legend>
                           <label class=\"bg_size\">
                                <input type=\"radio\" value=\"as-is\" name=\"background_size\" ";
        // line 204
        if (((isset($context["background_size"]) ? $context["background_size"] : null) == "as-is")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 205
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Normal"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_size\">
                                <input type=\"radio\" value=\"full\" name=\"background_size\" ";
        // line 209
        if (((isset($context["background_size"]) ? $context["background_size"] : null) == "full")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 210
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Full Screen"), "html", null, true);
        echo "</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"bg_fs_layout\">
                    <th scope=\"row\">
                        <label for=\"background_color\">";
        // line 217
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Image Opacity"), "html", null, true);
        echo "</label>
                    </th>
                    <td>
                        <div class=\"hide-if-js\">
                            <input type=\"text\" value=\"";
        // line 221
        echo twig_escape_filter($this->env, (isset($context["background_opacity"]) ? $context["background_opacity"] : null), "html", null, true);
        echo "\" autocomplete=\"off\" name=\"background_opacity\" id=\"background_opacity\" />
                            <span>%</span>
                            <span class=\"description\">(";
        // line 223
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Only available for Full Screen layouts"), "html", null, true);
        echo ")</span>
                        </div>
                        <div id=\"opacity_picker\" class=\"hide-if-no-js myatu_inline_block\"></div>
                        <span id=\"opacity_picker_val\" class=\"hide-if-no-js\">";
        // line 226
        echo twig_escape_filter($this->env, (isset($context["background_opacity"]) ? $context["background_opacity"] : null), "html", null, true);
        echo "%</span>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"bg_fs_layout\">
                    <th scope=\"row\">
                        ";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Center Image"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset>
                            <label>
                                <input type=\"checkbox\" value=\"1\" id=\"full_screen_center\" name=\"full_screen_center\" ";
        // line 236
        if ((isset($context["full_screen_center"]) ? $context["full_screen_center"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 237
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enabled"), "html", null, true);
        echo "</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"bg_extra_layout\">
                    <th scope=\"row\">
                       ";
        // line 244
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Position"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"bg_pos\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Position"), "html", null, true);
        echo "</span>
                            </legend>
                            ";
        // line 251
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["bg_positions"]) ? $context["bg_positions"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["bg_position_key"] => $context["bg_position_value"]) {
            // line 252
            echo "                            <label class=\"bg_pos myatu_inline_block\" id=\"pos-";
            echo twig_escape_filter($this->env, (isset($context["bg_position_key"]) ? $context["bg_position_key"] : null), "html", null, true);
            echo "\">
                                <input type=\"radio\" value=\"";
            // line 253
            echo twig_escape_filter($this->env, (isset($context["bg_position_key"]) ? $context["bg_position_key"] : null), "html", null, true);
            echo "\" name=\"background_position\" ";
            if (((isset($context["background_position"]) ? $context["background_position"] : null) == (isset($context["bg_position_key"]) ? $context["bg_position_key"] : null))) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 254
            echo twig_escape_filter($this->env, (isset($context["bg_position_value"]) ? $context["bg_position_value"] : null), "html", null, true);
            echo "</span>
                            </label>
                            ";
            // line 256
            if ((0 == $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3)) {
                echo "<br />";
            }
            // line 257
            echo "                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['bg_position_key'], $context['bg_position_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 258
        echo "                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"bg_extra_layout\">
                    <th scope=\"row\">
                       ";
        // line 263
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Tiling"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"bg_repeat\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 268
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Tiling"), "html", null, true);
        echo "</span>
                            </legend>
                            ";
        // line 270
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["bg_repeats"]) ? $context["bg_repeats"] : null));
        foreach ($context['_seq'] as $context["bg_repeat_key"] => $context["bg_repeat_value"]) {
            // line 271
            echo "                            <label class=\"bg_repeat\">
                                <input type=\"radio\" value=\"";
            // line 272
            echo twig_escape_filter($this->env, (isset($context["bg_repeat_key"]) ? $context["bg_repeat_key"] : null), "html", null, true);
            echo "\" name=\"background_repeat\" ";
            if (((isset($context["background_repeat"]) ? $context["background_repeat"] : null) == (isset($context["bg_repeat_key"]) ? $context["bg_repeat_key"] : null))) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 273
            echo twig_escape_filter($this->env, (isset($context["bg_repeat_value"]) ? $context["bg_repeat_value"] : null), "html", null, true);
            echo "</span>
                            </label>
                            <br />
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['bg_repeat_key'], $context['bg_repeat_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 277
        echo "                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"bg_extra_layout\">
                    <th scope=\"row\">
                       ";
        // line 282
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Scrolling"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"bg_scroll\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 287
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Scrolling"), "html", null, true);
        echo "</span>
                            </legend>
                           <label class=\"bg_scroll\">
                                <input type=\"radio\" value=\"scroll\" name=\"background_scroll\" ";
        // line 290
        if (((isset($context["background_scroll"]) ? $context["background_scroll"] : null) == "scroll")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 291
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Scroll with the screen"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_scroll\">
                                <input type=\"radio\" value=\"fixed\" name=\"background_scroll\" ";
        // line 295
        if (((isset($context["background_scroll"]) ? $context["background_scroll"] : null) == "fixed")) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 296
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Fixed"), "html", null, true);
        echo "</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"bg_extra_layout\">
                    <th scope=\"row\">
                       ";
        // line 303
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Stretching"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"bg_stretch\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 308
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Stretching"), "html", null, true);
        echo "</span>
                            </legend>
                           <label class=\"bg_stretch\">
                                <input type=\"checkbox\" value=\"1\" id=\"background_stretch_vertical\" name=\"background_stretch_vertical\" ";
        // line 311
        if ((isset($context["background_stretch_vertical"]) ? $context["background_stretch_vertical"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 312
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Vertical"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"bg_stretch\">
                                <input type=\"checkbox\" value=\"1\" id=\"background_stretch_horizontal\" name=\"background_stretch_horizontal\" ";
        // line 316
        if ((isset($context["background_stretch_horizontal"]) ? $context["background_stretch_horizontal"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 317
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Horizontal"), "html", null, true);
        echo "</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class=\"bg_transition\">
            <h3>";
        // line 326
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Transitioning Effect"), "html", null, true);
        echo " <span class=\"description hide-if-js\">(";
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Only available for Full Screen layouts"), "html", null, true);
        echo ")</span></h3>
            <table class=\"form-table\">
                <tbody>
                    <tr valign=\"top\">
                        <th scope=\"row\">
                            <label for=\"background_transition\">";
        // line 331
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Transition Effect"), "html", null, true);
        echo "</label>
                        </th>
                        <td>
                            <select id=\"background_transition\" class=\"postform\" name=\"background_transition\">
                                ";
        // line 335
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["bg_transitions"]) ? $context["bg_transitions"] : null));
        foreach ($context['_seq'] as $context["bg_transition_key"] => $context["bg_transition_value"]) {
            // line 336
            echo "                                <option ";
            if (((isset($context["background_transition"]) ? $context["background_transition"] : null) == (isset($context["bg_transition_key"]) ? $context["bg_transition_key"] : null))) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["bg_transition_key"]) ? $context["bg_transition_key"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["bg_transition_value"]) ? $context["bg_transition_value"] : null), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['bg_transition_key'], $context['bg_transition_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 338
        echo "                            </select>
                        </td>
                    </tr>
                    <tr valign=\"top\">
                        <th scope=\"row\">
                            <label for=\"transition_speed\">";
        // line 343
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Transition Speed"), "html", null, true);
        echo "</label>
                        </th>
                        <td>
                            <div class=\"hide-if-js\">
                                <input type=\"text\" class=\"small-text\" value=\"";
        // line 347
        echo twig_escape_filter($this->env, (isset($context["transition_speed"]) ? $context["transition_speed"] : null), "html", null, true);
        echo "\" name=\"transition_speed\" id=\"transition_speed\" />
                                <span>";
        // line 348
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("milliseconds"), "html", null, true);
        echo "</span>
                                <span class=\"description\">(";
        // line 349
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("1000 milliseconds = 1 second"), "html", null, true);
        echo ")</span>
                            </div>
                            <div class=\"hide-if-no-js\">
                                <span>";
        // line 352
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Slower"), "html", null, true);
        echo "</span>
                                <div id=\"transition_speed_picker\" class=\"hide-if-no-js myatu_inline_block\"></div>
                                <span>";
        // line 354
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Faster"), "html", null, true);
        echo "</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>";
        // line 362
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Overlay"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\">
                    <th scope=\"row\">
                        <label for=\"active_overlay\">";
        // line 367
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Overlay"), "html", null, true);
        echo "</label>
                    </th>
                    <td>
                        <select id=\"active_overlay\" class=\"postform\" name=\"active_overlay\">
                            ";
        // line 371
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["overlays"]) ? $context["overlays"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["overlay"]) {
            // line 372
            echo "                            <option ";
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
        // line 374
        echo "                        </select>
                    </td>
                </tr>
                <tr valign=\"top\">
                    <th scope=\"row\">
                        <label for=\"background_color\">";
        // line 379
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Overlay Opacity"), "html", null, true);
        echo "</label>
                    </th>
                    <td>
                        <div class=\"hide-if-js\">
                            <input type=\"text\" value=\"";
        // line 383
        echo twig_escape_filter($this->env, (isset($context["overlay_opacity"]) ? $context["overlay_opacity"] : null), "html", null, true);
        echo "\" autocomplete=\"off\" name=\"overlay_opacity\" id=\"overlay_opacity\" />
                            <span>%</span>
                        </div>
                        <div id=\"ov_opacity_picker\" class=\"hide-if-no-js myatu_inline_block\"></div>
                        <span id=\"ov_opacity_picker_val\" class=\"hide-if-no-js\">";
        // line 387
        echo twig_escape_filter($this->env, (isset($context["overlay_opacity"]) ? $context["overlay_opacity"] : null), "html", null, true);
        echo "%</span>
                    </td>
                </tr>
            </tbody>
        </table>


        <h3>";
        // line 394
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Background Information"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 399
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Display icon"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"info_tab_fs\">
                            <label class=\"info_tab\">
                                <input type=\"checkbox\" value=\"1\" id=\"info_tab\" name=\"info_tab\" ";
        // line 404
        if ((isset($context["info_tab"]) ? $context["info_tab"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 405
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enabled"), "html", null, true);
        echo "</span>
                                <span class=\"description\">(";
        // line 406
        echo $this->env->getExtension('translate')->transFilter("This will display a small <code>[ + ]</code> icon in one of the selected locations");
        echo ")</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"info_tab_extra\">
                    <th scope=\"row\">
                        ";
        // line 413
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Options"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"info_tab_ops\">
                            <label class=\"info_tab_ops\">
                                <input type=\"checkbox\" value=\"1\" id=\"info_tab_desc\" name=\"info_tab_desc\" ";
        // line 418
        if ((isset($context["info_tab_desc"]) ? $context["info_tab_desc"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 419
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Display a short description when the mouse is hovered over the icon"), "html", null, true);
        echo "</span>
                                <span class=\"description\">(";
        // line 420
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Requires Javascript by the visitor"), "html", null, true);
        echo ")</span>
                            </label>
                            <br />
                            <label class=\"info_tab_ops\">
                                <input type=\"checkbox\" value=\"1\" id=\"info_tab_thumb\" name=\"info_tab_thumb\" ";
        // line 424
        if ((isset($context["info_tab_thumb"]) ? $context["info_tab_thumb"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 425
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Include a thumbnail in the short description"), "html", null, true);
        echo "</span>
                            </label>
                            <br />
                            <label class=\"info_tab_ops\">
                                <input type=\"checkbox\" value=\"1\" id=\"info_tab_link\" name=\"info_tab_link\" ";
        // line 429
        if ((isset($context["info_tab_link"]) ? $context["info_tab_link"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 430
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Icon is linked to a seperate page containing more information about the displayed background"), "html", null, true);
        echo "</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"info_tab_extra\">
                    <th scope=\"row\">
                       ";
        // line 437
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Location"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"info_tab_location\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 442
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Location"), "html", null, true);
        echo "</span>
                            </legend>
                            ";
        // line 444
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["corner_locations"]) ? $context["corner_locations"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["corner_location_key"] => $context["corner_location_value"]) {
            // line 445
            echo "                            <label class=\"info_tab_location myatu_inline_block\" id=\"info-tab-pos-";
            echo twig_escape_filter($this->env, (isset($context["corner_location_key"]) ? $context["corner_location_key"] : null), "html", null, true);
            echo "\">
                                <input type=\"radio\" value=\"";
            // line 446
            echo twig_escape_filter($this->env, (isset($context["corner_location_key"]) ? $context["corner_location_key"] : null), "html", null, true);
            echo "\" name=\"info_tab_location\" ";
            if (((isset($context["info_tab_location"]) ? $context["info_tab_location"] : null) == (isset($context["corner_location_key"]) ? $context["corner_location_key"] : null))) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 447
            echo twig_escape_filter($this->env, (isset($context["corner_location_value"]) ? $context["corner_location_value"] : null), "html", null, true);
            echo "</span>
                            </label>
                            ";
            // line 449
            if ((0 == $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 2)) {
                echo "<br />";
            }
            // line 450
            echo "                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['corner_location_key'], $context['corner_location_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 451
        echo "                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>";
        // line 457
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Pinterest"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 462
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Display \"Pin It\" Button"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"pin_it_fs\">
                            <label class=\"pin_it_btn\">
                                <input type=\"checkbox\" value=\"1\" id=\"pin_it_btn\" name=\"pin_it_btn\" ";
        // line 467
        if ((isset($context["pin_it_btn"]) ? $context["pin_it_btn"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                                <span>";
        // line 468
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enabled"), "html", null, true);
        echo "</span>
                                <span class=\"description\">(";
        // line 469
        echo $this->env->getExtension('translate')->transFilter("This will display a \"Pin It\" button for the <a href=\"http://pinterest.com\" target=\"_blank\" class=\"pinterest_logo myatu_inline_block\">Pinterest</a> service in one of the selected locations");
        echo ")</span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr valign=\"top\" class=\"pin_it_btn_extra\">
                    <th scope=\"row\">
                       ";
        // line 476
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Location"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <fieldset id=\"pin_it_location\">
                            <legend class=\"screen-reader-text\">
                                <span>";
        // line 481
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Location"), "html", null, true);
        echo "</span>
                            </legend>
                            ";
        // line 483
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["corner_locations"]) ? $context["corner_locations"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["corner_location_key"] => $context["corner_location_value"]) {
            // line 484
            echo "                            <label class=\"pin_it_btn_location myatu_inline_block\" id=\"pin-it-btn-pos-";
            echo twig_escape_filter($this->env, (isset($context["corner_location_key"]) ? $context["corner_location_key"] : null), "html", null, true);
            echo "\">
                                <input type=\"radio\" value=\"";
            // line 485
            echo twig_escape_filter($this->env, (isset($context["corner_location_key"]) ? $context["corner_location_key"] : null), "html", null, true);
            echo "\" name=\"pin_it_btn_location\" ";
            if (((isset($context["pin_it_btn_location"]) ? $context["pin_it_btn_location"] : null) == (isset($context["corner_location_key"]) ? $context["corner_location_key"] : null))) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 486
            echo twig_escape_filter($this->env, (isset($context["corner_location_value"]) ? $context["corner_location_value"] : null), "html", null, true);
            echo "</span>
                            </label>
                            ";
            // line 488
            if ((0 == $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 2)) {
                echo "<br />";
            }
            // line 489
            echo "                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['corner_location_key'], $context['corner_location_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 490
        echo "                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>";
        // line 496
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Miscellaneous"), "html", null, true);
        echo "</h3>
        <table class=\"form-table\">
            <tbody>
                <tr valign=\"top\" class=\"bg_fs_layout\">
                    <th scope=\"row\">
                        ";
        // line 501
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Initial Ease-in"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" value=\"1\" id=\"initial_ease_in\" name=\"initial_ease_in\" ";
        // line 505
        if ((isset($context["initial_ease_in"]) ? $context["initial_ease_in"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            <span>";
        // line 506
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Enabled"), "html", null, true);
        echo "</span>
                        </label>
                        <span class=\"description\">(";
        // line 508
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Eases in the initial image after it has finished downloading"), "html", null, true);
        echo ")</span>
                    </td>
                </tr>

                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 514
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clickable Backgrounds"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" value=\"1\" id=\"bg_click_new_window\" name=\"bg_click_new_window\" ";
        // line 518
        if ((isset($context["bg_click_new_window"]) ? $context["bg_click_new_window"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            <span>";
        // line 519
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Clicking the background opens the associated link in a new window"), "html", null, true);
        echo "</span>
                        </label>
                    </td>
                </tr>

                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 526
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Track Background Links"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <label>
                            <input type=\"checkbox\" value=\"1\" id=\"bg_track_clicks\" name=\"bg_track_clicks\" ";
        // line 530
        if ((isset($context["bg_track_clicks"]) ? $context["bg_track_clicks"] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />
                            <span>";
        // line 531
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Track background clicks and impressions using Google Analytics."), "html", null, true);
        echo "</span>
                        </label>
                        <label id=\"bg_track_clicks_extra\">
                            <span>";
        // line 534
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Category name:"), "html", null, true);
        echo "</span>
                            <input type=\"text\" id=\"bg_track_clicks_category \"name=\"bg_track_clicks_category\" value=\"";
        // line 535
        echo twig_escape_filter($this->env, (isset($context["bg_track_clicks_category"]) ? $context["bg_track_clicks_category"] : null), "html", null, true);
        echo "\" placeholder=\"Enter a category name\"/>
                        </label>
                        <span class=\"description\">(";
        // line 537
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("See Help for details"), "html", null, true);
        echo ")</span>
                    </td>
                </tr>

                <tr valign=\"top\">
                    <th scope=\"row\">
                        ";
        // line 543
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Override Posts and Pages"), "html", null, true);
        echo "
                    </th>
                    <td>
                        <p>Allow users with the following role to override the background <em>Image Set</em>, <em>Overlay</em> and <em>Color</em> of individual posts and pages:</p>
                        <select id=\"single_post_override\" class=\"postform\" name=\"single_post_override\">
                            ";
        // line 548
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["roles"]) ? $context["roles"] : null));
        foreach ($context['_seq'] as $context["role"] => $context["role_title"]) {
            // line 549
            echo "                            <option ";
            if (((isset($context["role"]) ? $context["role"] : null) == (isset($context["single_post_override"]) ? $context["single_post_override"] : null))) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["role"]) ? $context["role"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["role_title"]) ? $context["role_title"] : null), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['role'], $context['role_title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 551
        echo "                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        ";
        // line 557
        echo (isset($context["submit_button"]) ? $context["submit_button"] : null);
        echo "

    </form>

    <div id=\"my_footer\">
        <img src=\"";
        // line 562
        echo twig_escape_filter($this->env, (isset($context["plugin_base_url"]) ? $context["plugin_base_url"] : null), "html", null, true);
        echo "resources/images/myatus_logo_white.png\" alt=\"Myatu's\"/><br>
        <span>
            <a href=\"";
        // line 564
        echo twig_escape_filter($this->env, (isset($context["plugin_home"]) ? $context["plugin_home"] : null), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, (isset($context["plugin_name"]) ? $context["plugin_name"] : null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["plugin_version"]) ? $context["plugin_version"] : null), "html", null, true);
        echo "</a> |
            <a href=\"#\" id=\"footer_debug_link\">";
        // line 565
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Debug"), "html", null, true);
        echo "</a> |
            <a href=\"http://wordpress.org/extend/plugins/background-manager/\" target=\"_blank\">";
        // line 566
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Rate It"), "html", null, true);
        echo "</a> |
            <a href=\"http://wordpress.org/support/plugin/background-manager\" target=\"_blank\">";
        // line 567
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Support"), "html", null, true);
        echo "</a> |
            <a href=\"http://pledgie.com/campaigns/16906\" target=\"_blank\">";
        // line 568
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Donate"), "html", null, true);
        echo "</a>
        </span>
    </div>

    <div id=\"footer_debug\" style=\"display:none;\">
        <table class=\"form-table\">
            <tbody>
                ";
        // line 575
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
        foreach ($context['_seq'] as $context["debug_name"] => $context["debug_value"]) {
            // line 576
            echo "                <tr>
                    <th scope=\"row\" style=\"font-weight: bold;\">";
            // line 577
            echo twig_escape_filter($this->env, (isset($context["debug_name"]) ? $context["debug_name"] : null), "html", null, true);
            echo ":</th>
                    <td>";
            // line 578
            echo twig_escape_filter($this->env, (isset($context["debug_value"]) ? $context["debug_value"] : null), "html", null, true);
            echo "</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['debug_name'], $context['debug_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 581
        echo "            </tbody>
        </table>
    </div>

</div> ";
    }

    public function getTemplateName()
    {
        return "settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1335 => 581,  1326 => 578,  1322 => 577,  1319 => 576,  1315 => 575,  1305 => 568,  1301 => 567,  1297 => 566,  1293 => 565,  1285 => 564,  1280 => 562,  1272 => 557,  1264 => 551,  1249 => 549,  1245 => 548,  1237 => 543,  1228 => 537,  1223 => 535,  1219 => 534,  1213 => 531,  1207 => 530,  1200 => 526,  1190 => 519,  1184 => 518,  1177 => 514,  1168 => 508,  1163 => 506,  1157 => 505,  1150 => 501,  1142 => 496,  1134 => 490,  1120 => 489,  1116 => 488,  1111 => 486,  1103 => 485,  1098 => 484,  1081 => 483,  1076 => 481,  1068 => 476,  1058 => 469,  1054 => 468,  1048 => 467,  1040 => 462,  1032 => 457,  1024 => 451,  1010 => 450,  1006 => 449,  1001 => 447,  993 => 446,  988 => 445,  971 => 444,  966 => 442,  958 => 437,  948 => 430,  942 => 429,  935 => 425,  929 => 424,  922 => 420,  918 => 419,  912 => 418,  904 => 413,  894 => 406,  890 => 405,  884 => 404,  876 => 399,  868 => 394,  858 => 387,  851 => 383,  844 => 379,  837 => 374,  822 => 372,  818 => 371,  811 => 367,  803 => 362,  792 => 354,  787 => 352,  781 => 349,  777 => 348,  773 => 347,  766 => 343,  759 => 338,  744 => 336,  740 => 335,  733 => 331,  723 => 326,  711 => 317,  705 => 316,  698 => 312,  692 => 311,  686 => 308,  678 => 303,  668 => 296,  662 => 295,  655 => 291,  649 => 290,  643 => 287,  635 => 282,  628 => 277,  618 => 273,  610 => 272,  607 => 271,  603 => 270,  598 => 268,  590 => 263,  583 => 258,  569 => 257,  565 => 256,  560 => 254,  552 => 253,  547 => 252,  530 => 251,  525 => 249,  517 => 244,  507 => 237,  501 => 236,  493 => 231,  485 => 226,  479 => 223,  474 => 221,  467 => 217,  457 => 210,  451 => 209,  444 => 205,  438 => 204,  432 => 201,  424 => 196,  416 => 191,  408 => 185,  399 => 182,  391 => 181,  387 => 179,  383 => 178,  378 => 176,  374 => 175,  368 => 174,  361 => 170,  355 => 169,  348 => 165,  342 => 164,  335 => 160,  329 => 159,  322 => 155,  316 => 154,  309 => 150,  303 => 149,  296 => 145,  290 => 144,  284 => 141,  276 => 136,  268 => 131,  263 => 129,  257 => 126,  247 => 119,  242 => 117,  236 => 116,  230 => 113,  222 => 108,  212 => 101,  208 => 100,  204 => 99,  199 => 97,  193 => 96,  186 => 92,  180 => 91,  174 => 88,  169 => 86,  163 => 85,  157 => 82,  149 => 77,  137 => 68,  131 => 67,  124 => 63,  118 => 62,  111 => 58,  105 => 57,  99 => 54,  91 => 49,  83 => 43,  68 => 41,  64 => 40,  57 => 36,  48 => 30,  30 => 15,  22 => 9,  19 => 7,);
    }
}

<?php

/* settings.html.twig */
class __TwigTemplate_4b719ea7170f2a088281b0ed3b6e26c9 extends Twig_Template
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
        if (isset($context["nonce"])) { $_nonce_ = $context["nonce"]; } else { $_nonce_ = null; }
        echo $_nonce_;
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
        if (isset($context["galleries"])) { $_galleries_ = $context["galleries"]; } else { $_galleries_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_galleries_);
        foreach ($context['_seq'] as $context["_key"] => $context["gallery"]) {
            // line 41
            echo "                            <option ";
            if (isset($context["gallery"])) { $_gallery_ = $context["gallery"]; } else { $_gallery_ = null; }
            if ($this->getAttribute($_gallery_, "selected")) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            if (isset($context["gallery"])) { $_gallery_ = $context["gallery"]; } else { $_gallery_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_gallery_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["gallery"])) { $_gallery_ = $context["gallery"]; } else { $_gallery_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_gallery_, "name"), "html", null, true);
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
        if (isset($context["image_selection"])) { $_image_selection_ = $context["image_selection"]; } else { $_image_selection_ = null; }
        if (($_image_selection_ == "random")) {
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
        if (isset($context["image_selection"])) { $_image_selection_ = $context["image_selection"]; } else { $_image_selection_ = null; }
        if (($_image_selection_ == "asc")) {
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
        if (isset($context["image_selection"])) { $_image_selection_ = $context["image_selection"]; } else { $_image_selection_ = null; }
        if (($_image_selection_ == "desc")) {
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
        if (isset($context["change_freq"])) { $_change_freq_ = $context["change_freq"]; } else { $_change_freq_ = null; }
        if (($_change_freq_ == "session")) {
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
        if (isset($context["change_freq"])) { $_change_freq_ = $context["change_freq"]; } else { $_change_freq_ = null; }
        if (($_change_freq_ == "load")) {
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
        if (isset($context["change_freq"])) { $_change_freq_ = $context["change_freq"]; } else { $_change_freq_ = null; }
        if (($_change_freq_ == "custom")) {
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
        if (isset($context["change_freq_custom"])) { $_change_freq_custom_ = $context["change_freq_custom"]; } else { $_change_freq_custom_ = null; }
        echo twig_escape_filter($this->env, $_change_freq_custom_, "html", null, true);
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
        if (isset($context["image_remember_last"])) { $_image_remember_last_ = $context["image_remember_last"]; } else { $_image_remember_last_ = null; }
        if ($_image_remember_last_) {
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
        if (isset($context["background_color"])) { $_background_color_ = $context["background_color"]; } else { $_background_color_ = null; }
        echo twig_escape_filter($this->env, $_background_color_, "html", null, true);
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
        if (isset($context["display_on_front_page"])) { $_display_on_front_page_ = $context["display_on_front_page"]; } else { $_display_on_front_page_ = null; }
        if ($_display_on_front_page_) {
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
        if (isset($context["display_on_single_post"])) { $_display_on_single_post_ = $context["display_on_single_post"]; } else { $_display_on_single_post_ = null; }
        if ($_display_on_single_post_) {
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
        if (isset($context["display_on_single_page"])) { $_display_on_single_page_ = $context["display_on_single_page"]; } else { $_display_on_single_page_ = null; }
        if ($_display_on_single_page_) {
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
        if (isset($context["display_on_archive"])) { $_display_on_archive_ = $context["display_on_archive"]; } else { $_display_on_archive_ = null; }
        if ($_display_on_archive_) {
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
        if (isset($context["display_on_search"])) { $_display_on_search_ = $context["display_on_search"]; } else { $_display_on_search_ = null; }
        if ($_display_on_search_) {
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
        if (isset($context["display_on_error"])) { $_display_on_error_ = $context["display_on_error"]; } else { $_display_on_error_ = null; }
        if ($_display_on_error_) {
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
        if (isset($context["display_on_mobile"])) { $_display_on_mobile_ = $context["display_on_mobile"]; } else { $_display_on_mobile_ = null; }
        if ($_display_on_mobile_) {
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
        if (isset($context["custom_post_types"])) { $_custom_post_types_ = $context["custom_post_types"]; } else { $_custom_post_types_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_custom_post_types_);
        foreach ($context['_seq'] as $context["custom_post_type_key"] => $context["custom_post_type"]) {
            // line 179
            echo "                            <br />
                            <label class=\"bg_display_on\">
                                <input type=\"checkbox\" value=\"1\" name=\"display_on[";
            // line 181
            if (isset($context["custom_post_type_key"])) { $_custom_post_type_key_ = $context["custom_post_type_key"]; } else { $_custom_post_type_key_ = null; }
            echo $_custom_post_type_key_;
            echo "]\" ";
            if (isset($context["custom_post_type"])) { $_custom_post_type_ = $context["custom_post_type"]; } else { $_custom_post_type_ = null; }
            if ($this->getAttribute($_custom_post_type_, "display", array(), "array")) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 182
            if (isset($context["custom_post_type"])) { $_custom_post_type_ = $context["custom_post_type"]; } else { $_custom_post_type_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_custom_post_type_, "name", array(), "array"), "html", null, true);
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
        if (isset($context["background_size"])) { $_background_size_ = $context["background_size"]; } else { $_background_size_ = null; }
        if (($_background_size_ == "as-is")) {
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
        if (isset($context["background_size"])) { $_background_size_ = $context["background_size"]; } else { $_background_size_ = null; }
        if (($_background_size_ == "full")) {
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
        if (isset($context["background_opacity"])) { $_background_opacity_ = $context["background_opacity"]; } else { $_background_opacity_ = null; }
        echo twig_escape_filter($this->env, $_background_opacity_, "html", null, true);
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
        if (isset($context["background_opacity"])) { $_background_opacity_ = $context["background_opacity"]; } else { $_background_opacity_ = null; }
        echo twig_escape_filter($this->env, $_background_opacity_, "html", null, true);
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
        if (isset($context["full_screen_center"])) { $_full_screen_center_ = $context["full_screen_center"]; } else { $_full_screen_center_ = null; }
        if ($_full_screen_center_) {
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
        if (isset($context["bg_positions"])) { $_bg_positions_ = $context["bg_positions"]; } else { $_bg_positions_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_bg_positions_);
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
            if (isset($context["bg_position_key"])) { $_bg_position_key_ = $context["bg_position_key"]; } else { $_bg_position_key_ = null; }
            echo twig_escape_filter($this->env, $_bg_position_key_, "html", null, true);
            echo "\">
                                <input type=\"radio\" value=\"";
            // line 253
            if (isset($context["bg_position_key"])) { $_bg_position_key_ = $context["bg_position_key"]; } else { $_bg_position_key_ = null; }
            echo twig_escape_filter($this->env, $_bg_position_key_, "html", null, true);
            echo "\" name=\"background_position\" ";
            if (isset($context["background_position"])) { $_background_position_ = $context["background_position"]; } else { $_background_position_ = null; }
            if (isset($context["bg_position_key"])) { $_bg_position_key_ = $context["bg_position_key"]; } else { $_bg_position_key_ = null; }
            if (($_background_position_ == $_bg_position_key_)) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 254
            if (isset($context["bg_position_value"])) { $_bg_position_value_ = $context["bg_position_value"]; } else { $_bg_position_value_ = null; }
            echo twig_escape_filter($this->env, $_bg_position_value_, "html", null, true);
            echo "</span>
                            </label>
                            ";
            // line 256
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ((0 == $this->getAttribute($_loop_, "index") % 3)) {
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
        if (isset($context["bg_repeats"])) { $_bg_repeats_ = $context["bg_repeats"]; } else { $_bg_repeats_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_bg_repeats_);
        foreach ($context['_seq'] as $context["bg_repeat_key"] => $context["bg_repeat_value"]) {
            // line 271
            echo "                            <label class=\"bg_repeat\">
                                <input type=\"radio\" value=\"";
            // line 272
            if (isset($context["bg_repeat_key"])) { $_bg_repeat_key_ = $context["bg_repeat_key"]; } else { $_bg_repeat_key_ = null; }
            echo twig_escape_filter($this->env, $_bg_repeat_key_, "html", null, true);
            echo "\" name=\"background_repeat\" ";
            if (isset($context["background_repeat"])) { $_background_repeat_ = $context["background_repeat"]; } else { $_background_repeat_ = null; }
            if (isset($context["bg_repeat_key"])) { $_bg_repeat_key_ = $context["bg_repeat_key"]; } else { $_bg_repeat_key_ = null; }
            if (($_background_repeat_ == $_bg_repeat_key_)) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 273
            if (isset($context["bg_repeat_value"])) { $_bg_repeat_value_ = $context["bg_repeat_value"]; } else { $_bg_repeat_value_ = null; }
            echo twig_escape_filter($this->env, $_bg_repeat_value_, "html", null, true);
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
        if (isset($context["background_scroll"])) { $_background_scroll_ = $context["background_scroll"]; } else { $_background_scroll_ = null; }
        if (($_background_scroll_ == "scroll")) {
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
        if (isset($context["background_scroll"])) { $_background_scroll_ = $context["background_scroll"]; } else { $_background_scroll_ = null; }
        if (($_background_scroll_ == "fixed")) {
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
        if (isset($context["background_stretch_vertical"])) { $_background_stretch_vertical_ = $context["background_stretch_vertical"]; } else { $_background_stretch_vertical_ = null; }
        if ($_background_stretch_vertical_) {
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
        if (isset($context["background_stretch_horizontal"])) { $_background_stretch_horizontal_ = $context["background_stretch_horizontal"]; } else { $_background_stretch_horizontal_ = null; }
        if ($_background_stretch_horizontal_) {
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
        if (isset($context["bg_transitions"])) { $_bg_transitions_ = $context["bg_transitions"]; } else { $_bg_transitions_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_bg_transitions_);
        foreach ($context['_seq'] as $context["bg_transition_key"] => $context["bg_transition_value"]) {
            // line 336
            echo "                                <option ";
            if (isset($context["background_transition"])) { $_background_transition_ = $context["background_transition"]; } else { $_background_transition_ = null; }
            if (isset($context["bg_transition_key"])) { $_bg_transition_key_ = $context["bg_transition_key"]; } else { $_bg_transition_key_ = null; }
            if (($_background_transition_ == $_bg_transition_key_)) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            if (isset($context["bg_transition_key"])) { $_bg_transition_key_ = $context["bg_transition_key"]; } else { $_bg_transition_key_ = null; }
            echo twig_escape_filter($this->env, $_bg_transition_key_, "html", null, true);
            echo "\">";
            if (isset($context["bg_transition_value"])) { $_bg_transition_value_ = $context["bg_transition_value"]; } else { $_bg_transition_value_ = null; }
            echo twig_escape_filter($this->env, $_bg_transition_value_, "html", null, true);
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
        if (isset($context["transition_speed"])) { $_transition_speed_ = $context["transition_speed"]; } else { $_transition_speed_ = null; }
        echo twig_escape_filter($this->env, $_transition_speed_, "html", null, true);
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
        if (isset($context["overlays"])) { $_overlays_ = $context["overlays"]; } else { $_overlays_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_overlays_);
        foreach ($context['_seq'] as $context["_key"] => $context["overlay"]) {
            // line 372
            echo "                            <option ";
            if (isset($context["overlay"])) { $_overlay_ = $context["overlay"]; } else { $_overlay_ = null; }
            if ($this->getAttribute($_overlay_, "selected")) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            if (isset($context["overlay"])) { $_overlay_ = $context["overlay"]; } else { $_overlay_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_overlay_, "value"), "html", null, true);
            echo "\">";
            if (isset($context["overlay"])) { $_overlay_ = $context["overlay"]; } else { $_overlay_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_overlay_, "desc"), "html", null, true);
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
        if (isset($context["overlay_opacity"])) { $_overlay_opacity_ = $context["overlay_opacity"]; } else { $_overlay_opacity_ = null; }
        echo twig_escape_filter($this->env, $_overlay_opacity_, "html", null, true);
        echo "\" autocomplete=\"off\" name=\"overlay_opacity\" id=\"overlay_opacity\" />
                            <span>%</span>
                        </div>
                        <div id=\"ov_opacity_picker\" class=\"hide-if-no-js myatu_inline_block\"></div>
                        <span id=\"ov_opacity_picker_val\" class=\"hide-if-no-js\">";
        // line 387
        if (isset($context["overlay_opacity"])) { $_overlay_opacity_ = $context["overlay_opacity"]; } else { $_overlay_opacity_ = null; }
        echo twig_escape_filter($this->env, $_overlay_opacity_, "html", null, true);
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
        if (isset($context["info_tab"])) { $_info_tab_ = $context["info_tab"]; } else { $_info_tab_ = null; }
        if ($_info_tab_) {
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
        if (isset($context["info_tab_desc"])) { $_info_tab_desc_ = $context["info_tab_desc"]; } else { $_info_tab_desc_ = null; }
        if ($_info_tab_desc_) {
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
        if (isset($context["info_tab_thumb"])) { $_info_tab_thumb_ = $context["info_tab_thumb"]; } else { $_info_tab_thumb_ = null; }
        if ($_info_tab_thumb_) {
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
        if (isset($context["info_tab_link"])) { $_info_tab_link_ = $context["info_tab_link"]; } else { $_info_tab_link_ = null; }
        if ($_info_tab_link_) {
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
        if (isset($context["corner_locations"])) { $_corner_locations_ = $context["corner_locations"]; } else { $_corner_locations_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_corner_locations_);
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
            if (isset($context["corner_location_key"])) { $_corner_location_key_ = $context["corner_location_key"]; } else { $_corner_location_key_ = null; }
            echo twig_escape_filter($this->env, $_corner_location_key_, "html", null, true);
            echo "\">
                                <input type=\"radio\" value=\"";
            // line 446
            if (isset($context["corner_location_key"])) { $_corner_location_key_ = $context["corner_location_key"]; } else { $_corner_location_key_ = null; }
            echo twig_escape_filter($this->env, $_corner_location_key_, "html", null, true);
            echo "\" name=\"info_tab_location\" ";
            if (isset($context["info_tab_location"])) { $_info_tab_location_ = $context["info_tab_location"]; } else { $_info_tab_location_ = null; }
            if (isset($context["corner_location_key"])) { $_corner_location_key_ = $context["corner_location_key"]; } else { $_corner_location_key_ = null; }
            if (($_info_tab_location_ == $_corner_location_key_)) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 447
            if (isset($context["corner_location_value"])) { $_corner_location_value_ = $context["corner_location_value"]; } else { $_corner_location_value_ = null; }
            echo twig_escape_filter($this->env, $_corner_location_value_, "html", null, true);
            echo "</span>
                            </label>
                            ";
            // line 449
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ((0 == $this->getAttribute($_loop_, "index") % 2)) {
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
        if (isset($context["pin_it_btn"])) { $_pin_it_btn_ = $context["pin_it_btn"]; } else { $_pin_it_btn_ = null; }
        if ($_pin_it_btn_) {
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
        if (isset($context["corner_locations"])) { $_corner_locations_ = $context["corner_locations"]; } else { $_corner_locations_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_corner_locations_);
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
            if (isset($context["corner_location_key"])) { $_corner_location_key_ = $context["corner_location_key"]; } else { $_corner_location_key_ = null; }
            echo twig_escape_filter($this->env, $_corner_location_key_, "html", null, true);
            echo "\">
                                <input type=\"radio\" value=\"";
            // line 485
            if (isset($context["corner_location_key"])) { $_corner_location_key_ = $context["corner_location_key"]; } else { $_corner_location_key_ = null; }
            echo twig_escape_filter($this->env, $_corner_location_key_, "html", null, true);
            echo "\" name=\"pin_it_btn_location\" ";
            if (isset($context["pin_it_btn_location"])) { $_pin_it_btn_location_ = $context["pin_it_btn_location"]; } else { $_pin_it_btn_location_ = null; }
            if (isset($context["corner_location_key"])) { $_corner_location_key_ = $context["corner_location_key"]; } else { $_corner_location_key_ = null; }
            if (($_pin_it_btn_location_ == $_corner_location_key_)) {
                echo "checked=\"checked\"";
            }
            echo " />
                                <span>";
            // line 486
            if (isset($context["corner_location_value"])) { $_corner_location_value_ = $context["corner_location_value"]; } else { $_corner_location_value_ = null; }
            echo twig_escape_filter($this->env, $_corner_location_value_, "html", null, true);
            echo "</span>
                            </label>
                            ";
            // line 488
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ((0 == $this->getAttribute($_loop_, "index") % 2)) {
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
        if (isset($context["initial_ease_in"])) { $_initial_ease_in_ = $context["initial_ease_in"]; } else { $_initial_ease_in_ = null; }
        if ($_initial_ease_in_) {
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
        if (isset($context["bg_click_new_window"])) { $_bg_click_new_window_ = $context["bg_click_new_window"]; } else { $_bg_click_new_window_ = null; }
        if ($_bg_click_new_window_) {
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
        if (isset($context["bg_track_clicks"])) { $_bg_track_clicks_ = $context["bg_track_clicks"]; } else { $_bg_track_clicks_ = null; }
        if ($_bg_track_clicks_) {
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
        if (isset($context["bg_track_clicks_category"])) { $_bg_track_clicks_category_ = $context["bg_track_clicks_category"]; } else { $_bg_track_clicks_category_ = null; }
        echo twig_escape_filter($this->env, $_bg_track_clicks_category_, "html", null, true);
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
        if (isset($context["roles"])) { $_roles_ = $context["roles"]; } else { $_roles_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_roles_);
        foreach ($context['_seq'] as $context["role"] => $context["role_title"]) {
            // line 549
            echo "                            <option ";
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            if (isset($context["single_post_override"])) { $_single_post_override_ = $context["single_post_override"]; } else { $_single_post_override_ = null; }
            if (($_role_ == $_single_post_override_)) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            echo twig_escape_filter($this->env, $_role_, "html", null, true);
            echo "\">";
            if (isset($context["role_title"])) { $_role_title_ = $context["role_title"]; } else { $_role_title_ = null; }
            echo twig_escape_filter($this->env, $_role_title_, "html", null, true);
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
        if (isset($context["submit_button"])) { $_submit_button_ = $context["submit_button"]; } else { $_submit_button_ = null; }
        echo $_submit_button_;
        echo "

    </form>

    <div id=\"my_footer\">
        <img src=\"";
        // line 562
        if (isset($context["plugin_base_url"])) { $_plugin_base_url_ = $context["plugin_base_url"]; } else { $_plugin_base_url_ = null; }
        echo twig_escape_filter($this->env, $_plugin_base_url_, "html", null, true);
        echo "resources/images/myatus_logo_white.png\" alt=\"Myatu's\"/><br>
        <span>
            <a href=\"";
        // line 564
        if (isset($context["plugin_home"])) { $_plugin_home_ = $context["plugin_home"]; } else { $_plugin_home_ = null; }
        echo twig_escape_filter($this->env, $_plugin_home_, "html", null, true);
        echo "\" target=\"_blank\">";
        if (isset($context["plugin_name"])) { $_plugin_name_ = $context["plugin_name"]; } else { $_plugin_name_ = null; }
        echo twig_escape_filter($this->env, $_plugin_name_, "html", null, true);
        echo " ";
        if (isset($context["plugin_version"])) { $_plugin_version_ = $context["plugin_version"]; } else { $_plugin_version_ = null; }
        echo twig_escape_filter($this->env, $_plugin_version_, "html", null, true);
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
        if (isset($context["debug_info"])) { $_debug_info_ = $context["debug_info"]; } else { $_debug_info_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_debug_info_);
        foreach ($context['_seq'] as $context["debug_name"] => $context["debug_value"]) {
            // line 576
            echo "                <tr>
                    <th scope=\"row\" style=\"font-weight: bold;\">";
            // line 577
            if (isset($context["debug_name"])) { $_debug_name_ = $context["debug_name"]; } else { $_debug_name_ = null; }
            echo twig_escape_filter($this->env, $_debug_name_, "html", null, true);
            echo ":</th>
                    <td>";
            // line 578
            if (isset($context["debug_value"])) { $_debug_value_ = $context["debug_value"]; } else { $_debug_value_ = null; }
            echo twig_escape_filter($this->env, $_debug_value_, "html", null, true);
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
        return array (  1429 => 581,  1419 => 578,  1414 => 577,  1411 => 576,  1406 => 575,  1396 => 568,  1392 => 567,  1388 => 566,  1384 => 565,  1373 => 564,  1367 => 562,  1358 => 557,  1350 => 551,  1331 => 549,  1326 => 548,  1318 => 543,  1309 => 537,  1303 => 535,  1299 => 534,  1293 => 531,  1286 => 530,  1279 => 526,  1269 => 519,  1262 => 518,  1255 => 514,  1246 => 508,  1241 => 506,  1234 => 505,  1227 => 501,  1219 => 496,  1211 => 490,  1197 => 489,  1192 => 488,  1186 => 486,  1175 => 485,  1169 => 484,  1151 => 483,  1146 => 481,  1138 => 476,  1128 => 469,  1124 => 468,  1117 => 467,  1109 => 462,  1101 => 457,  1093 => 451,  1079 => 450,  1074 => 449,  1068 => 447,  1057 => 446,  1051 => 445,  1033 => 444,  1028 => 442,  1020 => 437,  1010 => 430,  1003 => 429,  996 => 425,  989 => 424,  982 => 420,  978 => 419,  971 => 418,  963 => 413,  953 => 406,  949 => 405,  942 => 404,  934 => 399,  926 => 394,  915 => 387,  907 => 383,  900 => 379,  893 => 374,  875 => 372,  870 => 371,  863 => 367,  855 => 362,  844 => 354,  839 => 352,  833 => 349,  829 => 348,  824 => 347,  817 => 343,  810 => 338,  791 => 336,  786 => 335,  779 => 331,  769 => 326,  757 => 317,  750 => 316,  743 => 312,  736 => 311,  730 => 308,  722 => 303,  712 => 296,  705 => 295,  698 => 291,  691 => 290,  685 => 287,  677 => 282,  670 => 277,  659 => 273,  648 => 272,  645 => 271,  640 => 270,  635 => 268,  627 => 263,  620 => 258,  606 => 257,  601 => 256,  595 => 254,  584 => 253,  578 => 252,  560 => 251,  555 => 249,  547 => 244,  537 => 237,  530 => 236,  522 => 231,  513 => 226,  507 => 223,  501 => 221,  494 => 217,  484 => 210,  477 => 209,  470 => 205,  463 => 204,  457 => 201,  449 => 196,  441 => 191,  433 => 185,  423 => 182,  413 => 181,  409 => 179,  404 => 178,  399 => 176,  395 => 175,  388 => 174,  381 => 170,  374 => 169,  367 => 165,  360 => 164,  353 => 160,  346 => 159,  339 => 155,  332 => 154,  325 => 150,  318 => 149,  311 => 145,  304 => 144,  298 => 141,  290 => 136,  282 => 131,  276 => 129,  270 => 126,  260 => 119,  255 => 117,  248 => 116,  242 => 113,  234 => 108,  224 => 101,  220 => 100,  215 => 99,  210 => 97,  203 => 96,  196 => 92,  189 => 91,  183 => 88,  178 => 86,  171 => 85,  165 => 82,  157 => 77,  145 => 68,  138 => 67,  131 => 63,  124 => 62,  117 => 58,  110 => 57,  104 => 54,  96 => 49,  88 => 43,  70 => 41,  65 => 40,  58 => 36,  48 => 30,  30 => 15,  22 => 9,  19 => 7,);
    }
}

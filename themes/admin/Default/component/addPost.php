<div class="page_header">
    Dodawanie przepisu
</div>
<div class="right_side_container posts_container">
    <form action method="post">
    <div class="post_box">
        <div class="post_box_title">Informacje ogólne</div>
        <table>
            <tbody>
                <tr>
                    <th valign="top" class="post_header">Tytuł <span class="required_icon">*</span></th>
                    <td class="new_post_td"><input class="new_post_input" id="recipe_title_input" name="recipe_title" type="text" placeholder="Tytuł przepisu"></td>
                </tr>

                <tr>
                    <th valign="top" class="post_header">Opis <span class="required_icon">*</span></th>
                    <td class="new_post_td"><input class="new_post_input" name="recipe_description" type="text" placeholder="Opis przepisu"></td>
                </tr>

                <tr>
                    <th valign="top" class="post_header">Składniki <span class="required_icon">*</span></th>
                    <td class="new_post_td" id="recipe_ingredients_container">
                        <ul id="recipe_ingredients_list">
                            <li><input id="recipe_ingredients_input" type="text" ></li>
                        </ul>
                        <input name="recipe_ingredients" id="recipe_ingredients_data" type="text" hidden="hidden">
                    </td>
                </tr>

                <tr>
                    <th valign="top" class="post_header">Zawartość <span class="required_icon">*</span></th>
                    <td class="new_post_td">
                        <div class="new_post_content">
                            <div class="new_post_editor"></div>
                            <textarea class="new_post_content_input" name="recipe_content"></textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th valign="top" class="post_header">Kategorie <span class="required_icon">*</span></th>
                    <td class="new_post_td"><input class="new_post_input" name="recipe_categories" type="text" placeholder="Kategorie"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="post_box">
        <div class="post_box_title">Zdjęcia</div>
    </div>

        <div class="new_post_right_box">
            <h3>Ustawienia</h3>
            <h4 class="recipe_settings_title">Data publikacji</h4>
            <input class="recipe_settings_input" type="date" name="recipe_date">
            <h4 class="recipe_settings_title">Link</h4>
            <input class="recipe_settings_input" id="recipe_link_input" type="text" name="recipe_link" placeholder="link-do-przepisu">
            <h4 class="recipe_settings_title">Status</h4>
            <select class="recipe_status_input" name="recipe_status">
                <option value="active">Aktywny</option>
                <option value="inactive">Niektywny</option>
            </select>
            <input class="recipe_form_submit" type="submit" value="Opublikuj">
        </div>

    </form>
</div>
<script src="<?php echo ABSPATH."themes/admin/Default/js/ingredientsHandler.js" ?>"></script>
<script src="<?php echo ABSPATH."themes/admin/Default/js/linkHandler.js" ?>"></script>
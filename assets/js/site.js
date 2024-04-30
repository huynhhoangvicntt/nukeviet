/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2022 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

function formXSSsanitize(form) {
    $(form).find("input, textarea").not(":submit, :reset, :image, :file, :disabled").not('[data-sanitize-ignore]').each(function() {
        let value;
        if (this.dataset.editorname && window.nveditor && window.nveditor[this.dataset.editorname]) {
            value = window.nveditor[this.dataset.editorname].getData();
        } else {
            value = $(this).val();
        }
        $(this).val(DOMPurify.sanitize(value, {}));
    });
}

$(function() {
    $('body').on('click', '[type=submit]:not([name])', function(e) {
        var form = $(this).parents('form');
        if (XSSsanitize && !$('[name=submit]', form).length) {
            e.preventDefault();
            formXSSsanitize(form);
            $(form).submit();
        }
    });
})

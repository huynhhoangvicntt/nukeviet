// JS chức năng quản lý thí sinh 
function get_contestant_alias(id, checksess) {
    var fullname = strip_tags(document.getElementById('element_title').value);
    if (fullname != '') {
        $.post(
            script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=content&nocache=' + new Date().getTime(),
            'changealias=' + checksess + '&fullname=' + encodeURIComponent(fullname) + '&id=' + id, function(res) {
            if (res != "") {
                document.getElementById('element_alias').value = res;
            } else {
                document.getElementById('element_alias').value = '';
            }
        });
    }
}

function nv_delete_contestant(id, checksess) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(
            script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&nocache=' + new Date().getTime(),
            'delete=' + checksess + '&id=' + id, function(res) {
            var r_split = res.split("_");
            if (r_split[0] == 'OK') {
                location.reload();
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
}

function nv_main_action(oForm, checkss, msgnocheck) {
    var fa = oForm['idcheck[]'];
    var listid = '';
    if (fa.length) {
        for (var i = 0; i < fa.length; i++) {
            if (fa[i].checked) {
                listid = listid + fa[i].value + ',';
            }
        }
    } else {
        if (fa.checked) {
            listid = listid + fa.value + ',';
        }
    }
  
    if (listid != '') {
        var action = document.getElementById('action').value;
        if (action == 'delete') {
            if (confirm(nv_is_del_confirm[0])) {
                $.post(
                    script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&nocache=' + new Date().getTime(),
                    'delete=' + checkss + '&listid=' + listid, function(res) {
                    var r_split = res.split("_");
                    if (r_split[0] == 'OK') {
                        location.reload();
                    } else {
                        alert(nv_is_del_confirm[2]);
                    }
                });
            }
        }
    } else {
        alert(msgnocheck);
    }
}

function nv_delete_vote(id, checksess) {
    if (confirm(nv_is_del_confirm[0])) {
        $.post(
            script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=voters&nocache=' + new Date().getTime(),
            'delete=' + checksess + '&vote_id=' + id, function(res) {
            if (res == 'OK') {
                location.reload();
            } else {
                alert(nv_is_del_confirm[2]);
            }
        });
    }
}

function nv_voters_action(oForm, checkss, msgnocheck) {
    var fa = oForm['idcheck[]'];
    var listid = '';
    if (fa.length) {
        for (var i = 0; i < fa.length; i++) {
            if (fa[i].checked) {
                listid = listid + fa[i].value + ',';
            }
        }
    } else {
        if (fa.checked) {
            listid = listid + fa.value + ',';
        }
    }
  
    if (listid != '') {
        var action = document.getElementById('action').value;
        if (action == 'delete') {
            if (confirm(nv_is_del_confirm[0])) {
                $.post(
                    script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=voters&nocache=' + new Date().getTime(),
                    'delete=' + checkss + '&listid=' + listid, function(res) {
                    if (res == 'OK') {
                        location.reload();
                    } else {
                        alert(nv_is_del_confirm[2]);
                    }
                });
            }
        }
    } else {
        alert(msgnocheck);
    }
}

function nv_change_contestant_status(id, checksess) {
    $('#change_status' + id).prop('disabled', true);
    $.post(
        script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&nocache=' + new Date().getTime(),
        'changestatus=' + checksess + '&id=' + id, function(res) {
        $('#change_status' + id).prop('disabled', false);
        if (res != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            location.reload();
        }
    });
}

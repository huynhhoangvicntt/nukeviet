<!-- BEGIN: main -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label>File:</label>
                <input type="file" name="uploadfile">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
            </div>
            <div class="form-group">
                <label>Remote File:</label>
                <input type="text" class="form-control" name="remotefile">
            </div>
            <input class="btn btn-primary" name="submitremote" type="submit" value="{LANG.save}" />
        </div>
    </div>
</form>
<!-- END: main -->

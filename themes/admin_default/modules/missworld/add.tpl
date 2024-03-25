<!-- BEGIN: main -->
<div class="table-responsive">
   <form class="navbar-form" method="post" action="" enctype="multipart/form-data">
   <table>
   		<tr>
         	<td><strong>Name</strong><sup class="required">(*)</sup></td>
            <td><input type="text" name="name" id="title" class="w300 form-control" value="{DATA.name}"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
         	<td><strong>Ngày tháng năm sinh</strong><sup class="required">(*)</sup></td>
            <td><input type="text" name="birthday" class="w300 form-control" value="{DATA.birthday}"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
         	<td><strong>Avatar</strong><sup class="required">(*)</sup></td>
            <td><input type="text" name="avatar" class="w300 form-control" value="{DATA.avatar}"/></td>
            <td>&nbsp;</td>
        </tr>     
        <tr>
         	<td><label>File:</label></td>
            <td><input type="file" name="uploadfile"></td>
        	<td>&nbsp;</td>
        </tr>   
        
        <tr>
            <td colspan="3" class="text-center"><input name="submit1" type="submit" value="{LANG.save}" class="btn btn-primary w100" /></td>
        </tr>
   </table>
   </form>
</div>

<!-- END: main -->

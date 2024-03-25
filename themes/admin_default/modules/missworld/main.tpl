<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <colgroup>
            <col class="w100">
            <col span="1">
            <col span="2" class="w150">
        </colgroup>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">id</th>
                <th class="text-nowrap">Họ tên</th>
                <th class="text-nowrap">Ngày tháng năm sinh</th>
                <th class="text-nowrap">Avatar</th>           
            </tr>
        </thead>
        <tbody>
        <!-- BEGIN: loop -->
        	<tr class="text-center">
                <td class="text-nowrap">{DATA.id}</td>
                <td class="text-nowrap">{DATA.name}</td>
                <td class="text-nowrap">{DATA.birthday}</td>
                <td class="text-nowrap"><img src="{DATA.avatar}"></td>      
                 <td class="text-nowrap"> 
                 	<a href="{DATA.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> {GLANG.edit}</a>    
                 </td>      
            </tr>
        <!-- END: loop -->
        </tbody>
        <tr>
        	<td colspan=4>{NV_GENERATE_PAGE}</td>
        </tr>
    </table>
</div>
<!-- END: main -->

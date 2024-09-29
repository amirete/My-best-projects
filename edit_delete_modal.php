<!-- Edit -->


<html dir="rtl" lang="fa-IR">

<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">ویرایش عضو</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">نام اعضای گروه:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="gpname" value="<?php echo $row['gpname']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">موضوع پروژه:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pjname" value="<?php echo $row['pjname']; ?>">
					</div>
				</div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه اول:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p1" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه دوم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p2" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه سوم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p3" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه چهارم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p4" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه پنجم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p5" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه ششم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p6" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه هفتم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p7" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه هشتم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p8" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه نهم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p9"  required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">امتیاز گروه دهم:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="p10" required>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <b>لغو</b></button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> <b>بروز رسانی</b></button>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>حذف عضو</b></h4></center>
            </div>
            <div class="modal-body">	
                <p class="text-center"><b>آیا مطمئنید که میخواهید حذف کنید؟</b></p>
				<h2 class="text-center"><?php echo $row['gpname'].' '.$row['pjname']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <b>لغو</b></button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> <b>بله</b></a>
            </div>

        </div>
    </div>
</div>
</html>
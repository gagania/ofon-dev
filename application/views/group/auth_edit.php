<br/>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>group/save_auth">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Hak Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($leftMenu) {
                            foreach ($leftMenu as $index => $value) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $value['menu_name'] ?></td>
                                    <td><?= $value['menu_check'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
                <div class="form-actions">
                    <input type="hidden" id="group_code" name="group_code" value="<?php echo isset($groupCode)? $groupCode: ''?>"/>
                        <button class="btn blue" type="submit" ><i class="icon-ok"></i> Save</button>
                        <button class="btn" type="button">Cancel</button>
                </div>
                </form>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
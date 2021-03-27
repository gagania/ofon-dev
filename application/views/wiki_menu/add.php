<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>

<div class="row-fluid" style="padding-top:20px;">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>wiki_menu/save">
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Nama Menu</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="asrs_name" name="menu_name" value="<?php echo isset($dataRow[0]['menu_name']) ? $dataRow[0]['menu_name'] : '' ?>" class="m-wrap medium" placeholder="nama menu">
                            <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Parent</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <?=$menuList?>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Order</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="menu_order" name="menu_order" value="<?php echo isset($dataRow[0]['menu_order']) ? $dataRow[0]['menu_order'] : '' ?>" class="m-wrap xsmall" placeholder="menu order">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn blue" type="submit" ><i class="icon-ok"></i> Save</button>
                        <button class="btn" type="submit">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
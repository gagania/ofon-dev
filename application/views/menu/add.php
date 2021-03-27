<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>

<div class="row-fluid" style="padding-top:20px;">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>menu/save">
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Nama Menu</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="asrs_name" name="menu_name" value="<?php echo isset($dataRow[0]->menu_name) ? $dataRow[0]->menu_name : '' ?>" class="m-wrap medium" placeholder="nama menu">
                            <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]->id) ? $dataRow[0]->id : '' ?>"/>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Link</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="menu_link" name="menu_link" value="<?php echo isset($dataRow[0]->menu_link) ? $dataRow[0]->menu_link : '' ?>" class="m-wrap medium" placeholder="menu link(nama controller)">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Web Link</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="menu_web_link" name="menu_web_link" value="<?php echo isset($dataRow[0]->menu_web_link) ? $dataRow[0]->menu_web_link : '' ?>" class="m-wrap medium" placeholder="menu link(nama controller)">
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
                            <input type="text" id="menu_order" name="menu_order" value="<?php echo isset($dataRow[0]->menu_order) ? $dataRow[0]->menu_order : '' ?>" class="m-wrap xsmall" placeholder="menu order">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Type</label>
                        <div class="controls">
                            <select id="menu_type" name="menu_type" tabindex="1" class="medium m-wrap">
                                <?php 
                                $selected='';              
                                foreach($menuType as $index => $value) { 
                                    if($dataRow != NULL){                  
                                        if ($dataRow[0]->menu_type) {
                                            if ($dataRow[0]->menu_type == $index) {
                                                $selected = "selected=selected";
                                            } else {
                                                $selected = '';
                                            }
                                        }
                                    }
                                ?>
                                    <option value="<?=$index?>" <?php echo $selected;?>><?=$value?></option>
                                <?php }?>
                            </select>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Position</label>
                        <div class="controls">
                            <select id="menu_ctgr" name="menu_ctgr" tabindex="1" class="medium m-wrap">
                                <?php 
                                $selected='';              
                                foreach($menuCtgr as $index => $value) { 
                                    if($dataRow != NULL){                  
                                        if ($dataRow[0]->menu_ctgr) {
                                            if ($dataRow[0]->menu_ctgr == $index) {
                                                $selected = "selected=selected";
                                            } else {
                                                $selected = '';
                                            }
                                        }
                                    }
                                ?>
                                    <option value="<?=$index?>" <?php echo $selected;?>><?=$value?></option>
                                <?php }?>
                            </select>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Aktif</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="checkbox" id="menu_active" name="menu_active" <?php echo (isset($dataRow[0]->menu_active) && $dataRow[0]->menu_active == 'Y') ? 'checked' : '' ?> value="Y" class="m-wrap medium">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu Static</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="checkbox" id="is_static" name="is_static" <?php echo (isset($dataRow[0]->is_static) && $dataRow[0]->is_static == 'Y') ? 'checked' : '' ?> value="Y" class="m-wrap medium">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button class="btn blue" type="submit" ><i class="icon-ok"></i> Save</button>
                        <button class="btn" type="button" onclick="javascript:cancelButton('<?=base_url()?>','menu');">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
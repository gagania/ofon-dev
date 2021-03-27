<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>

<div class="row-fluid" style="padding-top:20px;">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>user_admin/save">
                    
                    <?php                        
                    $hide_superman = '';   
                    $hide_kategori = 'hide';
                    if(isset($this->session->userdata['user_group'])){
                        $user_group = explode(',', $this->session->userdata['user_group']);
                        if(in_array("00", $user_group)) { 
                           $hide_superman = '';            
                           $hide_kategori = 'hide';
                        }else{
                           $hide_superman = 'hide';
                           $input_user_type = '<input type="hidden" name="user_type" id="user_type" value="wf"/>';
                           if($this->session->userdata['user_type'] == 'wf'){
                               $hide_kategori = '';
                           }
                        }
                    }?>
                    
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Nama</label>
                        <div class="controls">
                            <input type="text" id="user_name" name="user_name" value="<?php echo isset($dataRow[0]->user_name) ? $dataRow[0]->user_name : '' ?>" class="m-wrap medium" placeholder="nama user">
                            
                            <span class="help-inline"></span>
                        </div>
                    </div>
                
                     <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Nama Asli</label>
                        <div class="controls">
                            <input type="text" id="user_real_name" name="user_real_name" value="<?php echo isset($dataRow[0]->user_real_name) ? $dataRow[0]->user_real_name : '' ?>" class="m-wrap medium" placeholder="nama asli">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Password</label>
                        <div class="controls">
                            <input type="password" id="user_pass" name="user_pass" value="" class="m-wrap medium" placeholder="password">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Retype Password</label>
                        <div class="controls">
                            <input type="password" id="user_pass_retype" name="user_pass_retype" value="" class="m-wrap medium" placeholder="retype password">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Group</label>  
                        <?php
                        if ($groupData) {
                                if (isset($dataRow[0]->user_group)) {
                                    $dataRow[0]->user_group = explode(',',$dataRow[0]->user_group);
                                }
                            ?>
                            <div class="controls" style="margin-left:200px">
                            <?php foreach($groupData as $value) {
                                    $checked='';
                                    if (isset($dataRow[0]->user_group)) {
                                        if (in_array($value['group_code'],$dataRow[0]->user_group)) {
                                            $checked='checked';
                                        } 
                                    }?>
                                        <label class="checkbox line">
                                        <input type="checkbox" id="user_group[]" name="user_group[]" <?=$checked?> value="<?php echo $value['group_code'];?>">
                                            <?php echo $value['group_name'];?>
                                        </label>
                                    <?php 
                            }?>
                            </div>
                        <?php } ?>
                    </div>
<!--                    <div class="control-group <?=$hide_kategori?> kategori_group">
                        <label class="control-label" style="float:left;width:120px;">Kategori dmsolidwood</label> 
                            <div class="controls" style="margin-left:200px; height: 10px;">
                            <?php foreach($kategoriData as $value) {
                                    $checked='';
                                    if (isset($dataRow[0]->user_ctgr_wf)) {
                                        $user_catageory_check = explode(',', $dataRow[0]->user_ctgr_wf); 
                                        if (in_array($value['category_id'],$user_catageory_check)) {
                                            $checked='checked';
                                        } 
                                    }
                            ?>
                                        <label class="checkbox line">
                                        <input type="checkbox" id="user_ctgr_wf[]" name="user_ctgr_wf[]" <?=$checked?> value="<?php echo $value['category_id'];?>">
                                            <?php echo $value['category_name'];?>
                                        </label>
                                    <?php 
                            }?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Lokasi</label>
                        <div class="controls">
                            <select id="user_lokasi_id" name="user_lokasi_id" tabindex="1" class="medium m-wrap">
                                <?php 
                                $selected='';
                                foreach($lokasiData as $index => $value) { 
                                    if ($dataRow[0]->user_lokasi_id) {
                                        if ($dataRow[0]->user_lokasi_id == $index) {
                                            $selected = "selected=selected";
                                        } else {
                                            $selected = '';
                                        }
                                    }
                                ?>
                                    <option value="<?=$index?>" <?php echo $selected;?>><?=$value?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Divisi</label>
                        <div class="controls" >
                            <select id="user_divisi_id" name="user_divisi_id" tabindex="1" class="medium m-wrap">
                                <?php 
                                $selected='';
                                foreach($divisiData as $index => $value) { 
                                    if ($dataRow[0]->user_divisi_id) {
                                        if ($dataRow[0]->user_divisi_id == $index) {
                                            $selected = "selected=selected";
                                        } else {
                                            $selected = '';
                                        }
                                    }
                                ?>
                                    <option value="<?=$index?>" <?php echo $selected;?>><?=$value?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Jabatan</label>
                        <div class="controls">
                            <select id="user_jbtn_id" name="user_jbtn_id" tabindex="1" class="medium m-wrap">
                                <?php 
                                $selected='';
                                foreach($jabatanData as $index => $value) { 
                                    if ($dataRow[0]->user_jbtn_id) {
                                        if ($dataRow[0]->user_jbtn_id == $index) {
                                            $selected = "selected=selected";
                                        } else {
                                            $selected = '';
                                        }
                                    }
                                ?>
                                    <option value="<?=$index?>" <?php echo $selected;?>><?=$value?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>-->
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">email</label>
                        <div class="controls">
                            <input type="text" id="user_real_name" name="user_email" value="<?php echo isset($dataRow[0]->user_email) ? $dataRow[0]->user_email : '' ?>" class="m-wrap medium" placeholder="email">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]->id) ? $dataRow[0]->id : '' ?>"/>
                        <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
                        <button class="btn" type="submit" id="btncancel" name="btncancel" value="Cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>        
    $(document).ready(function(){
        if($('#user_type').val() == 'wf'){
            $('.kategori_group').show();
        }
    });
    function changeUserType(){
        if($('#user_type').val() == 'wf'){
            $('.kategori_group').show();
        }else{
            $('.kategori_group').hide();
        }
    }
</script>
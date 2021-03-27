<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>
<!-- BEGIN PAGE CONTENT-->
<br/>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title;?></div>
            </div>
            <div class="portlet-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <button class="btn green" onclick="javascript:add_menu('<?=base_url()?>');">
                            Add New <i class="icon-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn green" onclick="javascript:delete_menu('<?=base_url()?>','menu');">
                            Delete <i class="icon-plus"></i>
                        </button>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                            <th>Nama Menu</th>
                            <th>Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($dataList) {
                            $i=0;
                            foreach ($dataList as $index => $value) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="delcheck" value="<?php echo $value->id; ?>" /></td>
                                    <td><a href="#" onclick="javascript:add_menu('<?=base_url()?>','<?=$value->id?>');"><?php echo $value->menu_name; ?></a></td>
                                    <td><?=$value->menu_active?></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                     <input type="hidden" id="totalRow" name="totalRow" value="<?=$i?>"/>           
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
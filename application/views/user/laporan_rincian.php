<script type="text/javascript" src="<?= base_url() ?>assets/application.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3>Rincian Pemakaian Telepon</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12" style="padding:10px;">
                        <div class="form-group col-md-12">
                            <label class="control-label col-lg-2" style="padding-top:9px;">Date</label>
                            <div class="col-lg-3 input-group date" style="float:left">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="search_date">
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-block btn-primary" onclick="javascript:searchRincian('cdr_list', '<?= base_url() ?>', '<?php echo $this->router->fetch_class(); ?>', 'search_date  ','','cdr_list');"> <i class="fa fa-fw fa-search"></i> Search</button>
                            </div>
                        </div>
                        <div id="" class="" style="float:right;">
                            
                            <!--<label>Search: <input type="text" field="ctgr_name" id="search_desc" name="search_desc" onkeyup="javascript:searchdata('cdr_list', '<?= base_url() ?>', '<?php echo $this->router->fetch_class(); ?>', this,'','edit_category');" class="m-wrap small"></label>-->
                        </div>
                    </div>
                    <table class="table table-hover" id="cdr_list">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>A#</th>
                                <th>B#</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Berhenti</th>
                                <th>Group</th>
                                <th>Durasi</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($dataList) {
                                $i = 1;
                                foreach ($dataList as $index => $value) {?>
                                    <tr class="odd" role="row">
                                        <td><?=$i?></td>
                                        <td><?php echo $value['source']; ?></a></td>
                                        <td><?php echo $value['destination']; ?></a></td>
                                        <td><?php echo $value['starttime']; ?></td>
                                        <td><?php echo $value['stoptime']; ?></td>
                                        <td><?php echo $value['label']; ?></td>
                                        <td><?php echo $value['duration']; ?></td>
                                        <td><?php echo $value['sellcost']; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <div style="width:20%;margin:0 auto;">
                            <table class="footer-table">
                                <tbody>
                                    <tr>
                                        <td><button onclick="updatelist('cdr_list', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'first');" class="btn-first" type="button">&nbsp;</button></td>
                                        <td><button onclick="updatelist('cdr_list', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'prev');" class="btn-prev" type="button">&nbsp;</button></td>
                                        <td><span class="ytb-sep"></span></td>
                                        <td><span class="ytb-text">Page</span></td>
                                        <td><input type="text" onkeyup="updatelist('cdr_list', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'page', this.value);" size="3" value="<?php echo ($pnumber) ? $pnumber : 1; ?>" class="pnumber"></td>
                                        <td><span class="ytb-text" id="totaldata_view">of <?php echo ceil($totaldata / 10) ?></span></td>
                                        <td><span class="ytb-sep"></span></td>
                                        <td><button onclick="updatelist('cdr_list', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'next');" class="btn-next" type="button">&nbsp;</button></td>
                                        <td><button onclick="updatelist('cdr_list', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'last');" class="btn-last" type="button">&nbsp;</button></td>
                                        <td>
                                            <input type="hidden" id="limit" name="limit" value="0"/>
                                            <input type="hidden" id="totaldata" name="totaldata" value="<?php echo $totaldata; ?>"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="overlay" style="display:none">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
</section>
<div id="modal_getcustomer" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"></h5>
            </div>

            <form action="<?= base_url() ?>client/save" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Email</label>
                                <input type="text" id="email" name="email" placeholder="" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Nickname</label>
                                <input type="text" id="nickname" name="nickname" placeholder="" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Credit Line</label>
                                <input type="text" id="credit" name="credit" placeholder="" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Zero Credit Line</label>
                                <div class="col-md-12">
                                    <div class="radio col-md-4">
                                        <label>
                                        <input type="radio" name="zero_credit" value="1" class="styled">Automatic
                                        </label>
                                    </div>

                                    <div class="radio col-md-4" style="margin-top:10px !important">
                                            <label>
                                                    <input type="radio" name="zero_credit" value="2" class="styled">
                                                    Manual
                                            </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>Customer Type</label>
                                <div class="col-md-12">
                                    <div class="radio col-md-4">
                                        <label><input type="radio" name="c_type" value="1" class="styled">Trial</label>
                                    </div>
                                    <div class="radio col-md-4" style="margin-top:10px !important">
                                            <label><input type="radio" name="c_type" value="2" class="styled">Deal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--<link rel="stylesheet" href="<?=base_url()?>assets/themes/plugins/datepicker/datepicker-bs3.css">
<script src="<?=base_url()?>assets/themes/plugins/datepicker/moment.min.js"></script>
<script src="<?=base_url()?>assets/themes/plugins/datepicker/datepicker.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#search_date').datepicker({
            dateFormat: 'd/m/Y' }
        );
    });
</script>
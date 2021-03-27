<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<link href="<?= base_url() ?>assets/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<br/>
<div id="legislasi_list_template" class="blog">
    <div class="tbody col-sm-12 col-xs-12 meta">
    <?php
if ($legislasiList) {
    foreach ($legislasiList as $index => $value) {
        ?>
        <article style="margin-bottom:24px;padding:0 0 18px;"> 
            <div class="row">
                <div class="col-sm-12 col-xs-12 meta">
                    <div class="col-sm-12 col-xs-12 meta" style="padding:0;border-radius:7px;border:1px solid">
                        <div style="height:30px;background-color:#000000;border-radius:4px">
                            <div style="margin-top: 5px; float:right;color:white;" class="col-sm-3">
                                <div class="col-sm-10">
                                    <span>Effective Date of Law</span>

                                </div>
                                <div class="">
                                    <a href="#" onclick="javascript:orderingdata('<?= base_url(); ?>', '<?= $this->router->fetch_class(); ?>', '<?= $prvncode ?>', 'asc', 'legislasi_list_template', this);" class="ascLink" >asc</a>
                                    <a href="#" onclick="javascript:orderingdata('<?= base_url(); ?>', '<?= $this->router->fetch_class(); ?>', '<?= $prvncode ?>', 'desc', 'legislasi_list_template', this);" class="descLink" style="display: none;">desc</a>
                                </div>
                            </div>
                        </div>
                        <div class="list_body" style="padding: 20px;">
                            <div class="list_head col-sm-10" style="padding:5px;" onclick="javascript:scrolldown(this)">
                                <span class="icon-plus" style="padding:5px;float:left"></span>
                                <div style="font-weight:bold;font-size:16px;"><?= $value['lgls_title'] ?></div>
                            </div>
                            <div class="col-sm-2" ><?= date("F d, Y", strtotime($value['lgls_date'])) ?></div>
                            <div class="list_body col-sm-12" style="display:none">
                                <div class="col-sm-2" style="float:left">Comments</div>
                                <div class="col-sm-10">: <?= $value['lgls_desc'] ?></div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <?php if ($value['lgls_file_path'] != '') { ?>
                                <div class="col-sm-11 col-xs-10 meta" style="padding:5px"> 
                                    <div class="btn-group">
                                        <a class="btn green" href="<?= base_url() . $value['lgls_file_path'] ?>" target="_blank">Original File</a>
                                    </div>
                                </div>
                            <? }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php
    }
}
?>
    </div>
    <div style="float: left;width:100%">
        <div class="paging_area">
            <table class="footer-table">
                <tbody>
                    <tr>
                        <td><button onclick="updatelistfront('legislasi_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'first', '0', '<?= $prvncode ?>');" class="btn-first" type="button">&nbsp;</button></td>
                        <td><button onclick="updatelistfront('legislasi_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'prev', '0', '<?= $prvncode ?>');" class="btn-prev" type="button">&nbsp;</button></td>
                        <td><span class="ytb-sep"></span></td>
                        <td><span class="ytb-text">Page</span></td>
                        <td><input type="text" onkeyup="updatelistfront('legislasi_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'page', this.value, '<?= $prvncode ?>');" size="3" value="<?php echo ($pnumber) ? $pnumber : 1; ?>" class="pnumber-view"></td>
                        <td><span class="ytb-text" id="totaldata_view">of <?php echo ceil($totaldata / 10) ?></span></td>
                        <td><span class="ytb-sep"></span></td>
                        <td><button onclick="updatelistfront('legislasi_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'next', '0', '<?= $prvncode ?>');" class="btn-next" type="button">&nbsp;</button></td>
                        <td><button onclick="updatelistfront('legislasi_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'last', '0', '<?= $prvncode ?>');" class="btn-last" type="button">&nbsp;</button></td>
                        <td>
                            <input type="hidden" id="limit" name="limit" value="0"/>
                            <input type="hidden" id="prvncode" name="prvncode" value="<?= $prvncode ?>"/>
                            <input type="hidden" id="totaldata" name="totaldata" value="<?php echo $totaldata; ?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function() {
            initPaging();
            //toggle the component with class accordion_body
//            $(".list_head").each(function() {
//                $(this).click(function() {
//                    if ($(this).siblings(".list_body").is(':visible')) {
//                        $(this).siblings(".list_body").slideUp(300);
//                        $(this).children('span').removeClass('icon-minus').addClass('icon-plus');
//                    } else {
//                        $(this).siblings(".list_body").slideDown(300);
//                        $(this).children('span').removeClass('icon-plus').addClass('icon-minus');
//                    }
//                });
//
//            });

        });
</script>
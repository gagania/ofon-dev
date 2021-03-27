<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<div id="news_list_template">
    <?php if ($newsList) {
        foreach ($newsList as $index => $value) {
            ?>
            <article> 
                <div class="row">
                    <div class="col-sm-11 col-xs-10 meta">
                        <h2 style="font-weight:bold"><a href="<?php echo base_url().$this->router->fetch_class().'/page/'.$value['news_alias']; ?>"><?= $value['news_name'] ?></a></h2>
                        <p><?=date("D M d", strtotime($value['news_date']))?></p>
                        <p class="intro"><?=substr($value['news_content'], 0, strrpos(substr( $value['news_content'], 0, 850), '</p>')) ?></p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/page/'.$value['news_alias']; ?>" class="btn btn-primary pull-right">Read More</a> </div>
                </div>
            </article>

        <?php }
    }
    ?>
</div>
<div style="width:100%">
    <div class="paging_area">
        <table class="footer-table">
            <tbody>
                <tr>
                    <td><button onclick="updatelist('news_list_template', '<?php echo base_url(); ?>', 'events', 'first');" class="btn-first" type="button">&nbsp;</button></td>
                    <td><button onclick="updatelist('news_list_template', '<?php echo base_url(); ?>', 'events', 'prev');" class="btn-prev" type="button">&nbsp;</button></td>
                    <td><span class="ytb-sep"></span></td>
                    <td><span class="ytb-text">Page</span></td>
                    <td><input type="text" onkeyup="updatelist('news_list_template', '<?php echo base_url(); ?>', 'events', 'page', this.value);" size="3" value="<?php echo ($pnumber) ? $pnumber : 1; ?>" class="pnumber-view"></td>
                    <td><span class="ytb-text" id="totaldata_view">of <?php echo round($totaldata / 10) ?></span></td>
                    <td><span class="ytb-sep"></span></td>
                    <td><button onclick="updatelist('news_list_template', '<?php echo base_url(); ?>', 'events', 'next');" class="btn-next" type="button">&nbsp;</button></td>
                    <td><button onclick="updatelist('news_list_template', '<?php echo base_url(); ?>', 'events', 'last');" class="btn-last" type="button">&nbsp;</button></td>
                    <td>
                        <input type="hidden" id="limit" name="limit" value="0"/>
                        <input type="hidden" id="totaldata" name="totaldata" value="<?php echo $totaldata; ?>"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        initPaging();
    });
</script>
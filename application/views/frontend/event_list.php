<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<div id="event_list_template">
    <?php if ($eventList) {
        foreach ($eventList as $index => $value) {
            ?>
            <article> 
                <div class="row">
                    <div class="col-sm-1 col-xs-2 meta">
                        <div class="meta-date"><span>Apr</span>14</div>
                    </div>
                    <div class="col-sm-11 col-xs-10 meta">
                        <h2><a href="blog-post.html"><?= $value['event_name'] ?></a></h2>
                        <p class="intro">
                            <?= $value['event_content'] ?>
                        </p>
                        <a href="blog-post.html" class="btn btn-primary pull-right">Read More</a> </div>
                </div>
            </article>

        <?php }
    }
    ?>
</div>
<div style="width:100%">
    <div style="width:20%;margin:0 auto;">
        <table class="footer-table">
            <tbody>
                <tr>
                    <td><button onclick="updatelist('event_list_template', '<?php echo base_url(); ?>', 'event_list', 'first');" class="btn-first" type="button">&nbsp;</button></td>
                    <td><button onclick="updatelist('event_list_template', '<?php echo base_url(); ?>', 'event_list', 'prev');" class="btn-prev" type="button">&nbsp;</button></td>
                    <td><span class="ytb-sep"></span></td>
                    <td><span class="ytb-text">Page</span></td>
                    <td><input type="text" onkeyup="updatelist('event_list_template', '<?php echo base_url(); ?>', 'event_list', 'page', this.value);" size="3" value="<?php echo ($pnumber) ? $pnumber : 1; ?>" class="pnumber"></td>
                    <td><span class="ytb-text" id="totaldata_view">of <?php echo round($totaldata / 10) ?></span></td>
                    <td><span class="ytb-sep"></span></td>
                    <td><button onclick="updatelist('event_list_template', '<?php echo base_url(); ?>', 'event_list', 'next');" class="btn-next" type="button">&nbsp;</button></td>
                    <td><button onclick="updatelist('event_list_template', '<?php echo base_url(); ?>', 'event_list', 'last');" class="btn-last" type="button">&nbsp;</button></td>
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
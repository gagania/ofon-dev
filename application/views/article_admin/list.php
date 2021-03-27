<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<!--<link href="<?= base_url() ?>assets/metronic/css/style.css" rel="stylesheet" type="text/css"/>-->
<section id="page-content" style="margin-top:95px;">
    <div class="container">
        <div class="page-title">
            <h1>Blog</h1>
        </div>
        <div class="row">
            <div id="blog" class="blog_list grid-layout post-3-columns m-b-30" data-item="post-item" style="margin: 0px -20px -20px 0px; position: relative; opacity: 1;">
                <?php
                if ($articleData) {
                    foreach ($articleData as $index => $value) {
                        $value['artc_date'] = date('d F Y', strtotime($value['artc_date']));?>
                        <div class="post-item border" >
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="#">
                                        <img alt="" style="height:308px;" src="<?= base_url() . $value['artc_image_path'] ?>">
                                    </a>
                                    <span class="post-meta-category"><a href=""><?= $value['artc_ctgr_name'] ?></a></span>
                                </div>
                                <div class="post-item-description">
                                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?= $value['artc_date'] ?></span>
                                    <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i><?= $value['cmmnCount'] ?> Comments</a></span>
                                    <h2><a href="#"><?= $value['artc_name'] ?></a></h2>
                                    <div class="col-lg-12" style="margin-bottom:20px;word-wrap:break-word"><?= $value['artc_foreword'] ?></div>

                                    <a href="<?= base_url() . $this->router->fetch_class() ?>/detail/<?= $value['id'] ?>" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" onclick="updatelist_blog('blog_list', '<?= base_url() ?>', '<?= $this->router->fetch_class() ?>', 'first');"><i class="fa fa-angle-left"></i></a>
            </li>
            <?php
            $active = '';
            for ($i = 1; $i <= $pages; $i++) {
                if ($i == 1) {
                    $active = 'active';
                } else {
                    $active = '';
                }
                ?>
                <li class="page-item <?= $active ?>"><a class="page-link" href="#" onclick="javasript:paging_blog('blog_list', '<?= base_url() ?>', '<?= $this->router->fetch_class() ?>', this);"><?= $i ?></a></li>
            <?php } ?>

            <li class="page-item"><a class="page-link" href="#" onclick="updatelist_blog('blog_list', '<?= base_url() ?>', '<?= $this->router->fetch_class() ?>', 'last');"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>
</section>
<!-- Pagination -->
<!--<div class="mt20" style="width:100%">
    <div class="paging_area" style="width:30%">
        <table class="footer-table">
            <tbody>
                <tr>
                    <td><button onclick="updatelistBlog('article_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'first');" class="btn-first" type="button">&nbsp;</button></td>
                    <td><button onclick="updatelistBlog('article_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'prev');" class="btn-prev" type="button">&nbsp;</button></td>
                    <td><span class="ytb-sep"></span></td>
                    <td><span class="ytb-text">Page</span></td>
                    <td><input style="width:20px;margin-top:4px;padding:2px;" type="text" onkeyup="updatelist('article_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'page', this.value);" size="3" value="<?php echo ($pnumber) ? $pnumber : 1; ?>"></td>
                    <td><span class="ytb-text" id="totaldata_view">of <?php echo ceil($totaldata / 5) ?></span></td>
                    <td><span class="ytb-sep"></span></td>
                    <td><button onclick="updatelistBlog('article_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'next');" class="btn-next" type="button">&nbsp;</button></td>
                    <td><button onclick="updatelistBlog('article_list_template', '<?php echo base_url(); ?>', '<?php echo $this->router->fetch_class(); ?>', 'last');" class="btn-last" type="button">&nbsp;</button></td>
                    <td>
                        <input type="hidden" id="limit" name="limit" value="0"/>
                        <input type="hidden" id="totaldata" name="totaldata" value="<?= $totaldata ?>"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>-->
<script type="text/javascript">
    $(document).ready(function () {
//        initPagingBlog();
    });
</script>
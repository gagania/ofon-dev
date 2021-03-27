<?php
if ($articleData) {
    $articleData['artc_date'] = date('M d Y', strtotime($articleData['artc_date']));
    $date = explode(" ", $articleData['artc_date']);
    ?>
    <div class="col-md-12" style="margin-bottom: 10px;background-color:#fff;border-radius:8px"> 
        <article id="article_template_<?=$articleData['id']?>" style="border-bottom:0px !important">
            <div class="row">
                <div class="col-sm-12 col-xs-10 meta">
                    <div class="col-sm-9 col-xs-10 meta">
                        <h2><a href="<?=base_url()?>article/page/<?=$articleData['artc_alias']?>"><?= $articleData['artc_name'.$this->session->userdata('lang')] ?></a></h2>
                        <span class="meta-author">
    <?= $articleData['artc_date'] ?>
                        </span>
                        <span class="meta-comments"><i class="fa fa-comment"></i><a href="#"><?= $articleData['cmmnCount'] ?> Comments</a></span>
                        <span class="meta-comments">
                            <a href="javascript:void(0)" onclick="javascript:change_language('<?=base_url()?>','article','<?=$articleData['id']?>','')"><img src="<?=base_url()?>assets/starhotel/images/indonesia_flag.png" style="width:20px"/></a>
                            <a href="javascript:void(0)" onclick="javascript:change_language('<?=base_url()?>','article','<?=$articleData['id']?>','_en')"><img src="<?=base_url()?>assets/starhotel/images/en_flag.png" style="width:20px"/></a>
                        </span>
                    </div>
                    
                    <div class="col-sm-3 col-xs-10 meta">
                        <h2></h2>
                        <div style="margin-right:10px;text-align:center;float:left"><a href="<?= base_url() ?>researchers_dir/page/<?= (isset($articleData['rsrc_dir_alias']) ? $articleData['rsrc_dir_alias'] : (isset($articleData['fndt_alias']) ? $articleData['fndt_alias'] : '')) ?>">
    <?= (isset($articleData['rsrc_dir_name']) ? $articleData['rsrc_dir_name'] : (isset($articleData['fndt_name']) ? $articleData['fndt_name'] : '')) ?></a>
                        </div>
                        <div style="">
                            <img src="<?= base_url() . '../' . (isset($articleData['rsrc_dir_image_path']) ? $articleData['rsrc_dir_image_path'] : (isset($articleData['fndt_image_path']) ? $articleData['fndt_image_path'] : '')) ?>" style="width:50px;height:50px;">
                        </div>
                    </div>
                    <div id="socialHolder" class="col-md-3">
                        <div id="socialShare" class="btn-group share-group">
                            <a data-toggle="dropdown" class="btn btn-info">
                                <i class="fa fa-share-alt fa-inverse"></i>
                            </a>
                            <button href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle share" style="height: 28px">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="left:45px;min-width: 0px !important">
                                <li style="padding:3px">
                                    <a data-original-title="Twitter" rel="tooltip" onclick="window.open('https://twitter.com/intent/tweet?text=<?=$articleData['artc_alias']?>&related=&url=<?=base_url()?>article/page/<?=$articleData['artc_alias']?>&counturl=<?=base_url()?>article/page/<?=$articleData['artc_alias']?>&via=csis','twitter','width=600,height=400');" href="#" class="btn btn-twitter" data-placement="left">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li style="padding:3px">
                                    <a data-original-title="Facebook" rel="tooltip" onclick="window.open('https://www.facebook.com/sharer.php?u=<?=base_url()?>article/page/<?=$articleData['artc_alias']?>','fb','width=600,height=400');" href="#" class="btn btn-facebook" data-placement="left">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>					
                                <li style="padding:3px">
                                    <a data-original-title="Google+" rel="tooltip" href="#" class="btn btn-google" data-placement="left">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li style="padding:3px">
                                    <a data-original-title="LinkedIn" rel="tooltip" href="#" class="btn btn-linkedin" data-placement="left">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li style="padding:3px">
                                    <a data-original-title="Pinterest" rel="tooltip" class="btn btn-pinterest" data-placement="left">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li style="padding:3px">
                                    <a data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-10 meta">
                        <div class="col-md-4">
                            <img src="<?= base_url() . $articleData['artc_image_path'] ?>" style="width:200px;height:200px;">
                        </div>
                        <p class="intro"><?= $articleData['artc_desc'.$this->session->userdata('lang')] ?></p>
                        <input type="hidden" id="id" name="id" value="<?= $articleData['id'] ?>"/>
                        <a href="<?= base_url() ?>article" class="btn btn-primary pull-right">Back</a> 
                    </div>
                </div>
        </article>
    <?php if ($articleData['artc_file_path'] != '') { ?>
            <br/>
            <article> 
                <div class="row">
                    <div class="col-sm-11 col-xs-10 meta">Download Attachments : <a href="<?= base_url() . $articleData['artc_file_path'] ?>" target="_blank"><?= $articleData['artc_file_name'] ?></a>
                    </div>
            </article>
        <?php } ?>

    <?php if ($articleData['allow_comment'] == 'Y') { ?>
            <!-- Blog: Comments -->
            <section class="comments mt50">
                <div class="blog-comments">
                    <h2 class="lined-heading"><span><i class="fa fa-comments"></i>Comments</span></h2>
                </div>
                <!-- Comment 1 -->
        <?php if ($comment) {
            foreach ($comment as $index => $value) {
                ?>
                        <div class="comment"> 
                            <div class="avatar"> 
                                <!--<img src="images/blog/comment-01.jpg" alt="comment-01" class="img-circle"/>--> 
                            </div>
                            <div class="comment-text">

                                <div class="author">
                                    <div class="name"><?= $value['cmmn_name'] ?></div>
                                    <div class=""> 
                                        <button id="toggle_button_<?= $value['id'] ?>" type="button" data-toggle="dropdown" class="btn reply-button dropdown-toggle js-activated">Reply</button>
                                    </div>
                                    <div class="date"><?= date('M d, Y h:m:s', strtotime($value['cmmn_date'])) ?></div>

                                </div>
                                <div class="text">
                                    <p><?= $value['cmmn_desc'] ?></p>
                                </div>
                                <div id="reply_<?= $value['id'] ?>" class="reply row mt20" style="display:none;">
                                    <div class="col-sm-10 col-xs-10 meta" style="margin-bottom:5px"><input type="text" id="reply_name_<?= $value['id'] ?>" name="reply_name_<?= $value['id'] ?>" placeholder="name"></div>
                                    <div class="col-sm-10 col-xs-10 meta" style="margin-bottom:5px"><textarea id="reply_cntn_<?= $value['id'] ?>" name="reply_cntn_<?= $value['id'] ?>" rows="3" class="form-control"></textarea></div>
                                    <div class="col-sm-10 col-xs-10 meta" style="margin-bottom:5px">
                                        <button type="button" style="float:left;" onclick="javascript:save_reply('<?= base_url() ?>', 'article', '<?= $value['id'] ?>', this);" class="btn reply-button">Save</button>
                                    </div>


                                </div>
                            </div>
                            <?php
                            if ($reply) {
                                foreach ($reply as $indexReply => $valueReply) {
                                    if ($valueReply['reply_cmmn_id'] == $value['id']) {
                                        ?>
                                        <div class="reply-line"></div>
                                        <div class="reply">
                                            <div class="comment"> 
                                                <!--<a href="#"><div class="reply-button"> Reply </div></a>-->
                                                <div class="avatar"> <img src="images/blog/comment-02.jpg" alt="comment-02" class="img-circle"/> </div>
                                                <div class="comment-text">
                                                    <div class="author">
                                                        <div class="name"><?= $valueReply['reply_name'] ?></div>
                                                        <div class="date"><?php echo date('M d, Y h:i:s', strtotime($valueReply['reply_date'])) ?></div>
                                                    </div>
                                                    <div class="text">
                                                        <p><?= $valueReply['reply_cntn'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                            }
                        }
                    }
                    ?>

                    <!-- Comment 2(Reply) -->


                    <!-- Leave comment -->
                    <div class="mt50">
                        <h3><i class="fa fa-comment"></i> Leave a comment</h3>
                        <form id="comment_form" action="<?= base_url() ?>article/save_comment" method="post" class="mt30">
                            <div class="form-group">
                                <label for="email">Your Email address</label>
                                <span style="font-weight: bold;color:red;margin-left:10px;display:none" class="notification"></span>
                                <input type="email" required class="form-control" id="cmmn_email" name="cmmn_email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="name"><span class="required">*</span> Your Name</label>
                                <span style="font-weight: bold;color:red;margin-left:10px;display:none" class="notification"></span>
                                <input type="text" required class="form-control" id="cmmn_name" name="cmmn_name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="comment"><span class="required">*</span> Your comment</label>
                                <span style="font-weight: bold;color:red;margin-left:10px;display:none" class="notification"></span>
                                <textarea id="cmmn_desc" name="cmmn_desc" required rows="9" class="form-control"></textarea>
                            </div>
                            <input type="hidden" id="cmmn_artc_alias" name="cmmn_artc_alias" value="<?= $articleData['artc_alias'] ?>"/>
                            <button type="button" onclick="javascript:save_comment();"class="btn btn-default btn-lg">Post comment</button>
                        </form>
                    </div>

            </section> <?php } ?>
    </div>
<?php
}
if ($comment) {
    foreach ($comment as $index => $value) {
        ?>
        <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#toggle_button_' +<?= $value['id'] ?>).click(function() {
                                            $("#reply_" +<?= $value['id'] ?>).toggle();
                                        });
                                    });
        </script>
    <?php
    }
}?>
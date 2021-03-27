<script type="text/javascript" src="<?= base_url() ?>assets/application.js"></script>
<section id="page-content" class="sidebar-right" style="margin-top:125px;">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-md-9">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="<?=($article['artc_image_path'] != '') ? base_url().$article['artc_image_path']: 'assets/metronic/img/no_image.gif' ?>">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h2><?=$article['artc_name']?></h2>
                                <div class="post-meta">

                                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?=$article['artc_date']?></span>
                                    <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i><?=$article['cmmnCount']?> Comments</a></span>
                                    <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i><?= $article['artc_ctgr_name'] ?></a></span>
                                </div>
                                <?=$article['artc_desc']?>
                            </div>
				<?php if ($article['allow_comment'] == 'Y') { ?>
                            <!-- Comments -->
                            <div class="comments" id="comments">
                                <div class="comment_number">
                                    Comments <span>(<?=$totaldataComments?>)</span>
                                </div>
                                <div class="comment-list">
                                    <!-- Comment -->
                                    <?php if (isset($comments)) {
                                        if (sizeof($comments) > 0) {
                                            foreach($comments as $index => $value) {
                                            $value['cmmn_date']=date('d F Y', strtotime($value['cmmn_date']))?>
                                            <div class="comment" id="comment-2">
                                                <!--<div class="image"><img alt="" src="<?=base_url()?>assets/polo/images/blog/author2.jpg" class="avatar"></div>-->
                                                <div class="text">
                                                    <h5 class="commet-name"><?=$value['cmmn_name']?></h5>
                                                    <span class="comment_date">Posted at <?=$value['cmmn_date']?></span>
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                    <div class="text_holder">
                                                        <p><?=$value['cmmn_desc']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php }
                                        }
                                    }?>
                                    <!-- end: Comment -->
                                </div>
                            </div>
                            
                            <!-- end: Comments -->
                            <div class="respond-form" id="respond">
                                <div class="respond-comment">
                                    Leave a <span>Comment</span></div>
                                <form id="comment_form" action="<?= base_url() ?>blog/save_comment" method="post" class="form-gray-fields">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="upper" for="name">Name</label>
                                                <span style="font-weight: bold;color:red;margin-left:10px;display:none" class="notification"></span>
                                                <input class="form-control required" name="cmmn_name" placeholder="Enter name" id="cmmn_name" aria-required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="upper" for="email">Email</label>
                                                <span style="font-weight: bold;color:red;margin-left:10px;display:none" class="notification"></span>
                                                <input class="form-control required email" name="cmmn_email" placeholder="Enter email" id="cmmn_email" aria-required="true" type="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="upper" for="comment">Your comment</label>
                                                <span style="font-weight: bold;color:red;margin-left:10px;display:none" class="notification"></span>
                                                <textarea class="form-control required" name="cmmn_desc" rows="9" placeholder="Enter comment" id="cmmn_desc" aria-required="true"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group text-center">
                                                <input type="hidden" id="cmmn_artc_id" name="cmmn_artc_id" value="<?= $article['id'] ?>"/>
                                                <button class="btn" type="button" onclick="javascript:save_comment();">Submit Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>

            </div>
            <!-- end: content -->

            <!-- Sidebar-->
            <div class="sidebar col-md-3">
                <div class="sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <!--widget newsletter-->
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                        <div class="widget widget-newsletter">
                            <div class="input-group">
                                <input type="text" aria-required="true" name="q" class="form-control widget-search-form" placeholder="Search for page" style="width:75%">
                                <div class="input-group-append">
                                    <span class="input-group-btn">
                                        <button type="button" id="widget-widget-search-form-button" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                                </div> 
                            </div>
                        </div>
                    <!--end: widget newsletter-->

                    <!--Tabs with Posts-->
                        <div class="widget" style="border-bottom: 0px !important">                         
                            <div class="tabs">
                                <ul class="nav nav-tabs" id="tabs-posts" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="false">Recent</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tabs-posts-content">
                                    <div class="tab-pane show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                                        <div class="post-thumbnail-list">
                                            <?php if(isset($recentArticle)) {
                                                foreach($recentArticle as $index =>$value) {
                                                    $value['artc_date'] = date('d M Y', strtotime($value['artc_date']));?>
                                                    <div class="post-thumbnail-entry">
                                                        <img alt="" src="<?=($article['artc_image_path'] != '') ? base_url().$article['artc_image_path']: 'assets/metronic/img/no_image.gif' ?>">
                                                        <div class="post-thumbnail-content">
                                                            <a href="<?=base_url()?>blog/detail/<?=$value['id']?>"><?=$value['artc_name']?></a>
                                                            <span class="post-date-blog"><i class="fa fa-calendar-o"></i><?=$value['artc_date']?></span>
                                                            <span class="post-category"><i class="fa fa-tag"></i><?=$value['artc_ctgr_name']?></span>
                                                        </div>
                                                    </div>
                                            <?php }
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End: Tabs with Posts-->
                </div>
            </div>
            <!-- end: sidebar-->
        </div>
    </div>
</section>
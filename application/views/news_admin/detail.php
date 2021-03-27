<?php if ($newsList) {
        foreach ($newsList as $index => $value) {
            ?>
            <article> 
                <div class="row">
                    <div class="col-sm-11 col-xs-10 meta">
                        <h2 style="font-weight:bold"><a href="<?php echo base_url().$this->router->fetch_class().'/page/'.$value['news_alias']; ?>"><?= $value['news_title'] ?></a></h2>
                        <p><?=date("D M d", strtotime($value['news_date']))?></p>
                        <p class="intro"><?=$value['news_content'] ?></p>
                </div>
            </article>

        <?php }
    }
    ?>
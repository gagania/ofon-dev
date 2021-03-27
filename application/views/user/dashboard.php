<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <!-- /.widget-user-image -->
                    <h5 class="widget-user-username">Profile</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#"><i class="fa fa-phone"></i> Ofon id <span class="pull-right badge bg-orange"><?=(isset($cstmData) ? $cstmData['cid']:'')?></span></a></li>
                        <li><a href="#" style="margin-bottom:20px;"><i class="fa fa-home"></i> Alamat <span class="pull-right badge bg-orange col-md-8" style="white-space:unset !important"><?=(isset($cstmData) ? $cstmData['alamat']:'')?></span></a></li>
                        <li><a href="#"><i class="fa fa-mobile-phone"></i> No. Tlp <span class="pull-right badge bg-orange"><?=(isset($cstmData) ? $cstmData['notelp']:'')?></span></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Email <span class="pull-right badge bg-orange"><?=(isset($cstmData) ? $cstmData['email']:'')?></span></a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> Aktif Sejak <span class="pull-right badge bg-orange"><?=(isset($cstmData) ? date('d F Y',strtotime($cstmData['ctd'])):'')?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Informasi Layanan</h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Jenis Layanan <span class="pull-right"><?=(isset($cstmData) ? $cstmData['layanan']:'')?></span></a></li>
                        <li><a href="#">Tanggal Layanan Aktif <span class="pull-right badge bg-orange"><?=(isset($cstmData) ? date('d F Y',strtotime($cstmData['ctd'])):'')?></span></a></li>
                        <li><a href="#">Termin Kontrak <span class="pull-right badge bg-orange"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <!-- /.widget-user-image -->
                    <h5 class="widget-user-username">Rekap Pemakaian Telepon</h5>
                </div>
                <div class="box-footer no-padding">
                    <div class="box-body" style="">
                        <div class="row">
                            <div class="col-xs-6 col-md-3 text-center">
                                <div style="display:inline;width:90px;height:90px;">
                                    <input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgcolor="#3c8dbc" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px; -moz-appearance: none;"></div>

                                <div class="knob-label">Lokal</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-6 col-md-3 text-center">
                                <div style="display:inline;width:90px;height:90px;">
                                    <input type="text" class="knob" value="70" data-width="90" data-height="90" data-fgcolor="#f56954" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(245, 105, 84); padding: 0px; -moz-appearance: none;"></div>
                                <div class="knob-label">SLJJ</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-6 col-md-3 text-center">
                                <div style="display:inline;width:90px;height:90px;">
                                    <input type="text" class="knob" value="-80" data-min="-150" data-max="150" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; font: bold 18px Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -moz-appearance: none;"></div>
                                <div class="knob-label">SLI</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
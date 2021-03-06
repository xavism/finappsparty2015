<script>
    var all_data_temperatura = <?php echo json_encode($data['registres']);?>;
    var all_data_humitat = <?php echo json_encode($data['registres_humitat']);?>;
</script>
<div class="content">
    <!--<div class="content-title">
		<h1><?php echo $data['content-title']; ?></h1>
	</div>-->
    <div class="row">
        <div id="cocina_up" class="col-xs-12 col-sm-12 col-md-6">
            <div id="cocina" class="content-panel">
                <div class="content-panel-header">
                    <i class="fa fa-bed"></i> Dormitorio <span><i class="icon-ok text-right ok"></i></span>
                </div>
                <div class="content-panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-sm-6 col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <i class="wi wi-thermometer"></i> Temperatura
                                </div>
                                <div class="col-sm-12">
                                    <canvas id="cocina_temp" height="100" width="200"/>
                                </div>
                                <div class="col-sm-12">
                                    <?php echo intval($data['registres'][0]['valor']);?>
                                    ºC
                                </div>
                                <div class="col-sm-12" id="grafic_temp_cuina_cont">
                                    <canvas id="grafic_temp_cuina" width="450px" height="200px" class="no-display"/>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-6 col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <i class="fa fa-tint"></i> Humedad
                                </div>
                                <div class="col-sm-12">
                                    <canvas id="cocina_hum" height="100" width="200">
                                </div>
                                <div class="col-sm-12">
                                    <?php echo intval($data['registres_humitat'][0]['valor']);?>

                                </div>
                                <div class="col-sm-12" id="grafic_hum_cuina_cont">
                                    <canvas id="grafic_hum_cuina" width="450px" height="200px" class="no-display"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="content-panel">
                <div class="content-panel-header">
                    <i class="fa fa-bed"></i> Dormitorio
                </div>
                <div class="content-panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="wi wi-thermometer"></i> Temperatura</th>
                        </div>
                        <div class="col-sm-12">
                            <canvas id="dormitorio_temp" height="100" width="170">
                        </div>
                        <div class="col-sm-12">
                            24ºC
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="content-panel">
                <div class="content-panel-header">
                    <i class="fa fa-key"></i> Recibidor
                </div>
                <div class="content-panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fa fa-rss"></i> Movimiento</th>
                        </div>
                        <div class="col-sm-12">
                            <img src="<?php echo SITE_ROOT; ?>/public/img/Preloader_10.gif" height="100px" alt="">
                        </div>
                        <div class="col-sm-12">
                            Si
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


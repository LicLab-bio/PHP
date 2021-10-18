<?php include(__DIR__ . "/public/public.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
</head>
<body>
<?php include(__DIR__ . "/public/header.php") ?>
<style>
    #accordion .panel-heading {
        padding: 0;
        border: none;
        border-radius: 0;
        position: relative;
    }

    #accordion .panel-title a {
        display: block;
        padding: 15px 20px;
        margin: 0;
        background: #fe7725;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: 1px;
        color: #fff;
        border-radius: 0;
        position: relative;
    }

    #accordion .panel-title a.collapsed {
        background: #1c2336;
    }

    #accordion .panel-title a:before,
    #accordion .panel-title a.collapsed:before {
        content: "\f068";
        font-family: fontawesome;
        width: 30px;
        height: 30px;
        line-height: 25px;
        border-radius: 50%;
        background: #fe7725;
        font-size: 14px;
        font-weight: normal;
        color: #fff;
        text-align: center;
        border: 3px solid #fff;
        position: absolute;
        top: 10px;
        right: 14px;
    }

    #accordion .panel-title a.collapsed:before {
        content: "\f067";
        background: #ababab;
        border: 4px solid #626262;
    }

    #accordion .panel-title a:after,
    #accordion .panel-title a.collapsed:after {
        content: "";
        width: 17px;
        height: 7px;
        background: #fff;
        position: absolute;
        top: 22px;
        right: 0;
    }

    #accordion .panel-body {
        border-left: 3px solid #fe7725;
        border-top: none;
        background: #fff;
        font-size: 15px;
        color: #1c2336;
        line-height: 27px;
        position: relative;
    }

    #accordion .panel-body:before {
        content: "";
        height: 3px;
        width: 100%;
        background: #fe7725;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #80bdff;
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
    }

    .select2-container--default .select2-selection--multiple {
        border-radius: 1px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        border: none;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        border-right: none;
    }

    .container .btn {
        width: auto;
        margin-top: 5px;
    }

    /*  input */
    .radio input[type="radio"],
    .radio-inline input[type="radio"],
    .checkbox input[type="checkbox"],
    .checkbox-inline input[type="checkbox"] {
        position: relative;
        float: left;
        margin-left: -20px;
    }

    .radio + .radio,
    .checkbox + .checkbox {
        margin-top: -5px
    }

    .radio-inline,
    .checkbox-inline {
        display: inline-block;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: normal;
        vertical-align: middle;
        cursor: pointer
    }

    .form-control {
        width: 100%;
        height: 35px;
    }

    span > b {
        padding: 0 5px;
    }

</style>


<div class="container" style="min-height: 1000px;">
    <div class="row">
        <div class="col-xs-12 col-lg-12">
            <div class="pull-right"><i class="ri-map-pin-line"></i>Analysis / <b class="navigator">Pathway enrichment
                    analysis</b></div>
        </div>
    </div>
    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>
                <i class="ri-briefcase-4-line"></i> Enrichment analysis of the pathway related to the genes regulated by
                core TF in CRC
            </h3>
        </div>
        <div class="panel-body">
            <div class="row" style="display: flex">
                <div class="col-lg-6">
                    <div class="box box-color-1">
                        <form action="analysis/Pathway_enrichment_analysis_of_genes_result.php" target="_blank"
                              id="form_"
                              method="post">
                            <caption><b>Databases Select All</b> <input type="checkbox" checked="checked" id="all">
                            </caption>
                            <table class="table table-bordered">
                                <tbody id="list">
                                <tr style="text-align: start;">
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="KEGG"
                                                                              checked="checked">KEGG
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="NetPath"
                                                                              checked="checked">NetPath
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="Reactome"
                                                                              checked="checked">Reactome
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="WikiPathways"
                                                                              checked="checked">WikiPathways
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="PANTHER"
                                                                              checked="checked">PANTHER
                                        </label></td>
                                </tr>
                                <tr style="text-align: start;">
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="PID"
                                                                              checked="checked">PID
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="HumanCyc"
                                                                              checked="checked">HumanCyc
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="CTD"
                                                                              checked="checked">CTD
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="SMPDB"
                                                                              checked="checked">SMPDB
                                        </label></td>
                                    <td><label class="checkbox-inline"><input type="checkbox" name="databases[]"
                                                                              value="INOH"
                                                                              checked="checked">INOH
                                        </label></td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <div>
                                <label>Tissue Type</label>
                                <div id="tissue_type"></div>
                                <label>Cell Type</label>
                                <div id="cell_type"></div>
                                <label>TF name</label>
                                <div id="TF_name"
                                     onclick="$('#file_check').prop('checked',false);$('#file_').val('');"></div>
                            </div>
                            <label>Type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="Gene">Gene</option>
                                <option value="LncRNA">LncRNA</option>
                                <option value="miRNA">miRNA</option>
                            </select>
                            <script>
                                window.tis_type = new reinput({
                                    name: "tis_type",
                                    target: "#tissue_type",
                                    ajax: {
                                        url: "/<?php echo $web_title?>/analysis/analysis_tissue_server.php",
                                    },
                                    api: {
                                        change: function (e) {
                                            var cel_type = document.getElementsByName('cel_type')[0];
                                            var tf_name = document.getElementsByName('tf_name')[0];
                                            window.cel_type.updateAjax({
                                                'tis_type': e.value,
                                                'tf_name': tf_name.value
                                            });
                                            window.tf_name.updateAjax({
                                                'tis_type': e.value,
                                                'cel_type': cel_type.value
                                            });
                                        }
                                    }
                                });
                            </script>
                            <script>
                                window.cel_type = new reinput({
                                    name: "cel_type",
                                    target: "#cell_type",
                                    ajax: {
                                        url: "/<?php echo $web_title?>/analysis/analysis_cell_server.php",
                                    },
                                    api: {
                                        change: function (e) {
                                            var tis_type = document.getElementsByName('tis_type')[0];
                                            var tf_name = document.getElementsByName('tf_name')[0];
                                            window.tis_type.updateAjax({
                                                'cel_type': e.value,
                                                'tf_name': tf_name.value,
                                            });
                                            window.tf_name.updateAjax({
                                                'cel_type': e.value,
                                                'tis_type': tis_type.value,
                                            });
                                        }
                                    }
                                });
                            </script>
                            <script>
                                window.tf_name = new reinput({
                                    name: "tf_name",
                                    target: "#TF_name",
                                    ajax: {
                                        url: "/<?php echo $web_title?>/analysis/analysis_tf_server.php",
                                    },
                                    api: {
                                        change: function (e) {
                                            var cel_type = document.getElementsByName('cel_type')[0];
                                            var tf_name = document.getElementsByName('tf_name')[0];
                                            window.cel_type.updateAjax({
                                                'tf_name': e.value,
                                                'tis_type': tis_type.value,
                                            });
                                            window.tis_type.updateAjax({
                                                'tf_name': e.value,
                                                'cel_type': cel_type.value,
                                            });
                                        }
                                    }
                                });
                            </script>
                            <!--<input type="radio" style="display:inline-block;position: relative;top: 1px;;pointer-events: none" id="file_check"> <b>upload a file:</b> <input type="file" style="display:inline-block;position: relative;top: 1px;" id="file_">
                        <button type="button" class="btn btn-info btn-sm"><span><b><a href="/<?php /*echo $web_title */ ?>/public/example/genes-example" download="genes-example" style="color: rgb(255, 255, 255);">Example of Upload File</a></b></span></button>
                        <br>-->
                            <h5><b>Threshold:</b></h5>
                            <div class="input-group">
                                <input class="form-control" name="Threshold" id="Threshold" value="0.05">
                                <div class="input-group-addon">
                                    <input type="checkbox" name="adjust" checked="checked">
                                    <span><b>FDR Adjust</b> <span
                                                title="False discovery rate (FDR) : the corrected p-value."
                                                class="glyphicon glyphicon-question-sign"></span></span>
                                </div>
                            </div>
                            <h5><b>GeneNumber:</b></h5>
                            <div class="input-group">
                                <span class="input-group-addon"><b>min-count</b></span>
                                <input class="form-control" name="min" id="min" value="10">
                                <span class="input-group-addon"><b>max-count</b></span>
                                <input class="form-control" name="max" id="max" value="500">
                            </div>
                            <br>

                            <button type="button" id="submit_" class="btn btn-primary">Submit</button>
                            <button type="reset" onclick="window.tf_name.updateAjax({});
                                                    window.cel_type.updateAjax({});
                                                    window.tis_type.updateAjax({});" class="btn btn-primary">Reset
                            </button>
                            <button type="reset"
                                    onclick="setTimeout(function() {
                                    $('#fdr').val(0.05);
                                    $('#all').prop('checked', true);
                                    $('#list :checkbox').prop('checked', true);
                                    $('#Threshold').val(0.05);
                                    $('#tis_type_ipt').val('Breast tissuee');
                                    $('#cel_type_ipt').val('Cancer cell');
                                    $('#tf_name_ipt').val('ZEB1')
                                },100)"
                                    class="btn btn-primary">Example
                            </button>
                        </form>
                    </div>
                    <script>
                        $('#file_check').prop('checked', false);
                        $("#file_").click(function () {
                            $("#tf_name_ipt").val("");
                            $('#file_check').prop('checked', true);
                        });
                        $("#submit_").click(function () {
                            var checked = 0;
                            $("#list :checkbox").each(function (i, e) {
                                if (e.checked == true) checked++;
                            });
                            if (checked == 0) {
                                alert("Please select some databases!");
                                return;
                            }
                            try {
                                let reader = new FileReader();
                                reader.readAsText(document.getElementById("file_").files[0], 'UTF-8');
                                setTimeout(function () {
                                    value = reader.result;
                                    $("#tf_name_ipt").val(value);
                                    if ($("#tf_name_ipt").val().trim() == "") {
                                        alert("Please input some Genes!");
                                        return;
                                    }
                                    document.getElementById("form_").submit();
                                }, 500);
                            } catch (e) {
                                if ($("#tf_name_ipt").val().trim() == "") {
                                    alert("Please input some Genes!");
                                    return;
                                }
                                document.getElementById("form_").submit();
                            }
                        });
                    </script>
                </div>
                <div class="col-lg-6" style="display: flex">
                    <div class="box box-color-2">
                        <img src="public/img/analysis/Pathway_enrichment_analysis/Pathway.svg" style="justify-content: center;align-items:center;"
                             width="100%" class="img-rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-color-1">
                <div class="row">
                    <div class="col-lg-12">
                        <h4><b>Function introductione:</b></h4>
                        <p>If users input an TF (gene symbol), <?php echo $web_title ?> will identify the genes
                            regulated by
                            core TF in CRC.</p>
                    </div>
                    <div class="col-lg-6">
                        <p><b style="color: red">1) Databases:</b> Select at least one database of pathways.</p>
                        <p><b style="color: red">2) TF name:</b> Input a TF (gene symbol).</p>
                    </div>
                    <div class="col-lg-6">

                        <p><b style="color: red">3) Threshold:</b> Set P-Value and FDR thresholds.</p>
                        <p><b style="color: red">4) GeneNumber:</b> Limit the number range of genes in pathways.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "/var/www/html/$web_title/public/footer.php" ?>
<script>
    $(function () {
        $("#all").click(function () {
            if (this.checked) {
                $("#list :checkbox").prop("checked", true);
            } else {
                $("#list :checkbox").prop("checked", false);
            }
        });
    });
</script>
</body>
</html>

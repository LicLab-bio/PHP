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
        width: 93px;
        margin-top: 5px;
    }

    /*  input */

    input.form-control {
        /* width: auto; */
        width: 100%;
        height: 35px;
    }

    select.form-control {
        width: 100%;
        height: 35px;
    }

</style>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-12">
            <div class="pull-right"><i class="ri-map-pin-line"></i><b class="navigator"> Analysis</b></div>
        </div>
    </div>
    <br>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><i class="ri-briefcase-4-line"></i>Analysis of TFs related to CRC</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form method="get" enctype="multipart/form-data" target="_blank"
                                      action="analysis/tf_detail.php" id="form_">

                                    <label>Tissue Type</label>
                                    <div id="tissue_type"></div>
                                    <!--<label>Cell Type</label>-->
                                    <div hidden id="cell_type"></div>
                                    <label>TF name</label>
                                    <div id="TF_name"
                                         onclick="$('#file_check').prop('checked',false);$('#file_').val('');"></div>

                                    <script>
                                        window.tis_type = new reinput({
                                            name: "tis_type",
                                            target: "#tissue_type",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/analysis/analysis_tissue_server.php",
                                                //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
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
                                    <div align="left">
                                        <button type="button" class="btn btn-primary" id="submit_">Submit</button>
                                        <button type="button" onclick="claertext();
                                                    window.tf_name.updateAjax({});
                                                    window.cel_type.updateAjax({});
                                                    window.tis_type.updateAjax({});" class="btn btn-primary">Reset
                                        </button>
                                        <a ONCLICK="search_gene_select()" class="btn btn-primary">Example</a><br/>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            $('#file_check').prop('checked', false);
                            $("#file_").click(function () {
                                $("#tf_name_ipt").val("");
                                $('#file_check').prop('checked', true);
                            });
                            $("#submit_").click(function () {
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
                        <script type="text/javascript">
                            function claertext() {
                                document.getElementsByName('tis_type')[0].value = "";
                                document.getElementsByName('cel_type')[0].value = "";
                                document.getElementsByName('tf_name')[0].value = "";
                            }

                            function search_gene_select() {
                                document.getElementsByName('tis_type')[0].value = "Brain";
                                document.getElementsByName('cel_type')[0].value = "";
                                document.getElementsByName('tf_name')[0].value = "GATA3";
                            }
                        </script>
                        <div class="col-lg-6" style="font-size: 110%;text-align: justify;">
                            <div class="box box-color-2">
                                <p><font color="red">Function introduction:</font><br>
                                    In the TF-based query, users can query a TF of interest, and then CRCdb will return
                                    all CRCs that match the TF–CRC relationship, and distribution of TFs for all
                                    samples.
                                </p>
                                <p><font color="red">Parameter explanation:</font><br>
                                    Query method one:<br>
                                    Select TF name: Click the TF of interest.<br>

                                    Query method two:<br>
                                    Input your gene: Enter the gene of interest.
                                </p>
                                <p><font color="red">Explanation of example:</font><br>
                                    FOXO3 gene likely functions as a trigger for apoptosis through expression of genes
                                    necessary for cell death.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "/var/www/html/$web_title/public/footer.php" ?>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>
</html>
























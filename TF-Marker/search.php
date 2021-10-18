<?php include (__DIR__."/public/public.php");
ini_set("error_reporting", "E_ALL & ~E_NOTICE");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_title ?></title>
</head>
<style type="text/css">
    .tab-pane{
        min-height: 400px;
    }
    .ri-question-line {
        position: relative;
        top: 4px;
    }
    /* style.css | http://www.licpathway.net/$main/public/css/style.css */

    select.form-control {
        /* width: auto; */
        width: 100%;
        height: 35px;
    }
    input.form-control {
        /* width: auto; */
        width: 100%;
        height: 35px;
    }
    #accordion .panel-heading{
        padding: 0;
        border: none;
        border-radius: 0;
        position: relative;
    }
    #accordion .panel-title a{
        display: block;
        padding: 15px 20px;
        margin: 0;
        background: #666666;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: 1px;
        color: #fff;
        border-radius: 0;
        position: relative;
    }
    #accordion .panel-title a.collapsed{
        background: #1c2336;}
    #accordion .panel-title a:before,
    #accordion .panel-title a.collapsed:before{
        content: "\f068";
        font-family: fontawesome;
        width: 30px;
        height: 30px;
        line-height: 25px;
        border-radius: 50%;
        background: #666666;
        font-size: 14px;
        font-weight: normal;
        color: #fff;
        text-align: center;
        border: 3px solid #fff;
        position: absolute;
        top: 10px;
        right: 14px;
    }
    #accordion .panel-title a.collapsed:before{
        content: "\f067";
        background: #ababab;
        border: 4px solid #626262;
    }
    #accordion .panel-title a:after,
    #accordion .panel-title a.collapsed:after{
        content: "";
        width: 17px;
        height: 7px;
        background: #fff;
        position: absolute;
        top: 22px;
        right: 0;
    }

    #accordion .panel-body{
        border-left: 3px solid #666666;
        border-top: none;
        background: #fff;
        font-size: 15px;
        color: #1c2336;
        line-height: 27px;
        position: relative;
    }
    #accordion .panel-body:before{
        content: "";
        height: 3px;
        width: 100%;
        background: #666666;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .modal-dialog {
        /* width: 600px; */
        width: 80%;
    }


</style>
<script type="text/javascript">
    function mycheck()
    {
        if(document.getElementById("radio_text").checked && document.getElementById('input').value.length==0)
        {
            alert("Please Enter Gene");

            window.event.returnValue=false;
        }



    }



    function forexmple()
    {
        document.getElementById('input').value ='COL10A1\r\n'+
            'TFF1\r\n'+
            'RP11-40C6.2\r\n'+
            'MMP11\r\n'+
            'COL11A1\r\n'+
            'AP000349.2\r\n'+
            'UBE2C\r\n'+
            'RP5-940J5.9\r\n'+
            'AGR3\r\n'+
            'S100P\r\n'+
            'AGR2\r\n'+
            'CST1\r\n'+
            'MTND4P12\r\n'+
            'KIAA0101\r\n'+
            'TOP2A\r\n'+
            'CENPF\r\n'+
            'RRM2\r\n'+
            'LRRC15\r\n'+
            'NEK2\r\n'+
            'AP003391.1\r\n'+
            'IGHG4\r\n'+
            'NAT1\r\n'+
            'MYBL2\r\n'+
            'TPX2\r\n'+
            'PITX1\r\n'+
            'PKMYT1\r\n'+
            'BIRC5\r\n'+
            'MISP\r\n'+
            'COMP\r\n'+
            'GJB2\r\n'+
            'CXCL10\r\n'+
            'CDC20\r\n'+
            'HSPB1P1\r\n'+
            'S100A14\r\n'+
            'TNNT1\r\n'+
            'UBE2T\r\n'+
            'PTTG1\r\n'+
            'TK1\r\n'+
            'RP11-667K14.4\r\n'+
            'NUSAP1\r\n'+
            'MMP9\r\n'+
            'GPRC5A\r\n'+
            'ASF1B\r\n'+
            'CCNB2\r\n'+
            'CEACAM6\r\n'+
            'ZACN\r\n'+
            'SLC44A4\r\n'+
            'MKI67\r\n'+
            'HMGN1P37\r\n'+
            'EEF1A2\r\n'+
            'TUBB3\r\n'+
            'U91328.1\r\n'+
            'ZWINT\r\n'+
            'CKS2\r\n'+
            'NKAIN1\r\n'+
            'AC093850.2\r\n'+
            'KIF20A\r\n'+
            'UHRF1\r\n'+
            'FN1\r\n'+
            'CCNB1\r\n'+
            'IGHGP\r\n'+
            'RNU4-1\r\n'+
            'RP11-316M1.12\r\n'+
            'FOXA1\r\n'+
            'PYCR1\r\n'+
            'PPAPDC1A\r\n'+
            'EIF5AP4\r\n'+
            'HOXC10\r\n'+
            'FOXM1\r\n'+
            'INHBA\r\n'+
            'C15orf48\r\n'+
            'CYP2B7P\r\n'+
            'EPCAM\r\n'+
            'AC066694.1\r\n'+
            'PBK\r\n'+
            'HN1\r\n'+
            'LMNB1\r\n'+
            'COL1A1\r\n'+
            'CDK1\r\n'+
            'PRR15\r\n'+
            'IGHG1\r\n'+
            'ANLN\r\n'+
            'UBE2SP2\r\n'+
            'CEP55\r\n'+
            'MELK\r\n'+
            'AURKA\r\n'+
            'NUF2\r\n'+
            'CXCL9\r\n'+
            'MAL2\r\n'+
            'DEGS2\r\n'+
            'KIF4A\r\n'+
            'TROAP\r\n'+
            'KIFC1\r\n'+
            'CRABP2\r\n'+
            'TFF3\r\n'+
            'TSPAN1\r\n'+
            'AC239868.2\r\n'+
            'MMP13\r\n'+
            'AC239868.3\r\n'+
            'TPD52\r\n'+
            'LAMP5\r\n'+
            'SDC1\r\n'+
            'CDCA5\r\n'+
            'AURKB\r\n'+
            'IGHG3\r\n'+
            'CDKN3\r\n'+
            'DTL\r\n'+
            'CACNG4\r\n'+
            'BUB1\r\n'+
            'FAM111B\r\n'+
            'PAFAH1B3\r\n'+
            'PLK1\r\n'+
            'RMI2\r\n'+
            'ESR1\r\n'+
            'POSTN\r\n'+
            'KIF2C\r\n'+
            'SMIM22\r\n'+
            'KIF11\r\n'+
            'ANXA9\r\n'+
            'CTD-2224J9.4\r\n'+
            'CRIP1\r\n'+
            'IFI6\r\n'+
            'CXCL13\r\n'+
            'DLGAP5\r\n'+
            'HMMR\r\n'+
            'IQGAP3\r\n'+
            'ZG16B\r\n'+
            'CENPM\r\n'+
            'HIST1H2BD\r\n'+
            'CTXN1\r\n'+
            'RP11-498C9.13\r\n'+
            'HMGN1P36\r\n'+
            'STARD10\r\n'+
            'CDC6\r\n'+
            'DLEU2_6\r\n'+
            'HMGB3\r\n'+
            'RP11-649E7.5\r\n'+
            'CDCA8\r\n'+
            'NDC80\r\n'+
            'MUC1\r\n'+
            'RP11-70C1.3\r\n'+
            'RNU1-106P\r\n'+
            'ZMYND10\r\n'+
            'SPP1\r\n'+
            'CDCA3\r\n'+
            'GATA3\r\n'+
            'NCAPG\r\n'+
            'NCAPH\r\n'+
            'ASPM\r\n'+
            'FAM83D\r\n'+
            'CENPU\r\n'+
            'HNRNPCP2\r\n'+
            'EXO1\r\n'+
            'SLC39A6\r\n'+
            'SUSD3\r\n'+
            'APOBEC3B\r\n'+
            'ISG15\r\n'+
            'GRP\r\n'+
            'FNDC1\r\n'+
            'HOXC13\r\n'+
            'TTC39A\r\n'+
            'KPNA2\r\n'+
            'SPC25\r\n'+
            'AC005943.6\r\n'+
            'PAQR4\r\n'+
            'PKIB\r\n'+
            'HJURP\r\n'+
            'PRC1\r\n'+
            'SQLE\r\n'+
            'COL3A1\r\n'+
            'UBD\r\n'+
            'CXCL11\r\n'+
            'FAM83H-AS1\r\n'+
            'CCDC64\r\n'+
            'CFB\r\n'+
            'MAD2L1\r\n'+
            'HIST1H4H\r\n'+
            'CTHRC1\r\n'+
            'FCGR1A\r\n'+
            'RET\r\n'+
            'GALNT6\r\n'+
            'SLC9A3R1\r\n'+
            'BUB1B\r\n'+
            'SBK1\r\n'+
            'PRSS8\r\n'+
            'PPIAP22\r\n'+
            'RAD51\r\n'+
            'OLR1\r\n'+
            'CA12\r\n'+
            'WISP1\r\n'+
            'TYMS\r\n'+
            'TMEM132A\r\n'+
            'KIF23\r\n'+
            'AP1M2\r\n'+
            'RAB25\r\n'+
            'BCAS4\r\n'+
            'KRT18\r\n'+
            'SDS\r\n'+
            'ASPN\r\n'+
            'MXRA5\r\n'+
            'RACGAP1\r\n'+
            'CDC45\r\n'+
            'HIST1H3H\r\n'+
            'ARAP1-AS1\r\n'+
            'SORD2P\r\n'+
            'TLCD1\r\n'+
            'SRP9P1\r\n'+
            'FAM64A\r\n'+
            'METRN\r\n'+
            'CENPA\r\n'+
            'HPN\r\n'+
            'MMP1\r\n'+
            'SPDEF\r\n'+
            'BGN\r\n'+
            'APOC4-APOC2\r\n'+
            'NUP210\r\n'+
            'ESRP1\r\n'+
            'ESM1\r\n'+
            'SORD\r\n'+
            'RP11-10G12.1\r\n'+
            'SPC24\r\n'+
            'EPN3\r\n'+
            'CCNA2\r\n'+
            'RP11-386G11.10\r\n'+
            'GINS1\r\n'+
            'UBE2S\r\n'+
            'TRIP13\r\n'+
            'F12\r\n'+
            'RP11-161H23.5\r\n'+
            'PRLR\r\n'+
            'EZR\r\n'+
            'C19orf33\r\n'+
            'CELSR1\r\n'+
            'KRT8\r\n'+
            'AKR7A3\r\n'+
            'CDT1\r\n'+
            'E2F1\r\n'+
            'DBNDD1\r\n'+
            'TTK\r\n'+
            'CD24\r\n'+
            'APOC2\r\n'+
            'C9orf116\r\n'+
            'HN1L\r\n'+
            'HIST1H2BK\r\n'+
            'MCM4\r\n'+
            'SPAG5\r\n'+
            'FAM83H\r\n'+
            'RP11-442H21.2\r\n';


    }

</script>
<body>
<?php include (__DIR__."/public/header.php") ?>
<div class="container" id="body">
    <div class="row">
        <div class="col-xs-12 col-lg-12">
            <div class="pull-right"><i class="ri-map-pin-line"></i> <b class="navigator">Search</b></div>
        </div>
    </div>
    <hr>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching by Tissue and Cell Type
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form action="search/search_by_tis_cel.php" target="_blank" method="get" enctype="multipart/form-data" id="form_search_by_tis_cel">
                                    <div class="form-group" style="display: none">
                                        <label>Gene Type</label>
                                        <div id="Gene_type_1"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tissue Type</label>
                                        <div id="tissue_type"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cell Type</label>
                                        <div id="cell_type"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cell Name</label>
                                        <div id="cell_name"></div>
                                    </div>
                                    <div>
                                        <button type="button" onclick="search_detail('search_by_tis_cel.php')" class="btn btn-primary">Start search</button>
                                        <button  type="Reset" onclick="window.tis_type.reset(search_tissue_cell);
                                        window.cel_type.reset(search_tissue_cell);" class="btn btn-primary">Reset</button>
                                        <a onclick="search_1()" class="btn btn-primary">For example</a><br>
                                    </div>
                                    <script>
                                        function search_1() {
                                            window.cel_name.val("Stem cell",search_tissue_cell);
                                            window.cel_type.val("Cancer cell",search_tissue_cell);
                                        }
                                    </script>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box box-color-2">
                                <div style="font-size: 120%;">
                                    <font color="#418679" size="5"><strong>Option explanation:</strong></font>
                                    <br/><font color="#418679"><strong>1) Tissue Type: </strong></font>Select or input Gene Type.
                                    <br/><font color="#418679"><strong>2) Cell Type:  </strong></font>Select or input Cell Type.
                                    <br/><font color="#418679"><strong>3) Cell Name:  </strong></font>Select or input Cell Name.
                                </div>
                                <img src="public/img/search/tissue_cell.svg" class="img-responsive img-rounded">
                            </div>
                        </div>
                        <script>
                            window.tis_type = new reinput({
                                name: "tis_type",
                                target: "#tissue_type",
                                ajax: {
                                    url: "/<?php echo $web_title?>/search/search_cell_tissue_server.php?input_sel=TissueType",
                                    //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                },
                                api: {
                                    change: function () {
                                        window.tis_type.change(search_tissue_cell)
                                    }
                                }
                            });
                        </script>
                        <script>
                            window.cel_type = new reinput({
                                name: "cel_type",
                                target: "#cell_type",
                                ajax: {
                                    url: "/<?php echo $web_title?>/search/search_cell_tissue_server.php?input_sel=CellType",
                                },
                                api: {
                                    change: function () {
                                        window.cel_type.change(search_tissue_cell)
                                    }
                                }
                            });
                        </script>
                        <script>
                            window.cel_name = new reinput({
                                name: "cel_name",
                                target: "#cell_name",
                                ajax: {
                                    url: "/<?php echo $web_title?>/search/search_cell_tissue_server.php?input_sel=CellName",
                                },
                                api: {
                                    change: function () {
                                        window.cel_name.change(search_tissue_cell)
                                    }
                                }
                            });
                            var search_tissue_cell = [window.cel_type,window.tis_type,window.cel_name]
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"  aria-controls="collapseTwo">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching by Gene
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form action="search/search_by_Marker.php" method="get" target="_blank" id="form_search_by_Marker">
                                    <label>Gene Type</label>
                                    <br>
                                    <div id="gene_type"></div>

                                    <label>Paste a gene symbol list:</label><br>
                                    <textarea class="form-control" rows="8"  id="input" style="width:100%" name="input" spellcheck="false" placeholder="Please enter a list of genes!"></textarea>

                                    <script>
                                        $("#input").val("")
                                    </script>

                                    <br>
                                    <br>
                                    <div>
                                        <button type="button" onclick="search_detail('search_by_Marker.php')" class="btn btn-primary">Start search</button>
                                        <button type="Reset" onclick="window.search_gene_type.reset(search_gene);
                                                                    window.search_gene_name.reset(search_gene);" class="btn btn-primary">Reset</button>
                                        <a onclick="return forexmple()" ;="" class="btn btn-primary">For example</a><br>
                                    </div>
                                </form>
                                <br>
                                <script>
                                    window.search_gene_type = new reinput({
                                        name: "gene_type",
                                        target: "#gene_type",
                                        ajax: {
                                            url: "/<?php echo $web_title?>/search/search_gene_server.php?input_sel=GeneType"
                                        },
                                        api: {
                                            change: function () {
                                                window.search_gene_type.change(search_gene)
                                            }
                                        }
                                    });
                                  

                                    var search_gene = [window.search_gene_name,window.search_gene_type]
                                </script>
                                <script>
                                    var gene_type = "<?php echo $_GET["gene_type"]?>";
                                    if(gene_type) {
                                        $("#headingTwo a").click();
                                        setTimeout(function () {
                                            window.search_gene_type.val(gene_type,search_gene)
                                        },1000)
                                    }
                                    function search_2(){
                                        window.search_gene_name.val("FOXO1",search_gene)
                                        window.search_gene_type.val("TF",search_gene)
                                    }
                                </script>
                            </div>
                        </div>
                        <div  class="col-lg-6">
                            <div class="box box-color-2">
                                <div style="font-size: 120%;">
                                    <font color="#418679" size="5"><strong>Option explanation:</strong></font>
                                    <br/><font color="#418679"><strong>1) Gene Type:  </strong></font>Select or input the Type of Gene.
                                    <br/><font color="#418679"><strong>2) Gene Name: </strong></font>Select or input the Gene.
                                </div>
                                <img src="public/img/search/genetype.svg" class="img-responsive img-rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"  aria-controls="collapseThree">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching by TFs related to Core transcriptional Regulatory Circuit
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form method="get"  target="_blank" action="search/tf_detail.php" id="form_tf_detail" enctype="multipart/form-data">

                                    <label>Tissue Type</label>
                                    <div id="tissue_type_two"></div>
                                    <!--<label>Cell Type</label>-->
                                    <div hidden id="cell_type_two"></div>
                                    <label>TF name</label>
                                    <div id="TF_name"
                                         onclick="$('#file_check').prop('checked',false);$('#file_').val('');"></div>

                                    <script>
                                        window.tis_type_two = new reinput({
                                            name: "tis_type_two",
                                            target: "#tissue_type_two",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_tf_crc_server.php?input_sel=TissueType",
                                                //data: {'sel': 'gwas_catalog_2019_hg19_ucsc'}
                                            },
                                            api: {
                                                change: function () {
                                                    window.tis_type_two.change(search_TFs)
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        window.cel_type_two = new reinput({
                                            name: "cel_type_two",
                                            target: "#cell_type_two",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_tf_crc_server.php?input_sel=CellType",
                                            },
                                            api: {
                                                change: function () {
                                                    window.cel_type_two.change(search_TFs)
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        window.tf_name = new reinput({
                                            name: "tf_name",
                                            target: "#TF_name",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/search_tf_crc_server.php?input_sel=GeneName",
                                            },
                                            api: {
                                                change: function () {
                                                    window.tf_name.change(search_TFs)
                                                }
                                            }
                                        });
                                        var search_TFs = [window.tis_type_two,window.cel_type_two,window.tf_name]
                                    </script>
                                    <br>
                                    <div>
                                        <button type="button" class="btn btn-primary" id="submit_1">Start search</button>
                                        <button type="button" onclick="
                                                window.tf_name.reset(search_TFs);
                                                window.cel_type_two.reset(search_TFs);
                                                window.tis_type_two.reset(search_TFs);" class="btn btn-primary">Reset
                                        </button>
                                        <a ONCLICK="search_gene_select()" class="btn btn-primary">For example</a><br/>
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
                            $("#submit_1").click(function () {
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
                                    }, 500);
                                    document.getElementById("form_tf_detail").submit();
                                } catch (e) {
                                    if ($("#tf_name_ipt").val().trim() == "") {
                                        alert("Please input some Genes!");
                                        return;
                                    }
                                    document.getElementById("form_tf_detail").submit();
                                }
                            });
                        </script>
                        <script type="text/javascript">

                            function search_gene_select() {
                                window.tis_type_two.val("Lung",search_TFs);
                                window.cel_type_two.val("",search_TFs);
                                window.tf_name.val("FOXO3",search_TFs);
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
                                    Search method one:<br>
                                    Select TF name: Click the TF of interest.<br>

                                    Search method two:<br>
                                    Input your gene: Enter the gene of interest.
                                </p>
                                <p><font color="red">Explanation of example:</font><br>
                                    FOXO3 gene likely functions as a trigger for apoptosis through expression of genes
                                    necessary for cell death.
                                </p>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('.js-example-basic-multiple').select2();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default hidden">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"  aria-controls="collapseFour">
                        <span class="glyphicon glyphicon-search"></span>
                        Searching the genes both regulated by the Core TF in the CRC and pathway
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box box-color-1">
                                <form action="search/Pathway_enrichment_analysis_of_genes_result.php" target="_blank" id="form_Pathway_enrichment_analysis_of_genes_result" method="get" enctype="multipart/form-data">
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
                                        <div id="tissue_type_three"></div>
                                        <label>Cell Type</label>
                                        <div id="cell_type_three"></div>
                                        <label>TF name</label>
                                        <div id="TF_name_three"
                                             onclick="$('#file_check').prop('checked',false);$('#file_').val('');"></div>
                                    </div>
                                    <label>Type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="Gene">Gene</option>
                                        <option value="LncRNA">LncRNA</option>
                                    </select>
                                    <script>
                                        window.tis_type_three = new reinput({
                                            name: "tis_type_three",
                                            target: "#tissue_type_three",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/enrichment_server.php?input_sel=TissueType",
                                            },
                                            api: {
                                                change: function () {
                                                    window.tis_type_three.change(search_pathway)
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        window.cel_type_three = new reinput({
                                            name: "cel_type_three",
                                            target: "#cell_type_three",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/enrichment_server.php?input_sel=CellType",
                                            },
                                            api: {
                                                change: function () {
                                                    window.cel_type_three.change(search_pathway)
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        window.tf_name_three = new reinput({
                                            name: "tf_name_three",
                                            target: "#TF_name_three",
                                            ajax: {
                                                url: "/<?php echo $web_title?>/search/enrichment_server.php?input_sel=GeneName",
                                            },
                                            api: {
                                                change: function () {
                                                    window.tf_name_three.change(search_pathway)
                                                }
                                            }
                                        });

                                        var search_pathway = [window.tis_type_three,window.cel_type_three,window.tf_name_three]
                                    </script>
                                    <!--<input type="radio" style="display:inline-block;position: relative;top: 1px;;pointer-events: none" id="file_check"> <b>upload a file:</b> <input type="file" style="display:inline-block;position: relative;top: 1px;" id="file_">
                        <button type="button" class="btn btn-info btn-sm"><span><b><a href="/<?php /*echo $web_title */ ?>/public/example/genes-example" download="genes-example" style="color: rgb(255, 255, 255);">For example of Upload File</a></b></span></button>
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

                                    <button type="button" id="submit_2" class="btn btn-primary">Start search</button>
                                    <button type="reset" onclick="window.tf_name_three.reset(search_pathway);
                                                    window.cel_type_three.reset(search_pathway);
                                                    window.tis_type_three.reset(search_pathway);" class="btn btn-primary">Reset
                                    </button>
                                    <button type="reset"
                                            onclick="setTimeout(function() {
                                    $('#fdr').val(0.05);
                                    $('#all').prop('checked', true);
                                    $('#list :checkbox').prop('checked', true);
                                    $('#Threshold').val(0.05);
                                    window.tis_type_three.val('Breast',search_pathway);
                                    window.cel_type_three.val('Cancer cell',search_pathway);
                                    window.tf_name_three.val('ZEB1',search_pathway)
                                },100)"
                                            class="btn btn-primary">For example
                                    </button>
                                </form>
                            </div>
                            <script>
                                $('#file_check').prop('checked', false);
                                $("#file_").click(function () {
                                    window.tf_name_three.val("",search_pathway)
                                    $('#file_check').prop('checked', true);
                                });
                                $("#submit_2").click(function () {
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
                                            window.tf_name_three.val(value,search_pathway)
                                            if ($("#tf_name_three_ipt").val().trim() == "") {
                                                alert("Please input some Genes!");
                                                return;
                                            }
                                            document.getElementById("form_Pathway_enrichment_analysis_of_genes_result").submit();
                                        }, 500);
                                    } catch (e) {
                                        if ($("#tf_name_three_ipt").val().trim() == "") {
                                            alert("Please input some Genes!");
                                            return;
                                        }
                                        document.getElementById("form_Pathway_enrichment_analysis_of_genes_result").submit();
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "public/footer.php"; ?>
<div class="modal fade" id="search_detail_modal" tabindex="-1" role="dialog" aria-labelledby="search_detail_modal_label">
    <div class="modal-dialog" style="width: 80%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <b><h3 class="modal-title" id="search_detail_modal_label">Search detail</h3></b>
            </div>
            <div class="modal-body" id="search_detail_modal_body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    /*搜索提交*/
    function search_detail(php_file) {
        let data = {
            "search_by_Marker.php":$("#form_search_by_Marker").serialize(),
            "search_by_tis_cel.php":$("#form_search_by_tis_cel").serialize()
        }
        let label = {
            "search_by_Marker.php":"Result of searching by Gene",
            "search_by_tis_cel.php":"Result of Searching by Tissue and Cell Type"
        }
        $('#search_detail_modal').modal('show');
        $("#search_detail_modal_label").html(label[php_file]);
        $("#search_detail_modal_body").html("");
        $.ajax({
            url: "search/"+php_file+"?"+data[php_file].replace(/\+/g," "),
            dataType: "HTML",
            success: function (html) {
                $("#search_detail_modal_body").html(html);
            }
        })
    }
</script>
</html>

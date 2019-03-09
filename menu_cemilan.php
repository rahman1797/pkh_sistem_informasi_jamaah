<?php

  include('header.php');

?>

  <style>

    .btn {

      background-color: #26484f;

      border: none;

      color: white;

      text-align: center;

      opacity: 0.6;

      transition: 0.3s;

    }



    .btn:hover {opacity: 1}



    .tooltip {

      position: relative;

      display: inline-block;

      border-bottom: 1px dotted black;

  }



  .tooltip .tooltiptext {

      visibility: hidden;

      width: 120px;

      background-color: black;

      text-align: center;

      border-radius: 6px;

      padding: 5px 0;



      /* Position the tooltip */

      position: absolute;

      z-index: 1;

  }



  .tooltip:hover .tooltiptext {

      visibility: visible;

  }

  </style>



<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>



  <!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3>Menu <small>Cemilan</small></h3>

              </div>

            </div>

          </div>

<!-- background content -->

          <div class="clearfix"></div>

<!-- main content -->        

            <div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Form tambah menu cemilan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                    <form id="tambah_menu" action="Framework/Functions/func_tambah_menu.php" method="post" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama menu cemilan <span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" name="nama_menu" id="nama_menu" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Isi menu cemilan<span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" id="isi_menu" name="isi_menu" required="required" class="form-control col-md-7 col-xs-12">

                        </div>

                      </div>

                      <div class="form-group">

                        <label for="harga" class="control-label col-md-3 col-sm-3 col-xs-12">Harga <span class="required">*</span></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="harga" class="form-control col-md-7 col-xs-12" type="number" name="harga" required="required">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="status" required="required" id="status" class="form-control">

                            <option value="">Choose options</option>

                            <option value="1">Tersedia</option>

                            <option value="0">Tidak Tersedia</option>

                          </select>

                        </div>

                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          

                       <button class="btn btn-primary" type="reset">Reset</button>

                       <button type="submit" id="button" class="btn btn-success" name="submit">Submit</button>

                        </div>

                      </div>

  

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>



<!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3>Menu<small> Cemilan</small></h3>

              </div>

            </div>



<!-- background content -->

            <div class="clearfix"></div>

<!-- Main content -->

            <div class="row">

     

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Tabel Menu Cemilan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

        

                    <table id="datatable" class="table table-striped table-bordered">

                      

                    <!-- header tabel -->

                      <thead>

                        <tr>

                          <th><center><strong>Nama Menu Cemilan </th>

                          <th><center>Isi Menu Cemilan </th>

                          <th><center>Harga </th>

                          <th><center>Status </th>

                          <th><center>Aksi </th>

                        </tr>

                      </thead>



                      <tbody>

                      <tr>

                        <td>M0001 </td>

                        <td>Nasi, Tempe, Susu </td>

                        <td>Rp10.000 </td>

                        <td>Tersedia </td>

                        <td> </td>

                      </tr>           

                      </tbody>

                    </table> 

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- /page content -->



         <!-- FOOTER -->

<?php

  include('footer.php');

?>

        <!-- /FOOTER -->



<!-- <script>

    $('#myDatepicker').datetimepicker({

       format:'DD/MM/YYYY HH:mm'

    });

    $('#myDatepicker1').datetimepicker({

       format:'DD/MM/YYYY HH:mm'

    });

  

    $(document).ready(function() {

        $('#detail').summernote({

          toolbar: [

         // [groupName, [list of button]]

            ['style', ['fontname','fontsize','bold', 'italic', 'underline', 'clear']],

            ['font', ['strikethrough', 'superscript', 'subscript']],

            ['fontsize', ['fontsize']],

            ['color', ['color']],

            ['para', ['ul', 'ol', 'paragraph']],

            ['height', ['height']],

            ['insert', ['link','table','hr']],

            ['misc',['fullscreen','codeview']]

          ]

        });

    });

  </script> -->
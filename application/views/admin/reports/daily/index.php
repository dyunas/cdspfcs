<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Daily Collection</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active">Daily Collection</li>
        </ol>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-8 -->
</div>

<div class="content mt-3">
  <div class="row">
    <div class="col-sm-12">
      <div id="notice"></div><!-- /.notice -->
    </div><!-- /.col-sm-12 -->
  </div><!-- /.row -->
  <div class="animated fadeIn">
    <div class="row hideThis">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="card-header">
            <strong><?php echo strtoupper('generate daily collection report') ?></strong>
          </div>
          <div class="card-body">
            <form id="dailyForm" role="form">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row form-group">
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                    <label for="department" class=" form-control-label">*DEPARTMENT</label>
                  </div>
                  <div class="col-sm-2 col-xs-12">
                    <select id="department" name="department" class="input-sm form-control-sm form-control" required  data-parsley-required-message="">
                      <option value="">---</option>
                      <option value="ELEMENTARY">ELEMENTARY</option>
                      <option value="JUNIORHS">JUNIORHS</option>
                      <option value="SENIORHS">SENIORHS</option>
                      <option value="COLLEGE">COLLEGE</option>
                    </select>
                  </div>.
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;max-width: 13%;">
                    <label for="selDate" class=" form-control-label">*SELECT DATE</label>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                    <input type="date" id="selDate" name="selDate" class="input-sm form-control-sm form-control" required  data-parsley-required-message="">
                  </div>
                </div><!-- /.row form-group -->
              </div>
          </div><!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-check"></i> Generate
            </button>
            <button type="reset" class="btn btn-outline-danger btn-sm" id="reset">
              <i class="fa fa-refresh"></i> Reset
            </button>
          </div>
          </form>
        </div><!-- /.card -->
      </div><!-- /.col-lg-3 col-md-6 -->
    </div><!-- /.row -->
    <br/>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="d-flex justify-content-center">
          <div class="spinner-border text-danger spinners" style="display:none;width: 8rem; height: 8rem;" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;" id="dailies">
        <div class="card printThis" style="display: none;">
          <div class="card-body">
            <img src="<?php echo base_url('assets/images/cdsp_img.png'); ?>" style="width:100px;position:absolute;left: 15%;" alt="Hello">
            <br/>
            <h5 style="text-align:center;">
              COLEGEIO DE SAN PEDRO<br/>
              <small class="text-muted">Institute of Computer Technology</small>
            </h5>
            <p style="text-align:center;"><small>Phase 1A Pacita Complex 1 San Pedro Laguna</small></p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <strong>STATEMENT OF ACCOUNT</strong>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <th>Student Name</th>
                <th>Payables</th>
                <th>O.R./Invoice Number</th>
                <th>Date</th>
                <th>Amount Due</th>
                <th>Amount Paid</th>
                <th>Balance</th>
              </thead>
              <tbody id="dailiesResultHere"></tbody>
              <tfoot>
                <tr>
                  <td><strong>Total Daily Collection</strong></td>
                  <td colspan="2"><strong><span id="totalCollected"></span></strong></td>
                  <td colspan="4"></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="card-footer">
            <button type="submit" id="print" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-print"></i> Print
            </button>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.animated fadeIn -->
</div> <!-- .content -->

<script src="<?php echo base_url('assets/vendors/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/sweet-alert/dist/sweetalert2.all.min.js'); ?>"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="<?php echo base_url('assets/parsley/dist/parsley.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/js/pages/admin/reports/dailycollection.js'); ?>"></script>
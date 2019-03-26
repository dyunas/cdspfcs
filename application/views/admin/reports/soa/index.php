<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Statement of Account</h1>
      </div><!-- /.page-title -->
    </div><!-- /.page-header -->
  </div><!-- /.col-sm-4 -->
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active">Statement of Account</li>
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
            <strong><?php echo strtoupper('create statement') ?></strong>
          </div>
          <div class="card-body">
            <form id="createStatement" role="form">
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
                  </div>
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                    <label for="stud_lname" class=" form-control-label">*LASTNAME</label>
                  </div>
                  <div class="col-sm-2 col-xs-12">
                    <input type="text" id="stud_lname" name="stud_lname" placeholder="Lastname" class="input-sm form-control-sm form-control" required  data-parsley-required-message="">
                  </div>
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                    <label for="stud_fname" class=" form-control-label">*FIRSTNAME</label>
                  </div>
                  <div class="col-sm-2 col-xs-12">
                    <input type="text" id="stud_fname" name="stud_fname" placeholder="Firstname" class="input-sm form-control-sm form-control" required  data-parsley-required-message="">
                  </div>
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                    <label for="stud_mname" class=" form-control-label">M.I.</label>
                  </div>
                  <div class="col-sm-2 col-xs-12" style="padding: 0px 0px 0px 15px;">
                    <input type="text" id="stud_mname" name="stud_mname" placeholder="Middle Initial" class="input-sm form-control-sm form-control">
                  </div>
                </div><!-- /.row form-group -->
                <div class="row form-group">
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;max-width: 13%;">
                    <label for="fromDte" class=" form-control-label">*FROM DATE</label>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                    <input type="date" id="fromDte" name="fromDte" class="input-sm form-control-sm form-control" required  data-parsley-required-message="">
                  </div>
                  <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;max-width: 15%;">
                    <label for="toDte" class=" form-control-label">TO DATE</label>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                    <input type="date" id="toDte" name="toDte" class="input-sm form-control-sm form-control">
                  </div>
                </div><!-- /.row form-group -->
              </div>
              <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label><strong>ADDITIONAL OPTIONS</strong></label>
                <div class="row form-group">
                  <div class="form-check">
                    <div class="checkbox col-sm-12 col-xs-12">
                      <label for="showInv" class="form-check-label ">
                        <input type="checkbox" id="showInv" name="showInv" value="0" class="form-check-input docu"><strong>Show invoice number on statements</strong>
                      </label>
                    </div>
                  </div>
                </div>
              </div> -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm">
              <i class="fa fa-check"></i> Create
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

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;" id="soa">
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
            <strong>STUDENT INFORMATION</strong>
          </div>
          <div class="card-body">
            <div class="row form-group">
              <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label class=" form-control-label">STUDENT ID:</label>
              </div>
              <div class="col-sm-2 col-xs-12">
                <div id="studid"></div>
              </div>
              <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label class=" form-control-label">STUDENT NAME:</label>
              </div>
              <div class="col-sm-3 col-xs-12">
                <div id="studFullName"></div>
              </div>
            </div><!-- /.row form-group -->
            <div class="row form-group">
              <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;max-width: 9%;">
                <label class=" form-control-label" id="studType"></label>
              </div>
              <div class="col-sm-2 col-xs-12" style="padding: 0px 0px 0px 15px;max-width: 15.9%;">
                <div id="course"></div>
              </div>
              <div class="col col-sm-2 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label class=" form-control-label">Registration Date:</label>
              </div>
              <div class="col-sm-2 col-xs-12">
                <div id="regDate"></div>
              </div>
              <div class="col col-sm-1 d-none d-sm-block" style="padding: 0px 0px 0px 15px;">
                <label class=" form-control-label">Status:</label>
              </div>
              <div class="col-sm-2 col-xs-12">
                <div id="status"></div>
              </div>
            </div><!-- /.row form-group -->
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <strong>STATEMENT OF ACCOUNT</strong>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <th>Payables</th>
                <th>O.R./Invoice Number</th>
                <th>Date</th>
                <th>Amount Due</th>
                <th>Amount Paid</th>
                <th>Balance</th>
              </thead>
              <tbody id="soaResultHere"></tbody>
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
<script src="<?php echo base_url('assets/assets/js/pages/admin/reports/stateofaccounts.js'); ?>"></script>
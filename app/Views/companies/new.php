<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add new company</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/companies">Companies</a></li>
              <li class="breadcrumb-item active">Add new company</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <a href="/companies" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i>
            Back to list
        </a>

        <br>
        <br>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-center">Add new company</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

                    <form action="/companies/new" method="post">

                        <div class="w-50 mx-auto my-5">
                            <div class="form-group row">
                                <label for="name" class="col-sm-12 col-md-2">Company name</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nit" class="col-sm-12 col-md-2">NIT</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="nit" id="nit" class="form-control"
                                    data-inputmask="'mask': '9999-999999-999-9'" data-mask>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nrc" class="col-sm-12 col-md-2">NRC</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="nrc" id="nrc" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-12 col-md-2">City</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="city" id="city" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Save
                                    </button>
                                    <a href="/companies" class="btn btn-light">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?= $this->endSection() ?>

<?= $this->section('js-section') ?>

<script src="<?= base_url() ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
  
  $(function () {
    $("[data-mask]").inputmask();
  });

</script>
<?= $this->endSection() ?>

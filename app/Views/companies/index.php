<?= $this->extend('layout/master') ?>

<?= $this->section('main-content') ?>

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Companies</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Companies</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <a href="/companies/new" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Add new company
        </a>

        <br>
        <br>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Companies</h3>
                <div class="card-tools">
                    <form action="/companies" class="mb-1">

                      <div class="d-flex align-items-center">

                        <div style="width: 100px" class="mr-2">
                          <select name="type" id="type" class="form-control form-control-sm">
                            <?php foreach(['name', 'city', 'nit'] as $t): ?>
                              <option value="<?= $t ?>" <?= ($t == $type) ? 'selected' : '' ?>><?= ucwords($t) ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="search" class="form-control float-right" placeholder="Search" value="<?= isset($search) ? $search : '' ?>">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>

                      </div>

                    </form>
                    <div>
                      <?php if (isset($type) && isset($search)): ?>
                        <a href="/companies"> <span class="badge badge-info"><?= $type ?> : <?= $search ?></span> clear</a>
                      <?php endif ?>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Company name</th>
                      <th>NIT</th>
                      <th>City</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($companies as $company): ?>
                      <tr>
                        <td><?= $company['id'] ?></td>
                        <td><?= $company['name'] ?></td>
                        <td><?= $company['nit'] ?></td>
                        <td><?= $company['city'] ?></td>
                        <td class="w-25">
                          <a href="/companies/edit/<?= $company['id'] ?>" class="btn btn-info">
                            <i class="fas fa-edit"></i>
                            Editar
                          </a>
                          <a href="/companies/delete/<?= $company['id'] ?>" class="btn btn-danger" onclick="return confirm('deseas eliminar este elemento?')">
                            <i class="fas fa-trash"></i>
                            Eliminar
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <?= $pager->links('default', 'custom') ?>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <select name="perPage" id="perPage" class="form-control w-25 ml-auto">
                      <?php foreach([10, 25, 50, 100] as $s): ?>
                        <option value="<?= $s ?>" <?= ($s == $perPage) ? 'selected' : '' ?>><?= $s ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
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

<script>
    document.querySelector('#perPage').addEventListener('change', function (e) {
      location.href = `<?= current_url() ?>?perPage=${this.value}`; 
    })
</script>

<?= $this->endSection() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
</head>

<body class="sb-nav-fixed">
    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Ditambahkan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('edit')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Diedit!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Ditambahkan!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('error_file')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data File Terlalu Besar !",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Diedit!",
        icon: "error"
    });
    </script>
    <?php } ?>
    
    <?php $this->load->view("admin/components/nav_bar.php") ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin/components/side_bar.php") ?>
        </div>
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Table Kerja Sama Internasional</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>Dashboard/dashboard_admin">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Kerja Sama Internasional</li>
                    </ol>
                    <ol>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambah_kerja_sama_eksternal">
                            Tambah Data <i class="fas fa-plus"></i>
                        </button>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Kerja Sama Internasional
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Usulan</th>
                                        <th>Keterangan</th>
                                        <th>Lembaga Mitra</th>
                                        <th>Pengusul</th>
                                        <th>Status Kerja Sama </th>
                                        <th>Kategori Kerja Sama</th>
                                        <th>File Kerja Sama Internasional</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $no_id = 0;
                  $no = 1;
                  foreach($kerja_sama_eksternal as $i){
                 
                  $id_kerja_sama_eksternal = $i['id_kerja_sama_eksternal'];
                  $no_usulan = $i['no_usulan'];
                  $keterangan = $i['keterangan'];
                  $id_lembaga_mitra = $i['nama_mitra'];
                  $id_pengusul =  $kerja_sama_eksternal_pengusul[$no_id++]['nama_pengusul'];
                  $id_status_kerja_sama = $i['status_kerja_sama'];
                  $nama_kategori_kerja_sama = $i['nama_kategori_kerja_sama'];
                  $file_kerja_sama_eksternal = $i['file_kerja_sama_eksternal'];
                  
              ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $no_usulan ?></td>
                                        <td><?= $keterangan ?></td>
                                        <td><?= $id_lembaga_mitra ?></td>
                                        <td><?= $id_pengusul ?></td>
                                        <td><?= $id_status_kerja_sama ?></td>
                                        <td><?=$nama_kategori_kerja_sama?></td>
                                        <td class="text-center">
                                            <div class="table-resposive">
                                                <div class="table table-striped table-hover "><a type="button"
                                                        class="btn btn-primary"
                                                        href="<?=base_url();?>assets/kerja_sama_eksternal/admin/<?=$file_kerja_sama_eksternal?>"><i
                                                            class="fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-resposive">
                                                <div class="table table-striped table-hover ">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#edit_kerja_sama_eksternal<?= $id_kerja_sama_eksternal ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-resposive">
                                                <div class="table table-striped table-hover ">
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#hapus<?php echo  $id_kerja_sama_eksternal ?>"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Hapus Kerja Sama Internasional -->
                                    <div class="modal fade" id="hapus<?= $id_kerja_sama_eksternal ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kerja
                                                        Sama Internasional
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?php echo base_url()?>Kerja_sama_eksternal/hapus_kerja_sama_eksternal/<?=$id_kerja_sama_eksternal?>"
                                                        method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id_kerja_sama_eksternal"
                                                                    value="<?php echo $id_kerja_sama_eksternal?>" />

                                                                <input type="hidden"
                                                                    name="file_kerja_sama_eksternal_old"
                                                                    value="<?=$file_kerja_sama_eksternal?>" hidden>


                                                                <p>Apakah kamu yakin ingin menghapus data
                                                                    ini?</i></b></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger ripple"
                                                                data-dismiss="modal">Tidak</button>
                                                            <button type="submit"
                                                                class="btn btn-success ripple save-category">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Edit Kerja Sama Internasional -->
                                    <div class="modal fade"
                                        id="edit_kerja_sama_eksternal<?= $id_kerja_sama_eksternal ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kerja
                                                        Sama Internasional
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?= base_url(); ?>Kerja_sama_eksternal/edit_data_admin"
                                                        enctype="multipart/form-data" method="POST">
                                                        <input type="text" name="id_kerja_sama_eksternal"
                                                            value="<?= $id_kerja_sama_eksternal ?>" hidden>
                                                        <div class="mb-3">
                                                            <label for="no_pengajuan" class="form-label">Nomor
                                                                Usulan</label>
                                                            <input type="text" class="form-control" id="no_usulan"
                                                                name="no_usulan" aria-describedby="no_pengajuan"
                                                                value="<?=$no_usulan?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan"
                                                                class="form-label">Keterangan</label>
                                                            <input type="text" class="form-control" id="keterangan"
                                                                name="keterangan" value="<?=$keterangan?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Lembaga
                                                                Mitra</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="id_lembaga_mitra">
                                                                <?php foreach($user->result_array() as $u)
                                                                :
                                                                $id = $u["id"];
                                                                $nama_mitra = $u["nama_mitra"];
                                                                ?>
                                                                <option value="<?= $id ?>"><?= $nama_mitra ?></option>

                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Pengusul</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="id_pengusul">
                                                                <?php foreach($user->result_array() as $u)
                                                    :
                                                    $id = $u["id"];
                                                    $nama_mitra = $u["nama_mitra"];
                                                     ?>
                                                                <option value="<?= $id ?>"><?= $nama_mitra ?></option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Kateogri Kerja
                                                                Sama</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="id_kategori_kerja_sama">
                                                                <?php foreach($kategori_kerja_sama as $u)
                                                    :
                                                    $id_kategori_kerja_sama = $u["id_kategori_kerja_sama"];
                                                    $nama_kategori_kerja_sama = $u["nama_kategori_kerja_sama"];
                                                     ?>
                                                                <option value="<?= $id_kategori_kerja_sama ?>">
                                                                    <?= $nama_kategori_kerja_sama ?></option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Status Kerja
                                                                Sama</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="id_status_kerja_sama">
                                                                <?php foreach($status_kerja_sama as $u)
                                                    :
                                                    $id_status_kerja_sama = $u["id_status_kerja_sama"];
                                                    $nama_status_kerja_sama = $u["status_kerja_sama"];
                                                     ?>
                                                                <option value="<?= $id_status_kerja_sama ?>">
                                                                    <?= $nama_status_kerja_sama ?></option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            id="file_kerja_sama_eksternal_old"
                                                            name="file_kerja_sama_eksternal_old"
                                                            value="<?=$file_kerja_sama_eksternal?>" hidden>

                                                        <div class="mb-3">
                                                            <label for="file_kerja_sama_eksternal"
                                                                class="form-label">File Kerja Sama
                                                                Internasional</label>

                                                            <input type="file" class="form-control"
                                                                id="file_kerja_sama_eksternal"
                                                                name="file_kerja_sama_eksternal">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal Tambah Data Kerja Sama Internasional -->
                        <div class="modal fade" id="tambah_kerja_sama_eksternal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kerja Sama Internasional
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url(); ?>Kerja_sama_eksternal/input_data_admin"
                                            enctype="multipart/form-data" method="POST">
                                            <div class="mb-3">
                                                <label for="no_pengajuan" class="form-label">Nomor Usulan</label>
                                                <input type="text" class="form-control" id="no_usulan" name="no_usulan"
                                                    aria-describedby="no_pengajuan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Lembaga Mitra</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_lembaga_mitra">
                                                    <?php foreach($user->result_array() as $u)
                                                    :
                                                    $id = $u["id"];
                                                    $nama_mitra = $u["nama_mitra"];
                                                     ?>
                                                    <option value="<?= $id ?>"><?= $nama_mitra ?></option>

                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Pengusul</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_pengusul">
                                                    <?php foreach($user->result_array() as $u)
                                                    :
                                                    $id = $u["id"];
                                                    $nama_mitra = $u["nama_mitra"];
                                                     ?>
                                                    <option value="<?= $id ?>"><?= $nama_mitra ?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Kateogri Kerja Sama</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_kategori_kerja_sama">
                                                    <?php foreach($kategori_kerja_sama as $u)
                                                    :
                                                    $id_kategori_kerja_sama = $u["id_kategori_kerja_sama"];
                                                    $nama_kategori_kerja_sama = $u["nama_kategori_kerja_sama"];
                                                     ?>
                                                    <option value="<?= $id_kategori_kerja_sama ?>">
                                                        <?= $nama_kategori_kerja_sama ?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Status Kerja Sama</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_status_kerja_sama">
                                                    <?php foreach($status_kerja_sama as $u)
                                                    :
                                                    $id_status_kerja_sama = $u["id_status_kerja_sama"];
                                                    $nama_status_kerja_sama = $u["status_kerja_sama"];
                                                     ?>
                                                    <option value="<?= $id_status_kerja_sama ?>">
                                                        <?= $nama_status_kerja_sama ?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">File Kerja Sama
                                                    Internasional</label>
                                                <input type="file" class="form-control" id="keterangan"
                                                    name="file_kerja_sama_eksternal">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view("admin/components/footer.php") ?>
</body>

</html>
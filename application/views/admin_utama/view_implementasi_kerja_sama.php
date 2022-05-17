<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin_utama/components/header.php") ?>
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
    <?php $this->load->view("admin_utama/components/nav_bar.php") ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php $this->load->view("admin_utama/components/side_bar.php") ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Table Implementasi Kerja Sama</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>Dashboard/dashboard_admin">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Implementasi Kerja Sama</li>
                    </ol>
                    <ol>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambah_data_implementasi_kerja_sama">
                            Tambah Data <i class="fas fa-plus"></i>
                        </button>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataImplementasi Kerja Sama
                        </div>

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Dimulai Kerja Sama</th>
                                        <th>Tanggal Berakhir Kerja Sama</th>
                                        <th>Lembaga Mitra</th>
                                        <th>Keterangan</th>
                                        <th>Jenis Perjanjian</th>
                                        <th>Kategori Kerja Sama</th>
                                        <th>Masa Berlaku</th>
                                        <th>Evaluasi</th>
                                        <th>File Implementasi Kerja Sama</th>
                                        <th>Foto Implementasi Kerja Sama</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                  
                  $no = 1;
                  foreach($implementasi_kerja_sama->result_array() as $i){
                  
                  
                  $id_implementasi_kerja_sama = $i['id_implementasi_kerja_sama'];
                  $tanggal_dimulai = $i['tanggal_dimulai'];
                  $tanggal_berakhir = $i['tanggal_berakhir'];
                  $nama_mitra = $i['nama_mitra'];
                  $keterangan = $i['keterangan'];
                  $id_jenis_perjanjian = $i['bentuk_perjanjian'];
                  $nama_kategori_kerja_sama = $i['nama_kategori_kerja_sama'];
                  $evaluasi = $i['evaluasi'];
                  $file_implementasi_kerja_sama = $i['file_implementasi_kerja_sama'];
                  $foto_implementasi_kerja_sama = $i['foto_implementasi_kerja_sama'];
                  $masa_berlaku = $i['masa_berlaku'];

              ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $tanggal_dimulai ?></td>
                                        <td><?= $tanggal_berakhir ?></td>
                                        <td><?= $nama_mitra ?></td>
                                        <td><?= $keterangan ?></td>
                                        <td><?= $id_jenis_perjanjian ?></td>
                                        <td><?= $nama_kategori_kerja_sama ?></td>
                                        <td><?= $masa_berlaku ?></td>
                                        <td><?= $evaluasi ?></td>
                                        <td class="text-center">
                                            <div class="table-resposive">
                                                <div class="table table-striped table-hover "><a type="button"
                                                        class="btn btn-primary"
                                                        href="<?=base_url();?>assets/implementasi_kerja_sama/admin/<?=$file_implementasi_kerja_sama?>"><i
                                                            class="fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <center> <a
                                                    href="<?=base_url();?>assets/implementasi_kerja_sama/admin/<?=$foto_implementasi_kerja_sama?>"
                                                    target="_blank"><img
                                                        src="<?=base_url();?>assets/implementasi_kerja_sama/admin/<?=$foto_implementasi_kerja_sama?>"
                                                        style="width: 25%"> </a>
                                        </td>
                                        <td>
                                            <div class="table-resposive">
                                                <div class="table table-striped table-hover ">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#edit_data_implementasi_kerja_sama<?= $id_implementasi_kerja_sama ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-resposive">
                                                <div class="table table-striped table-hover ">
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#hapus<?php echo  $id_implementasi_kerja_sama ?>"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Hapus Implementasi Kerja Sama -->
                                    <div class="modal fade" id="hapus<?= $id_implementasi_kerja_sama ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                        Implementasi Kerja Sama
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?php echo base_url()?>Implementasi_kerja_sama/hapus_implementasi_kerja_sama_admin_utama/<?=$id_implementasi_kerja_sama?>"
                                                        method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id_implementasi_kerja_sama"
                                                                    value="<?php echo $id_implementasi_kerja_sama?>" />

                                                                <input type="hidden"
                                                                    name="file_implementasi_kerja_sama_old"
                                                                    value="<?=$file_implementasi_kerja_sama?>" hidden>

                                                                <input type="hidden"
                                                                    name="foto_implementasi_kerja_sama_old"
                                                                    value="<?=$foto_implementasi_kerja_sama?>" hidden>


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

                                    <!-- Modal Edit Data implementasi kerja sama -->
                                    <div class="modal fade"
                                        id="edit_data_implementasi_kerja_sama<?= $id_implementasi_kerja_sama ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                        Implementasi Kerja
                                                        Sama
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?= base_url(); ?>Implementasi_kerja_sama/edit_data_admin_utama"
                                                        enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" name="id_implementasi_kerja_sama"
                                                            value="<?php echo $id_implementasi_kerja_sama?>" />
                                                        <div class="mb-3">
                                                            <label for="tanggal_dimulai" class="form-label">Tanggal
                                                                Dimulai Kerja Sama</label>
                                                            <input type="date" class="form-control" id="tanggal_dimulai"
                                                                aria-describedby="tanggal_dimulai"
                                                                name="tanggal_dimulai" value="<?=$tanggal_dimulai?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tanggal_berakhir" class="form-label">Tanggal
                                                                Berakhir Kerja Sama</label>
                                                            <input type="date" class="form-control"
                                                                id="tanggal_berakhir"
                                                                aria-describedby="tanggal_berakhir"
                                                                name="tanggal_berakhir" value="<?=$tanggal_dimulai?>">
                                                        </div>
                                                        <input type="text" name="id_implementasi_kerja_sama"
                                                            value="<?=$id_implementasi_kerja_sama?>" hidden>
                                                        <div class="mb-3">
                                                            <label for="id_lembaga_mitra" class="form-label">Lembaga
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
                                                            <label for="id_masa_berlaku" class="form-label">Masa
                                                                Berlaku</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="id_masa_berlaku">

                                                                <?php foreach($masa_berlaku_data as $u)
                                                    :
                                                    $id_masa_berlaku = $u["id_masa_berlaku"];
                                                    $nama_masa_berlaku = $u["masa_berlaku"];
                                                     ?>
                                                                <option value="<?= $id_masa_berlaku ?>">
                                                                    <?= $nama_masa_berlaku ?></option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan"
                                                                class="form-label">Keterangan</label>
                                                            <input type="text" class="form-control" id="keterangan"
                                                                name="keterangan" aria-describedby="keterangan"
                                                                value="<?=$keterangan?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="id_jenis_perjanjian" class="form-label">Jenis
                                                                Perjanjian</label>

                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="id_bentuk_perjanjian">
                                                                <?php foreach($bentuk_perjanjian_pilih as $u)
                                                    :
                                                    $id = $u["id_bentuk_perjanjian"];
                                                    $bentuk_perjanjian = $u["bentuk_perjanjian"];
                                                     ?>
                                                                <option value="<?= $id ?>"><?= $bentuk_perjanjian ?>
                                                                </option>

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
                                                            <label for="id_evaluasi" class="form-label">Masa
                                                                Berlaku</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="id_evaluasi">

                                                                <?php foreach($evaluasi_data as $u)
                                                    :
                                                    $id_evaluasi = $u["id_evaluasi"];
                                                    $nama_evaluasi = $u["evaluasi"];
                                                     ?>
                                                                <option value="<?= $id_evaluasi ?>">
                                                                    <?= $nama_evaluasi ?></option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="file_implementasi_kerja_sama"
                                                                class="form-label">File Implementasi Kerja Sama</label>
                                                            <input type="text" class="form-control"
                                                                id="file_implementasi_kerja_sama_old"
                                                                name="file_implementasi_kerja_sama_old"
                                                                value="<?= $file_implementasi_kerja_sama ?>" hidden>
                                                            <input type="file" class="form-control"
                                                                id="file_implementasi_kerja_sama"
                                                                name="file_implementasi_kerja_sama">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="foto_implementasi_kerja_sama"
                                                                class="form-label">foto Implementasi Kerja Sama</label>
                                                            <input type="text" class="form-control"
                                                                id="foto_implementasi_kerja_sama_old"
                                                                name="foto_implementasi_kerja_sama_old"
                                                                value="<?= $foto_implementasi_kerja_sama ?>" hidden>
                                                            <input type="file" class="form-control"
                                                                id="foto_implementasi_kerja_sama"
                                                                name="foto_implementasi_kerja_sama">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal Tambah Data Implementasi Kerja Sama -->
                        <div class="modal fade" id="tambah_data_implementasi_kerja_sama" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Implementasi Kerja
                                            Sama
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url(); ?>Implementasi_kerja_sama/input_data_admin_utama"
                                            enctype="multipart/form-data" method="POST">
                                            <div class="mb-3">
                                                <label for="tanggal_dimulai" class="form-label">Tanggal Dimulai Kerja
                                                    Sama</label>
                                                <input type="date" class="form-control" id="tanggal_dimulai"
                                                    aria-describedby="tanggal_dimulai" name="tanggal_dimulai">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir Kerja
                                                    Sama</label>
                                                <input type="date" class="form-control" id="tanggal_berakhir"
                                                    aria-describedby="tanggal_berakhir" name="tanggal_berakhir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_lembaga_mitra" class="form-label">Lembaga Mitra</label>
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
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan" aria-describedby="keterangan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_jenis_perjanjian" class="form-label">Jenis
                                                    Perjanjian</label>

                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_bentuk_perjanjian">
                                                    <?php foreach($bentuk_perjanjian_pilih as $u)
                                                    :
                                                    $id = $u["id_bentuk_perjanjian"];
                                                    $bentuk_perjanjian = $u["bentuk_perjanjian"];
                                                     ?>
                                                    <option value="<?= $id ?>"><?= $bentuk_perjanjian ?>
                                                    </option>

                                                    <?php endforeach; ?>
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
                                                <label for="id_masa_berlaku" class="form-label">Masa
                                                    Berlaku</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_masa_berlaku">

                                                    <?php foreach($masa_berlaku_data as $u)
                                                    :
                                                    $id_masa_berlaku = $u["id_masa_berlaku"];
                                                    $nama_masa_berlaku = $u["masa_berlaku"];
                                                     ?>
                                                    <option value="<?= $id_masa_berlaku ?>">
                                                        <?= $nama_masa_berlaku ?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_evaluasi" class="form-label">Masa
                                                    Berlaku</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="id_evaluasi">

                                                    <?php foreach($evaluasi_data as $u)
                                                    :
                                                    $id_evaluasi = $u["id_evaluasi"];
                                                    $nama_evaluasi = $u["evaluasi"];
                                                     ?>
                                                    <option value="<?= $id_evaluasi ?>">
                                                        <?= $nama_evaluasi ?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="file_implementasi_kerja_sama" class="form-label">File
                                                    Implementasi Kerja Sama</label>
                                                <input type="file" class="form-control"
                                                    id="file_implementasi_kerja_sama"
                                                    name="file_implementasi_kerja_sama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_implementasi_kerja_sama" class="form-label">Foto
                                                    Implementasi Kerja Sama</label>
                                                <input type="file" class="form-control"
                                                    id="foto_implementasi_kerja_sama"
                                                    name="foto_implementasi_kerja_sama">
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
    <?php $this->load->view("admin_utama/components/footer.php") ?>
</body>

</html>
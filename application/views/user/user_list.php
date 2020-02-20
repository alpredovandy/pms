<?php $this->load->view('templates/header');?>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>User List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
				<div style="margin-top:20px;">
                
	    </div></div>
        </div>
        <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Perawat</h1>
            <div class="section-header-breadcrumb">
            <a href="<?php echo site_url('user/create/'.$role); ?>" class="btn btn-primary text-right">Tambah Data</a>
              </div>
          </div>
          <table class="table table-hover table-resposive table-condensed">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">No HP</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $users=$this->db->query('select * from user where role="'.$role.'"')->result();
                foreach ($users as $key => $value) {
                    
                ?>
              <tr>
                <th scope="row">1</th>
                <td><img src="https://img.icons8.com/bubbles/50/000000/user.png" alt="" width="60"></td>
                <td><?php echo $value->nama; ?></td>
                <td><?php echo $value->no_hp; ?></td>
                <td><?php echo $value->email; ?></td>
                <td class="btext-white"><a href="<?php echo site_url('user/update/'.$value->id_user."/".$role); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a> <a href="<?php echo site_url('user/delete/'.$value->id_user."/".$role); ?>" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a></td>
            </tr>
                <?php } ?>
              
            </tbody>
          </table>   
        </section>
      </div>
	    
        </table><?php $this->load->view('templates/footer'); ?><script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "user/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_user",
                            "orderable": false
                        },{"data": "nama"},{"data": "no_hp"},{"data": "email"},{"data": "jk"},{"data": "username"},{"data": "password"},{"data": "foto"},{"data": "nama_keluarga"},{"data": "alamat_keluarga"},{"data": "email_keluarga"},{"data": "no_hp_keluarga"},{"data": "role"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
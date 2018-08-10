<?php 
Class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('ssp');
	}

	function data(){
		// nama tabel
		$table = 'tbl_siswa';
		// nama pk
		$primaryKey = 'nim';
		// nama list field
		$columns = array(
			array('db' => 'nim', 'dt' => 'nim'),
			array('db' => 'nama', 'dt' => 'nama'),
			array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
			array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
			array(
				'db' => 'nim',
				'dt' => 'aksi',
				'formatter' => function( $d){
					return "<a href='edit.php?id=$d'>EDIT</a>";
				}
			)
		);

		
		// ssql detail variabel untuk deklarasi database yang diperlukan dalam library SSP
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
 
        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );

	}
 }

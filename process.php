<?php /* Created by ELGA RIDLO SINATRIYA
         18-Oktober-2018
         email address elgaridlosinatriya@gmail.com
  */ ?>


<?php
	// process configuration
	session_start();
	include('config/config.php');
	$act = $_GET['act']; isset($act)?$act:'';
	$config = new config();
	
	// configuration message error/success
	function msg($type, $label, $notice){
		if($type=="success"){
			$icon = "fa-check"; $alert = "success";
		} else{
			$icon = "fa-ban";	$alert = "danger";
		}
		$_SESSION['msg'] = '
		<div class="alert alert-'.$alert.' alert-dismissible">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button" onclick="unsetMsg();">
			<i class="icon fa fa-close"></i></button>
			<h4><i class="icon fa '.$icon.'"></i> '.$label.'</h4>
				'.$notice.'
		</div>
		';
	}
	
	switch($act){
		default:
			header('Location: index.php');
		break;
		//=========================================================UPDATE DATA PINJAMAN=====================================================
		case "update_data_pinjaman":
			$result = $config->update("pinjaman",'
				nip="'.$_POST['nip'].'",
				nib="'.$_POST['nib'].'",
				nama="'.$_POST['nama'].'",
				unit_kerja="'.$_POST['unit_kerja'].'",
				jabatan="'.$_POST['jabatan'].'",
				tipe_barang="'.$_POST['tipe_barang'].'",
				jenis_barang="'.$_POST['jenis_barang'].'",
				tanggal_pinjam="'.$_POST['tanggal_pinjam'].'",
				tanggal_kembali="'.$_POST['tanggal_kembali'].'",
				nup="'.$_POST['nup'].'",
				jumlah="'.$_POST['jumlah'].'"
				',"id_peminjaman",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data pinjaman");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kk"</script>';
			} else{
				msg("failed","Failed!","Gagal update data pinjaman");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kk"</script>';
			}		break;
		//=========================================================DELETE DATA PINJAMAN======================================================
		case "delete_data_pinjaman":


            $tgl=date('Y-m-d');


            $sql = $config->query('select * FROM pinjaman where id_peminjam = "' . $_GET['id'] . '"');
            $row = $config->select($sql);
            $nip    = $row['nip'];
            $kode   = $row['kode_jenis'];
            $nama   = $row['nama'];
            $unit   = $row['unit_kerja'];
            $jabatan= $row['jabatan'];
            $tipe   = $row['tipe_barang'];
            $jenis  = $row['jenis_barang'];
            $tp     = $row['tanggal_pinjam'];
            $tk     = $row['tanggal_kembali'];
            $nup    = $row['nup'];
            $peruntukan = $row['peruntukan'];
            (int)$jumlah = $row['jumlah'];

            $sql2 = $config->query('select * FROM barang where kode_jenis = "' . $kode . '"');
            $row2 = $config->select($sql2);
            (int)$ketersediaan = $row2['ketersediaan'];
            $ketersediaan2 = (int)$ketersediaan + (int)$jumlah;

            $sql3 = $config->query('update barang JOIN pinjaman on barang.kode_jenis = pinjaman.kode_jenis
                set barang.ketersediaan = "' .$ketersediaan2.
                '" where pinjaman.kode_jenis ="'.$kode.'"');
            $config->query('insert into history (nip,kode_jenis,nama,unit_kerja,jabatan,tipe_barang,jenis_barang
              ,tanggal_pinjam,tanggal_kembali,tanggal_dikembalikan,nup,peruntukan) 
              values("'.$nip.'","'.$kode.'","'.$nama.'","'.$unit.'","'.$jabatan.'","'.$tipe.'","'.$jenis.'","
              '.$tp.'","'.$tk.'","'.$tgl.'","'.$nup.'","'.$peruntukan.'") ');

		    $result = $config->delete('pinjaman','id_peminjam',$_GET['id']);

            if($result>0){
				msg("success","Success!","Berhasil delete data pinjaman");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang2"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data pinjaman");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang2"</script>';
			}
		break;
		//=========================================================ADD DATA PINJAMAN==========================================================
		case "add_data_pinjaman":
		  if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into pinjaman(nip,kode_jenis,nama,unit_kerja,jabatan,tipe_barang,jenis_barang,nup,tanggal_pinjam,tanggal_kembali,jumlah,peruntukan) 
									values("'.$_POST['nip'].'", "'.$_POST['kode_jenis'].'", "'.$_POST['nama'].'","'.$_POST['unit_kerja'].'","'.$_POST['jabatan'].'","'.$_POST['tipe_barang'].'","'.$_POST['jenis_barang'].'","'.$_POST['nup'].'","'.$_POST['tanggal_pinjam'].'","'.$_POST['tanggal_kembali'].'","'.$_POST['jumlah'].'","'.$_POST['peruntukan'].'")');

			$sql = $config->query('select * FROM barang where nup = "' . $_POST['nup'] . '"');
            $row = $config->select($sql);
              (int)$ketersediaan = $row['ketersediaan'];
              (int)$jumlah=$_POST['jumlah'];

            $jumlah2 =  (int)$ketersediaan- (int)$jumlah;
            $sql2 = $config->query('update pinjaman join barang on barang.kode_jenis = pinjaman.kode_jenis set barang.ketersediaan = "' .$jumlah2.
              '" where barang.nup ="'.$_POST['nup'].'"');

			//$config->update("barang",'ketersediaan="'.$jumlah.'"','"kode_jenis="', $_POST['kode_jenis']);

			if($result>0){
				msg("success","Success!","Berhasil menambahkan pinjaman");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-peminjam"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan pinjaman");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-peminjam</script>';
			}
			if($result<=0){
                msg("failed","Failed!","Stock Habis");
                echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-peminjam</script>';
            }
		  } else{
			header('Location: index.php');
		  }
		break;
		//========================================================ADD DATA BARANG=========================================================
		case "add_data_barang";
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into barang(nup,tipe,kode_jenis,jenis,tahun,kelompok,ketersediaan) 
                            		values( "'.$_POST['nup'].'","'.$_POST['tipe'].'", "'.$_POST['kode_jenis'].'","'.$_POST['jenis'].'","'.$_POST['tahun'].'", "'.$_POST['kelompok'].'","'.$_POST['ketersediaan'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan data barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan data barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//========================================================UPDATE DATA BARANG=======================================================
		case "update_data_barang":
			$result = $config->update("barang",' nup="'.$_POST['nup'].'",tipe="'.$_POST['tipe'].'", kode_jenis="'.$_POST['kode_jenis'].'",jenis="'.$_POST['jenis'].'",tahun="'.$_POST['tahun'].'", kelompok="'.$_POST['kelompok'].'", ketersediaan="'.$_POST['ketersediaan'].'"' ,"id_barang",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang"</script>';
			} else{
				msg("failed","Failed!","Gagal update data barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang"</script>';
			}		
			break;
		//========================================================DELETE DATA BARANG=======================================================
		case "delete_data_barang":
			$result = $config->delete('barang','id_barang',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-barang"</script>';
			}
		break;
		//=======================================================ADD DATA KODE DAN JENIS BARANG================================================================
		case "add_data_barang2";
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into barang2(kode_barang,jenis_barang) 
                            		values("'.$_POST['kode_barang'].'", "'.$_POST['jenis_barang'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan data kode dan jenis barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kode-jenis"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan data kode dan jenis barang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kode-jenis"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//======================================================UPDATE DATA KODE DAN JENIS=============================================================
		case "update_data_barang2":
			$result = $config->update("barang2",'kode_barang="'.$_POST['kode_barang'].'", jenis_barang="'.$_POST['jenis_barang'].'"',"id_kode",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data kode dan jenis");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kode-jenis"</script>';
			} else{
				msg("failed","Failed!","Gagal update data kode dan jenis");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kode-jenis"</script>';
			}		
			break;
		//======================================================DELETE DATA KODE DAN JENIS==============================================================
		case "delete_data_barang2":
			$result = $config->delete('barang2','id_kode',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data kelahiran");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kode-jenis"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data kelahiran");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kode-jenis"</script>';
			}
		break;
		//======================================================ADD DATA PENDATANG================================================================
		case "add_data_pendatang";
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into pendatang(nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,golongan_darah,agama,						status,pendidikan,pekerjaan,alamat_asal,rt_asal,rw_asal,desa_asal,kecamatan_asal,kabupaten_asal,					tanggal_datang,alamat_tujuan,rt_tujuan,rw_tujuan,desa_tujuan,kecamatan_tujuan,kabupaten_tujuan,						status_pendatang) 
                            	values("'.$_POST['nik'].'", "'.$_POST['nama'].'", "'.$_POST['tempat_lahir'].'", "'.$_POST['tanggal_lahir'].'","'.$_POST['jenis_kelamin'].'","'.$_POST['golongan_darah'].'", "'.$_POST['agama'].'" , "'.$_POST['status'].'", "'.$_POST['pendidikan'].'", "'.$_POST['pekerjaan'].'","'.$_POST['alamat_asal'].'", "'.$_POST['rt_asal'].'", "'.$_POST['rw_asal'].'", "'.$_POST['desa_asal'].'", "'.$_POST['kecamatan_asal'].'", "'.$_POST['kabupaten_asal'].'", "'.$_POST['tanggal_datang'].'", "'.$_POST['alamat_tujuan'].'","'.$_POST['rt_tujuan'].'","'.$_POST['rw_tujuan'].'","'.$_POST['desa_tujuan'].'","'.$_POST['kecamatan_tujuan'].'","'.$_POST['kabupaten_tujuan'].'","'.$_POST['status_pendatang'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan data pendatang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-pendatang"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan data pendatang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-pendatang"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//======================================================UPDATE DATA PENDATANG============================================================
		case "update_data_pendatang":
			$result = $config->update("pendatang",'nik="'.$_POST['nik'].'", nama="'.$_POST['nama'].'",tempat_lahir= "'.$_POST['tempat_lahir'].'", tanggal_lahir="'.$_POST['tanggal_lahir'].'",jenis_kelamin="'.$_POST['jenis_kelamin'].'",golongan_darah="'.$_POST['golongan_darah'].'", agama="'.$_POST['agama'].'" , status="'.$_POST['status'].'", pendidikan="'.$_POST['pendidikan'].'", pekerjaan="'.$_POST['pekerjaan'].'",alamat_asal="'.$_POST['alamat_asal'].'", rt_asal="'.$_POST['rt_asal'].'", rw_asal="'.$_POST['rw_asal'].'", desa_asal="'.$_POST['desa_asal'].'", kecamatan_asal="'.$_POST['kecamatan_asal'].'", kabupaten_asal="'.$_POST['kabupaten_asal'].'", tanggal_datang="'.$_POST['tanggal_datang'].'", alamat_tujuan="'.$_POST['alamat_tujuan'].'",rt_tujuan="'.$_POST['rt_tujuan'].'",rw_tujuan="'.$_POST['rw_tujuan'].'",desa_tujuan="'.$_POST['desa_tujuan'].'",kecamatan_tujuan="'.$_POST['kecamatan_tujuan'].'",kabupaten_tujuan="'.$_POST['kabupaten_tujuan'].'", status_pendatang="'.$_POST['status_pendatang'].'"',"id_pendatang",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data pendatang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-pendatang"</script>';
			} else{
				msg("failed","Failed!","Gagal update data pendatang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-pendatang"</script>';
			}		
			break;
		//=======================================================DELETE DATA PENDATANG===========================================================
		case "delete_data_pendatang":
			$result = $config->delete('pendatang','id_pendatang',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data Pendatang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-pendatang"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data Pendatang");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-pendatang"</script>';
			}
		break;
		//=======================================================ADD DATA KEPINDAHAN==============================================================
		case "add_data_kepindahan";
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into pindah(nik,nama,alasan_pindah,alamat_asal,rt_asal,rw_asal,desa_asal,kecamatan_asal,						kabupaten_asal,tanggal_pindah,alamat_tujuan,rt_tujuan,rw_tujuan,desa_tujuan,kecamatan_tujuan,						kabupaten_tujuan) 
                            		values("'.$_POST['nik'].'", "'.$_POST['nama'].'", "'.$_POST['alasan_pindah'].'","'.$_POST['alamat_asal'].'","'.$_POST['rt_asal'].'", "'.$_POST['rw_asal'].'" , "'.$_POST['desa_asal'].'", "'.$_POST['kecamatan_asal'].'", "'.$_POST['kabupaten_asal'].'","'.$_POST['tanggal_pindah'].'", "'.$_POST['alamat_tujuan'].'", "'.$_POST['rt_tujuan'].'", "'.$_POST['rw_tujuan'].'", "'.$_POST['desa_tujuan'].'", "'.$_POST['kecamatan_tujuan'].'", "'.$_POST['kabupaten_tujuan'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan data Kepindahan");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kepindahan"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan data kepindahan");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kepindahan"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//==================================================UPDATE DATA KEPINDAHAN================================================================
		case "update_data_kepindahan":
			$result = $config->update("pindah",'
				nik="'.$_POST['nik'].'", 
				nama="'.$_POST['nama'].'", 
				alasan_pindah="'.$_POST['alasan_pindah'].'", 
				alamat_asal="'.$_POST['alamat_asal'].'", 
				rt_asal="'.$_POST['rt_asal'].'", 
				rw_asal="'.$_POST['rw_asal'].'" , 
				desa_asal="'.$_POST['desa_asal'].'", 
				kecamatan_asal="'.$_POST['kecamatan_asal'].'", 
				kabupaten_asal="'.$_POST['kabupaten_asal'].'",
				tanggal_pindah="'.$_POST['tanggal_pindah'].'", 
				alamat_tujuan="'.$_POST['alamat_tujuan'].'", 
				rt_tujuan="'.$_POST['rt_tujuan'].'", 
				rw_tujuan="'.$_POST['rw_tujuan'].'", 
				desa_tujuan="'.$_POST['desa_tujuan'].'", 
				kecamatan_tujuan="'.$_POST['kecamatan_tujuan'].'", 
				kabupaten_tujuan="'.$_POST['kabupaten_tujuan'].'"',
				"id_kepindahan",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data kepindahan");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kepindahan"</script>';
			} else{
				msg("failed","Failed!","Gagal update data Kepindahan");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kepindahan"</script>';
			}		
			break;
		//=========================================================DELETE DATA KEPINDAHAN=========================================================
		case "delete_data_kepindahan":
			$result = $config->delete('pindah','id_kepindahan',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data kepindahan");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kepindahan"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data kepindahan");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kepindahan"</script>';
			}
		break;
		//==========================================================ADD DATA DETAIL KK============================================================
		case "add_data_detailkk";
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into utama(id_desa, no_kk, nama_kpl, alamat, rt, kelurahan, kecamatan, kabupaten, kodepos,  provinsi) 
                            		values( "'.$_POST['id_desa'].'", "'.$_POST['no_kk'].'","'.$_POST['nama_kpl'].'", "'.$_POST['alamat'].'","'.$_POST['rt'].'","'.$_POST['kelurahan'].'", "'.$_POST['kecamatan'].'" , "'.$_POST['kabupaten'].'", "'.$_POST['kodepos'].'", "'.$_POST['provinsi'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan detail kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=detail-kk&id_desa='.$_POST['id_desa'].'"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan detail kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=detail-kk&id_desa='.$_POST['id_desa'].'"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//=============================================================UPDATE DATA DETAIL KK======================================================
		case "update_data_detailkk":
			$result = $config->update("utama",'id_desa="'.$_POST['id_desa'].'", no_kk="'.$_POST['no_kk'].'", nama_kpl="'.$_POST['nama_kpl'].'",alamat="'.$_POST['alamat'].'",rt="'.$_POST['rt'].'", kelurahan="'.$_POST['kelurahan'].'" , kecamatan="'.$_POST['kecamatan'].'",kabupaten="'.$_POST['kabupaten'].'", kodepos="'.$_POST['kodepos'].'", provinsi="'.$_POST['provinsi'].'"',"id_kk",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update detail kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=detail-kk&id_desa='.$_POST['id_desa'].'"</script>';
			} else{
				msg("failed","Failed!","Gagal update detail kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=detail-kk&id_desa='.$_POST['id_desa'].'"</script>';
			}		
			break;
		//=============================================================DELETE DATA DETAIL KK======================================================	
			case "delete_data_detailkk":
			$result = $config->delete('utama','id_kk',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete detail kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=detail-kk&id_desa='.$_GET['id_desa'].'"</script>';
			} else{
				msg("failed","Failed!","Gagal delete detail kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=detail-kk&id_desa='.$_GET['id_desa'].'"</script>';
			}
		break;
		//=============================================================ADD PETUGAS=================================================================
		case "add_petugas";
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into datapegawai(nip,nama,jabatan,email,telpon,unit_kerja,password) 
                            		values( "'.$_POST['nip'].'", "'.$_POST['nama'].'", "'.$_POST['jabatan'].'", "'.$_POST['email'].'", "'.$_POST['telpon'].'", "'.$_POST['unit_kerja'].'", "'.$_POST['password'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-petugas"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-petugas"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//==============================================================UPDATE DATA PETUGAS========================================================
		case "update_data_petugas":
			$result = $config->update("datapegawai",'nip="'.$_POST['nip'].'", nama="'.$_POST['nama'].'",jabatan="'.$_POST['jabatan'].'",email="'.$_POST['email'].'",telpon="'.$_POST['telpon'].'",unit_kerja="'.$_POST['unit_kerja'].'",password="'.$_POST['password'].'"',"id_data",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-petugas"</script>';
			} else{
				msg("failed","Failed!","Gagal update petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-petugas</script>';
			}		
			break;
		//================================================================DELETE DATA PETUGAS======================================================
		case "delete_data_petugas":
			$result = $config->delete('datapegawai','id_data',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-petugas"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data data petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-petugas"</script>';
			}
		break;
		//==============================================================UPDATE DATA ADMIN=========================================================
		case "update_data_admin":
			$result = $config->update("admin",'nip="'.$_POST['nip'].'", nama="'.$_POST['nama'].'",jabatan="'.$_POST['jabatan'].'",email="'.$_POST['email'].'",telpon="'.$_POST['telpon'].'",unit_kerja="'.$_POST['unit_kerja'].'",username="'.$_POST['username'].'",password="'.$_POST['password'].'"',"id_admin",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update admin");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=profile"</script>';
			} else{
				msg("failed","Failed!","Gagal update admin");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=profile</script>';
			}		
			break;
		//=============================================================UPDATE DATA KK=============================================================
		case "update_data_kk":
			$result = $config->update("desa",'
				nama_desa="'.$_POST['nama_desa'].'",
				rt="'.$_POST['rt'].'",
				kecamatan="'.$_POST['kecamatan'].'",
				kabupaten="'.$_POST['kabupaten'].'",
				provinsi="'.$_POST['provinsi'].'"
				',"id_desa",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kk"</script>';
			} else{
				msg("failed","Failed!","Gagal update data kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kk"</script>';
			}		break;
		//=============================================================DELETE DATA KK=============================================================
		case "delete_data_kk":
			$result = $config->delete('desa','id_desa',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kk"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data kk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-kk"</script>';
			}
		break;
		// =================================================================ADD DATA PENDUDUK=====================================================
		case "add_data_penduduk":
		  if($_SERVER["REQUEST_METHOD"]=="POST"){
			$result = $config->query('insert into biodata(id_kk, nik,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,agama, hubungan, golongan_darah, pendidikan,alamat_penduduk, pekerjaan, penghasilan, status_perkawinan, status) 
									values("'.$_POST['id_kk'].'","'.$_POST['nik'].'", "'.$_POST['nama'].'","'.$_POST['jenis_kelamin'].'","'.$_POST['tempat_lahir'].'","'.$_POST['tanggal_lahir'].'","'.$_POST['agama'].'","'.$_POST['hubungan'].'","'.$_POST['golongan_darah'].'","'.$_POST['pendidikan'].'","'.$_POST['alamat_penduduk'].'","'.$_POST['pekerjaan'].'","'.$_POST['penghasilan'].'","'.$_POST['status_perkawinan'].'","'.$_POST['status'].'")');
			if($result>0){
				msg("success","Success!","Berhasil menambahkan data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-penduduk&id_kk='.$_POST['id_kk'].'"</script>';
			} else{
				msg("failed","Failed!","Gagal menambahkan data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-penduduk&id_kk='.$_POST['id_kk'].'"</script>';
			}
		  } else{
			header('Location: index.php');
		  }
		break;
		//===================================================================DELETE DATA PENDUDUK=================================================
		case "delete_data_penduduk":
			$result = $config->delete('biodata','id_biodata',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data penduduk");
				// header("location : ".$config->site_url()."index.php?page=tambah-penduduk&id_kk=".$_GET['id_kk'])
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-penduduk&id_kk='.$_GET['id_kk'].'"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-penduduk&id_kk='.$_GET['id_kk'].'"</script>';
			}
		break;
		//====================================================UPDATE DATA PENDUDUK============================================================
		case "update_data_penduduk":
			$result = $config->update("biodata",
			'id_kk="'.$_POST['id_kk'].'",
			 nik="'.$_POST['nik'].'",
			 nama="'.$_POST['nama'].'",
			 jenis_kelamin="'.$_POST['jenis_kelamin'].'",
			 tempat_lahir="'.$_POST['tempat_lahir'].'",
			 tanggal_lahir="'.$_POST['tanggal_lahir'].'",
			 agama="'.$_POST['agama'].'", 
			 hubungan="'.$_POST['hubungan'].'" ,
			  golongan_darah="'.$_POST['golongan_darah'].'",
			   pendidikan="'.$_POST['pendidikan'].'", 
			   alamat_penduduk="'.$_POST['alamat_penduduk'].'",
			   pekerjaan="'.$_POST['pekerjaan'].'",
			   penghasilan="'.$_POST['penghasilan'].'",
			   status_perkawinan="'.$_POST['status_perkawinan'].'",
			   status="'.$_POST['status'].'"',
			   "id_biodata",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-penduduk&id_kk='.$_GET['id_kk'].'"</script>';
			} else{
				msg("failed","Failed!","Gagal update petugas");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=tambah-penduduk&id_kk='.$_GET['id_kk'].'"</script>';
			}		
			break;
			//===============================================UPDATE DATA PENDUDUK=================================================================
			case "update_data_penduduk1":
			$result = $config->update("biodata",
			'nik="'.$_POST['nik'].'",
			 nama="'.$_POST['nama'].'",
			 jenis_kelamin="'.$_POST['jenis_kelamin'].'",
			 tempat_lahir="'.$_POST['tempat_lahir'].'",
			 tanggal_lahir="'.$_POST['tanggal_lahir'].'",
			 agama="'.$_POST['agama'].'", 
			 hubungan="'.$_POST['hubungan'].'" ,
			   golongan_darah="'.$_POST['golongan_darah'].'",
			   pendidikan="'.$_POST['pendidikan'].'", 
			   alamat_penduduk="'.$_POST['alamat_penduduk'].'",
			   pekerjaan="'.$_POST['pekerjaan'].'",
			   penghasilan="'.$_POST['penghasilan'].'",
			   status_perkawinan="'.$_POST['status_perkawinan'].'",
			   status="'.$_POST['status'].'"',
			   "id_biodata",$_POST['id']);
			if($result>0){
				msg("success","Success!","Berhasil update data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-penduduk"</script>';
			} else{
				msg("failed","Failed!","Gagal update data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-penduduk"</script>';
			}		
			break;
			//==============================================DELETE DATA PENDUDUK1================================================================
			case "delete_data_penduduk1":
			$result = $config->delete('biodata','id_biodata',$_GET['id']);
			if($result>0){
				msg("success","Success!","Berhasil delete data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-penduduk"</script>';
			} else{
				msg("failed","Failed!","Gagal delete data penduduk");
				echo '<script>window.location.href="'.$config->site_url().'index.php?page=data-penduduk"</script>';
			}
		break;
	}
?>
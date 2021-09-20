<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
	<meta charset='UTF-8'>
	<title>Cetak KTA ISRI</title>
</head>
<style>
	@media print {
		* {
			-webkit-print-color-adjust: exact;
		}
	}

	@page {
		size: 21cm 30cm;
		margin: 5mm 7mm 5mm 7mm;
		/* change the margins as you want them to be. */
	}

	table {
		border-spacing: 0px;
	}

	/* cellspacing */

	th,
	td {
		padding: 0px;
	}
</style>

<body onload='window.print()' style="font-size: 12px;margin-top:0;position:absolute;">
	<div style="width: 925px; height: 267px; margin-bottom:10px; background-image: url('<?= base_url('assets/imgs/desain/') . $sekolah['desain']; ?>');">
		<img style="border: 1px solid #ffffff;position: absolute;margin-left: 180px;margin-top: 72px;" src="<?= base_url('assets/imgs/') . $s['foto']; ?>" width="79px" height="96px">
	<div style="padding-top: 5px;">
			<table style="border:0px solid #000;margin-top: 170px; position: absolute; width:380px;left:29px; text-align: right; font-family: oswald;font-size: 12px;">

			<tr>
					<td style="text-align:center;"><?= $s['no_anggota']; ?></td>
				</tr>
				<tr>
                    
					<td><br></td>
				</tr>
				
				<tr>
					<td style="text-align:center;"><?= $s['nama']; ?></td>
				</tr>
			
			</table>
		</div>
        <table style="border:0px solid #000;margin-top: 30.4px; position: absolute; width:360px;left:585px;font-family: oswald;font-size: 7.5px;">
<tr>
    <td style="text-align:left;text-transform:uppercase;">
    <?= $s['name_prov']; ?>
	</td></tr>
    <tr><td><br></td></tr>
<tr><td><br></td></tr>

    <tr><td style="padding-left:110px;padding-top:24.3px;">
    
    <?= $s['alamat']; ?>
	</td></tr>

    <tr><td style="font-size:8px;padding-left:78px;padding-top:22.6px;">
    <?= $s['tanggal']; ?>
		</td></tr><br>
		<br>
</table>
		</div>

	</div>
</body>

</html>
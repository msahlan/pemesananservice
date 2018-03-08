<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{
        
                
	}

 
	function Content($data)
	{
        $image_path = 'assets/images/logo.png';
        $this->setFont('Helvetica','',15);
        $this->setFillColor(255,255,255);
        $this->cell(210,6,'PT Plasa Kreasindo Motor',0,1,'C',1);
        $this->setFont('Helvetica','',10);
        $this->setFillColor(255,255,255);
        $this->cell(215,6,'Bengkel Dan Dealer Resmi Yamaha',0,1,'C',1);
        $this->setFont('Helvetica','',9);
        $this->setFillColor(255,255,255);
        $this->cell(210,4,'Jln. Diponegoro No.46A RT.01 RW.18 Desa Setia Mekar ',0,1,'C',1); 
        $this->cell(220,4,'Kec.Tambun Selatan Kab.Bekasi Telp.8800667, Fax. 8819599.',0,1,'C',1); 
        $this->Ln(2);
        $this->Line(10,$this->GetY(),210,$this->GetY());
        $this->Image($image_path,5,4,70,30);
        
        $this->Ln(5);
        $this->setFont('Helvetica','',14);
        $this->setFillColor(255,255,255);
        $this->cell(25,6,'',0,0,'C',0); 
        $this->cell(140,6,'Laporan Stock Sparepart',0,1,'C',1); 
        
        $this->Ln(5);
        $this->setFont('Helvetica','',10);
        $this->setFillColor(230,230,200);
        $this->cell(10,6,'No.',1,0,'C',1);
        $this->cell(50,6,'Kode Sparepart',1,0,'C',1);
        $this->cell(100,6,'Nama Sparepart',1,0,'C',1);
        $this->cell(30,6,'Jumlah Stok',1,1,'C',1);

//Header
        $no = 1;
        foreach ($data as $key) {
                $this->setFont('Helvetica','',10);
                $this->setFillColor(255,255,255);	
                $this->cell(10,10,$no,1,0,'C',1);
                $this->cell(50,10,$key['chKdSparepart'],1,0,'L',1);
                $this->cell(100,10,$key['chNamaSparepart'],1,0,'L',1);
                $this->cell(30,10,$key['inStock'],1,1,'C',1);
                $no++;
        }
        $this->Ln(5);
        $this->cell(180,6,"Printed date : " . date('d F Y'),0,1,'R',1);
        $this->cell(180,6,'Penanggung Jawab',0,1,'R',1); 
        $this->Ln(20);
        $this->cell(180,6,'Kepala Mekanik',0,1,'R',1);           
	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Helvetica','I',9);
                $this->Cell(0,10,'Laporan Stock Sparepart',0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
                
	}


}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($report);
$pdf->Output();


?>
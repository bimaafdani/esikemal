<?php  
 
/**
 * @author Achmad Solichin
 * @website http://achmatim.net
 * @email achmatim@gmail.com
 */
@session_start();
require_once("../fpdf17/fpdf.php");
 
class FPDF_AutoWrapTable extends FPDF {
    private $data = array();
    private $options = array(
        'filename' => '',
        'destinationfile' => '',
        'paper_size'=>'F4',
        'orientation'=>'L'
    );
 
    function __construct($data = array(), $options = array()) {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
    }
 
    public function rptDetailData () {
        //
        $border = 0;
        $this->AddPage();
        $this->SetAutoPageBreak(true,60);
        $this->AliasNbPages();
        $left = 25;
 
        //header
        $this->Ln(10);
        $this->SetFont("", "B", 12);
        $this->SetX($left); $this->Cell(0, 10, 'REKAP DATA NOMOR SURAT DINAS', 0, 1,'C');
        $this->Ln(10);
 
        $h = 13;
        $left = 40;
        $top = 80;  
        #tableheader
        $this->SetFillColor(200,200,200);   
        $left = $this->GetX();
        $this->Cell(100, $h, 'Tgl. Ambil', 1, 0, 'C',true);
        $this->Cell(100, $h, 'No. Surat', 1, 0, 'C',true);
        $this->Cell(100, $h, 'Pengolah', 1, 0, 'C',true);
        $this->Cell(100, $h, 'Kode Surat', 1, 0, 'C',true);
        $this->Cell(170, $h, 'Perihal', 1, 0, 'C',true);
        $this->Cell(100, $h, 'Tgl. Surat', 1, 0, 'C',true);
        $this->Cell(100, $h, 'Tujuan Kirim', 1, 1, 'C',true);
        //$this->Ln(20);
 
        $this->SetFont('Arial','',12);
        $this->SetWidths(array(100,100,100,100,170,100,100));
        $this->SetAligns(array('L','L','L','L','L','L','L'));
        $no = 1; $this->SetFillColor(255);
        foreach ($this->data as $baris) {
            $this->Row(
                array( 
                $baris['tgl_ambil'], 
                $baris['no_dinas'], 
                $baris['nama'], 
                $baris['kode_surat'], 
                $baris['perihal'],
                $baris['tgl_surat'],
                $baris['tujuan_kirim']
                
            ));
        }
 
    }
 
    public function printPDF () {
 
        if ($this->options['paper_size'] == "F4") {
            $a = 8.3 * 72; //1 inch = 72 pt
            $b = 13.0 * 72;
            $this->FPDF($this->options['orientation'], "pt", array($a,$b));
        } else {
            $this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
        }
 
        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();
        $this->SetFont("helvetica", "B", 10);
        //$this->AddPage();
 
        $this->rptDetailData();
 
        $this->Output($this->options['filename'],$this->options['destinationfile']);
    }
 
    private $widths;
    private $aligns;
 
    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }
 
    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }
 
    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=10*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,10,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }
 
    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }
 
    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
} //end of class
 
/* contoh penggunaan dengan data diambil dari database mysql
 * 
 * 1. buatlah database di mysql
 * 2. buatlah tabel 'pegawai' dengan field: nip, nama, alamat, email dan website
 * 3. isikan beberapa contoh data ke tabel pegawai tersebut.
 * 
 * */
 
#koneksi ke database (disederhanakan)
include "../koneksi.php";
 
#ambil data dari DB dan masukkan ke array
$level  =  $_SESSION['nama'];
$data = array();
$query = "SELECT tgl_ambil, no_dinas, nama, kode_surat, perihal, tgl_surat, tujuan_kirim FROM t_nomor WHERE no_dinas >=1 AND nama='$level' ";
$sql = mysqli_query ($koneksi, $query);
while ($row = mysqli_fetch_assoc($sql)) {
    array_push($data, $row);
}
 
//pilihan
$options = array(
    'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
    'destinationfile' => '', //I=inline browser (default), F=local file, D=download
    'paper_size'=>'F4', //paper size: F4, A3, A4, A5, Letter, Legal
    'orientation'=>'L' //orientation: P=portrait, L=landscape
);
 
$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
?>
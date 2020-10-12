<?php 
function validaRequerido($valor)
{
  if (trim($valor)=='')
  {
     return false; 	
  }
  else
  {
     return true;
  }	
}

function validaNumero($valor)
{
   if (is_numeric($valor))
   {
   	  return true;
   }
   else
   {
   	  return false;
   }	
}

function format_rupiah($angka)
{
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}


function rp($uang)
{
  $rp = "";
  $digit = strlen($uang);
  
  while($digit > 3)
  {
    $rp = "." . substr($uang,-3) . $rp;
    $lebar = strlen($uang) - 3;
    $uang  = substr($uang,0,$lebar);
    $digit = strlen($uang);  
  }
  $rp = $uang . $rp . ",-";
  return $rp;
}

function tgl_eng_to_ind($tgl) 
{
		$tanggal	= explode('-',$tgl);
		$kdbl		= $tanggal[1];

		if ($kdbl == '01')	{
			$nbln = 'Enero';
		}
		else if ($kdbl == '02') {
			$nbln = 'Febrero';
		}
		else if ($kdbl == '03') {
			$nbln = 'Marzo';
		}
		else if ($kdbl == '04') {
			$nbln = 'Abril';
		}
		else if ($kdbl == '05') {
			$nbln = 'Mayo';
		}	
		else if ($kdbl == '06') {
			$nbln = 'Junio';
		}
		else if ($kdbl == '07') {
			$nbln = 'Julio';
		}
		else if ($kdbl == '08') {
			$nbln = 'Agosto';
		}
		else if ($kdbl == '09') {
			$nbln = 'Septiembre';
		}
		else if ($kdbl == '10') {
			$nbln = 'Octubre';
		}
		else if ($kdbl == '11') {
			$nbln = 'Noviembre';
		}
		else if ($kdbl == '12') {
			$nbln = 'Diciembre';
		}
		else {
			$nbln = '';
		}
		
		$tgl_ind = $tanggal[0]."  ".$nbln."  ".$tanggal[2];
		return $tgl_ind;
}    
?>
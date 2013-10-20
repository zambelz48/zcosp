<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Paging
{
	/*Fungsi Untuk Ngecek Halaman & Posisi Datanya*/
	function GetPos($Limit)
	{
		if(empty($_GET[hal]))
		{
			$Position   = 0;
			$_GET[hal] = 1;
		}
		else
		{
			$Position = ($_GET[hal] - 1) * $Limit;
		}

		return $Position;
	}

	/*Fungsi Untuk Ngitung Total Jumlah Halamannya*/
	function TotalPage($TotalData,$Limit)
	{
		$TotalPage = ceil($TotalData/$Limit);

		return $TotalPage;
	}

	/*Fungsi Untuk Buat Link Halamannya*/
	function NavPage($ActivePage,$TotalPage,$PageName)
	{
		$Link = "";

		/*Link Untuk First & Previous*/
		if($ActivePage > 1)
		{
			$Prev = $ActivePage - 1;
			$Link .= "<a href='".$PageName."-1.html'><< First</a>&nbsp;|&nbsp;
					  <a href='".$PageName."-".$Prev.".html'>< Prev</a>";
		}
		else
		{
			$Link .= "&nbsp;<< First&nbsp;|&nbsp;< Prev";
		}

		/*Link Halaman 1,2,3..dst*/
		$Num = ($ActivePage > 3 ? " ... " : " ");
		for($i=$ActivePage-2; $i<$ActivePage; $i++)
		{
			if($i < 1)
				continue;
			    $Num .= "<a href='".$PageName."-".$i.".html'>".$i."</a>&nbsp;";
		}
        $Num .= "<b>".$ActivePage."</b>";
		for($i=$ActivePage+1; $i<($ActivePage+3); $i++)
		{
			if($i > $TotalPage)
				break;
				$Num .=	"&nbsp;<a href='".$PageName."-".$i.".html'>".$i."</a>";
		}
		$Num .= ($ActivePage+3 < $TotalPage ? " ... <a href='".$PageName."-".$TotalPage.".html'>".$TotalPage."</a>" : " ");
        $Link .= "".$Num."";

		/*Link Next & Last*/
		if($ActivePage < $TotalPage)
		{
			$Next = $ActivePage + 1;
			$Link .= "<a href='".$PageName."-".$Next.".html'>Next ></a>&nbsp;|&nbsp;
					  <a href='".$PageName."-".$TotalPage.".html'>Last >></a>";
		}
		else
		{
			$Link .= "&nbsp;Next >&nbsp;|&nbsp;Last >>&nbsp;";
		}

		return $Link;
	}
}

?>
<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/lang/indonesia
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

class Z_Table
{   
    private $set_head;
    private $all_row_atr;
    private $tb_data;
    
    public function __construct($atr='')
    {  
       if(!empty($atr))
       { 
           foreach($atr as $tbAtr=>$val)
           {
                $sets[] = ' '.$tbAtr.'=\''.$val.'\'';
           }
           return $this->set_head = implode(' ', $sets);
       }    
    }
    
    public function allRowAtr($atr='')
    {
        if(!empty($atr))
        {
           foreach($atr as $trAtr=>$val)
           {
                $sets[] = ' '.$trAtr.'=\''.$val.'\'';
           }
           return $this->all_row_atr = implode(' ', $sets);
        }
    }
    
    public function data($data='', $atr='')
    {   
        if(!empty($atr))
        {
           foreach($atr as $tdAtr=>$val)
           {
                $sets[] = ' '.$tdAtr.'=\''.$val.'\'';
           }
           $dataAtr = implode(' ', $sets);
        }
        else
        {
           $dataAtr = ""; 
        }
        
        $this->tb_data .= " <tr".$this->all_row_atr.">\n";
        
        foreach($data as $d)
        {
           $this->tb_data .= "\t<td".$dataAtr.">".$d."</td>\n";          
        }               
        
        $this->tb_data .= " </tr>\n";
        
        return $this->tb_data;
    }
    
    public function build()
    {
        $print_table  = "<table".$this->set_head.">\n";       
        $print_table .= $this->tb_data;        
        $print_table .= "</table>";
        
        echo $print_table;
    }
}
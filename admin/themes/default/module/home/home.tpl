<div class="widget-content-home">
    <div class="row-fluid">
    
        <div class="span7">
            <div class="widget-box">
                <div class="widget-title">
                    <h5>Selamat datang, {$username} !</h5>
                </div>
                <div  class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li> <a href="index.php?page=site_profile"> <i class="icon-dashboard"></i> Website </a> </li>
                        <li> <a href="index.php?page=product"> <i class="icon-database"></i> Produk</a> </li>
                        <li> <a href="index.php?page=modules"> <i class="icon-cabinet"></i> Modul </a> </li>
                    </ul>
                </div>
                <div  class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li> <a href="index.php?page=user"> <i class="icon-user"></i> User </a> </li>
                        <li> <a href="index.php?page=customer"> <i class="icon-client"></i> Pelanggan </a> </li>
                        <li> <a href="index.php?page=themes"> <i class="icon-themes"></i> Tema </a> </li>
                    </ul>
                </div>
            </div>
        </div>
              
        <div class="span5">
            <div class="widget-box">
                
                <div class="widget-title">
                    <h5>STATISTIK</h5>
                </div>
                
                <div class="accordion" id="collapse-group">
                    
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> 
                                <a data-parent="#collapse-group" href="#collapseWebStats" data-toggle="collapse"> 
                                    <span class="icon"><i class="icon-magnet"></i></span>
                                    <h5>Statistik website</h5>
                                </a> 
                            </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseWebStats">
                            <div class="widget-content"> 
                                Statistik website 
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> 
                                <a data-parent="#collapse-group" href="#collapseNewComment" data-toggle="collapse"> 
                                    <span class="icon"><i class="icon-magnet"></i></span>
                                    <h5>Komentar terbaru {$total_new_comment}</h5>
                                </a> 
                            </div>
                        </div>
                        <div class="collapse accordion-body" id="collapseNewComment">
                            <div class="widget-content"> Waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just </div>
                        </div>
                    </div>
                    
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> 
                                <a data-parent="#collapse-group" href="#collapseTotalSales" data-toggle="collapse"> 
                                    <span class="icon"><i class="icon-magnet"></i></span>
                                    <h5>Total penjualan</h5>
                                </a> 
                            </div>
                        </div>
                        <div class="collapse accordion-body" id="collapseTotalSales">
                            <div class="widget-content"> It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </div>
                        </div>
                    </div>
                    
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> 
                                <a data-parent="#collapse-group" href="#collapseBestSeller" data-toggle="collapse"> 
                                    <span class="icon"><i class="icon-magnet"></i></span>
                                    <h5>Produk terlaris</h5>
                                </a> 
                            </div>
                        </div>
                        <div class="collapse accordion-body" id="collapseBestSeller">
                            <div class="widget-content">
                                Produk terlaris
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> 
                                <a data-parent="#collapse-group" href="#collapseBestProductReview" data-toggle="collapse"> 
                                    <span class="icon"><i class="icon-magnet"></i></span>
                                    <h5>Produk terbanyak dilihat</h5>
                                </a> 
                            </div>
                        </div>
                        <div class="collapse accordion-body" id="collapseBestProductReview">
                            <div class="widget-content"> 
                                Nama produk : <br />
                                Total review : 
                            </div>
                        </div>
                    </div>
                    
                </div>            
            </div>        
        </div>
        
    </div>
</div>
